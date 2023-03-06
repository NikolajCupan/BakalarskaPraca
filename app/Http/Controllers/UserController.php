<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\RecordCreatorHelper;
use App\Helpers\ValidationHelper;
use App\Models\Address;
use App\Models\Basket;
use App\Models\City;
use App\Models\Image;
use App\Models\User;
use App\Models\UserRole;
use App\Models\WebRole;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use PHPUnit\TextUI\Help;
use Intervention\Image\ImageManagerStatic;

class UserController extends Controller
{
    // Register form page
    public function register()
    {
        $cities = City::select('city')->groupBy('city')->get();
        return view('user.register', ['cities' => $cities]);
    }

    // Login form page
    public function login()
    {
        return view('user.login');
    }



    // Select edit page
    public function editSelect()
    {
        return view('user.edit.editSelect');
    }

    // Edit profile page
    public function editProfile()
    {
        $user = Auth::user();
        $address = $user->getAddress();
        $currentCity = $address->getCity();
        $cities = City::select('city')->groupBy('city')->get();

        return view('user.edit.editProfile', [
            'user' => $user,
            'address' => $address,
            'currentCity' => $currentCity,
            'cities' => $cities
        ]);
    }

    // Edit photo page
    public function editPhoto()
    {
        $user = Auth::user();
        $imagePath = null;

        if (Helper::imageExists($user->getImagePath(), 'users'))
        {
            $imagePath = $user->getImagePath();
        }

        return view('user.edit.editPhoto', [
            'user' => $user,
            'imagePath' => $imagePath
        ]);
    }

    // Edit password page
    public function editPassword()
    {
        $user = Auth::user();

        return view('user.edit.editPassword', [
            'user' => $user
        ]);
    }

    // Delete account page
    public function editDelete()
    {
        return view('user.edit.editDelete');
    }



    // Register new user
    public function store(Request $request)
    {
        // If city/postal_code combination is not found, function returns false
        if (!ValidationHelper::validateCommon($request))
        {
            $validator = Validator::make($request->all(), []);
            $validator->errors()->add('city', 'Dana kombinacia PSC a mesta neexistuje.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Additional validation needed
        $request->validate([
            'password' => 'required|min:6|max:50|confirmed',
            'email' => ['required', 'email', 'max:50', Rule::unique('web_user', 'email')],
        ]);

        // Getting here means values in all fields are valid
        // First, create address row and image row
        $address = RecordCreatorHelper::createAddress($request);
        $image = Image::create();

        // Hash password
        $hashPassword = bcrypt($request->password);

        $user = User::create([
            'id_address' => $address->id_address,
            'id_image' => $image->id_image,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'password' => $hashPassword,
            'email' => $request->email,
            'phone_number' => $request->phoneNumber
        ]);

        // New user is given role customer and basket
        $webRole = WebRole::where('name', '=', 'customer')->first();

        UserRole::create(['id_user' => $user->id_user, 'id_role' => $webRole->id_role]);
        Basket::create(['id_user' => $user->id_user]);

        // Redirect to home page with success message
        return redirect('/')->with('message', 'Registracia bola uspesna');
    }

    // Login existing user
    public function authenticate(Request $request)
    {
        $form = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($form))
        {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Prihlasenie bolo uspesne');
        }

        return back()->withErrors(['email' => 'Nespravne prihlasovacie udaje'])->onlyInput('email');
    }

    // Logout logged user
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Odhlasenie bolo uspesne');
    }

    // Edit logged user's profile
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // If city/postal_code combination is not found, function returns false
        if (!ValidationHelper::validateCommon($request))
        {
            $validator = Validator::make($request->all(), []);
            $validator->errors()->add('city', 'Dana kombinacia PSC a mesta neexistuje.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Additional validation needed
        $request->validate([
            'email' => ['required', 'email', 'max:50', Rule::unique('web_user', 'email')->ignore($user->id_user, 'id_user')]
        ]);

        // If entered, remove spaces
        $normalizedPostalCode = $request->postalCode ? Helper::removeSpaces($request->postalCode) : null;

        session()->forget('old');
        session(['old' => $request->all()]);

        // Getting here means values in all fields are valid
        // Update user
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->phone_number = $request->phoneNumber;
        $user->save();

        // Update address
        // City is updated when both postal_code and city are filled out and valid
        $address = $user->getAddress();
        if (!is_null($request->postalCode) && !is_null($request->city))
        {
            $city = City::where('postal_code', '=', $request->postalCode)
                        ->where('city', '=', $request->city)
                        ->first();

            $address->id_city = $city->id_city;
        }
        else
        {
            // Getting to this branch means user removed postal_code and city information
            $address->id_city = null;
        }
        $address->street = $request->street;
        $address->house_number = $request->houseNumber;
        $address->save();

        return redirect('/')->with('message', 'Zmena profilovych udajov bola uspesna');
    }

    // Edit logged user's photo
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'image' => ['required', 'max:2048', 'mimes:jpg,bmp,png',
                'dimensions:min_width=256,min_height=256,max_width:2048,max_height:2048',
            ]
        ]);

        $image = $request->file('image');
        $croppedImage = Helper::cropImage($image);

        // Save image to public folder
        $croppedImage->save(storage_path('app/public/images/users/') . $image->hashName());

        // Save image to DB
        $user = Auth::user();
        $dbImage = $user->getImage();

        if (!is_null($dbImage->image_path))
        {
            // Delete current image (if it exists)
            // dirname => need to go one folder up
            $absolutePath = dirname(app_path()) . '/storage/app/public/images/users/' . $dbImage->image_path;
            if (Helper::imageExists($dbImage->image_path, 'users'))
            {
                unlink($absolutePath);
            }
        }

        $dbImage->image_path = $image->hashName();
        $dbImage->save();

        return redirect('/')->with('message', 'Zmena profilovej fotky bola uspesna');
    }

    // Edit logged user's password
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        if(!Hash::check($request->oldPassword, $user->password))
        {
            return back()->withErrors(['oldPassword' => 'Nespravne heslo'])->onlyInput('oldPassword');
        }

        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6|max:50|confirmed'
        ]);

        // Has new password and change it
        $hashPassword = bcrypt($request->newPassword);
        $user->password = $hashPassword;
        $user->save();

        return redirect('/')->with('message', 'Zmena hesla bola uspesna');
    }

    // Delete logged user's account
    public function updateDelete(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'confirmDelete' => 'accepted'
        ]);


        if(!Hash::check($request->password, $user->password) || ($request->email != $user->email))
        {
            return back()->withErrors(['email' => 'Nespravne udaje'])->onlyInput('email');
        }

        // Getting here means all the values are correct and user can be deleted
        $userImage = $user->getImage();

        // Path might not be set
        if (!is_null($userImage->image_path))
        {
            // Delete current image (if it exists)
            // dirname => need to go one folder up
            $absolutePath = dirname(app_path()) . '/storage/app/public/images/users/' . $userImage->image_path;
            if (Helper::imageExists($userImage->image_path, 'users'))
            {
                unlink($absolutePath);
            }
        }

        $userImage->save();

        Auth::logout();
        $user->delete();

        return redirect('/')->with('message', 'Zmazanie uctu bolo uspesne');
    }



    // AJAX call to get current user's values from database
    public function getPreviousValues()
    {
        $user = Auth::user();
        // Function replace all null attributes in address with ""
        $address = Helper::replaceNullsAddress($user->getAddress());
        // If city is null helper function returns "fake" city (array with city attribute set to "")
        $city = Helper::getEmptyCity($address->getCity());

        return response()->json(['user' => $user, 'address' => $address, 'city' => $city]);
    }
}
