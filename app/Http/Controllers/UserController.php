<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\City;
use App\Models\UserRole;
use App\Models\WebRole;
use App\Models\WebUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    // Register form page
    public function register()
    {
        return view('user.register');
    }

    // Login form page
    public function login()
    {
        return view('user.login');
    }

    // Forgotten password page
    public function forgottenPassword()
    {
        return view('user.forgottenPassword');
    }

    // Register new user
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'max:30'],
            'lastName' => ['required', 'max:30'],
            'email' => ['required', 'email', 'max:50', Rule::unique('web_user', 'email')],
            'password' => 'required|min:6|max:50|confirmed',

            'phoneNumber' => ['nullable', 'numeric', 'digits_between:1,15'],
            'postalCode' => ['nullable', 'digits:5'],
            'city' => ['nullable', 'max:30'],
            'street' => ['nullable', 'max:15'],
            'houseNumber' => ['nullable', 'numeric', 'between:0,1000000']
        ]);

        // Check only if entered
        if (!is_null($request->postalCode) || !is_null($request->city))
        {
            // Find if there is a row in the table city
            $foundCity = City::where('city', 'like', $request->city . '%')
                ->where('postal_code', '=', $request->postalCode)
                ->first();

            // If combination was not found, throw an error
            if (!$foundCity)
            {
                $validator = Validator::make($request->all(), []);
                $validator->errors()->add('city', 'Dana kombinacia PSC a mesta neexistuje.');
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        // Getting here means values in all fields are valid
        // First, create address row
        $address = Address::create([
            'postal_code' => $request->postalCode,
            'street' => $request->street,
            'house_number' => $request->houseNumber
        ]);

        // Hash password
        $hashPassword = bcrypt($request->password);

        $user = WebUser::create([
            'id_address' => $address->id_address,
            'id_image' => null,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'password' => $hashPassword,
            'email' => $request->email,
            'phone_number' => $request->phoneNumber
        ]);

        // New user is given role customer
        $webRole = WebRole::where('name', '=', 'customer')
                         ->first();

        UserRole::create([
            'id_user' => $user->id_user,
            'id_role' => $webRole->id_role
        ]);

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

        return back()->withErrors(['email' => 'Nespravne prihlasovacie udaje'])
                     ->onlyInput('email');
    }

    // Logout logged user
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Odhlasenie bolo uspesne');
    }
}
