<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\User;
use App\Models\WebRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminUserController
{
    // Table with users with some web role page
    public function showUsers(Request $request)
    {
        Helper::allow(['accountManager']);

        $roleName = $request->category;
        $users = User::whereIn('id_user', function($mainQuery) use ($roleName) {
                               $mainQuery->select('id_user')
                                         ->from('user_role')
                                         ->whereIn('id_role', function($subQuery) use ($roleName) {
                                                   $subQuery->select('id_role')
                                                            ->from('web_role')
                                                            ->where('name', '=', $roleName);
                               });
        })->get();

        return view('admin.user.users', [
            'users' => $users,
            'activeCategory' => $roleName,
            'title' => $request->title
        ]);
    }

    // Single user information page
    public function showUser($id_user)
    {
        Helper::allow(['accountManager']);

        $loggedUser = Auth::user();
        $user = User::where('id_user', '=', $id_user)
                    ->first();
        $userRoles = $user->getUserRoles();
        $webRoles = WebRole::all();
        $userPurchases = $user->getPurchases();

        return view('admin.user.show', [
            'loggedUser' => $loggedUser,
            'user' => $user,
            'userRoles' => $userRoles,
            'webRoles' => $webRoles,
            'userPurchases' => $userPurchases
        ]);
    }

    // Modify user's roles
    public function modifyUserRoles(Request $request)
    {
        Helper::allow(['accountManager']);

        // AccountManager should not be able to change roles for himself, but it is checked
        $loggedUser = Auth::user();
        if ($loggedUser->id_user == $request->userId)
        {
            return redirect('/admin/user/');
        }

        // First remove all roles except customer from the user
        // Because of composite primary key Query Builder must be used instead of Eloquent
        DB::table('user_role')
                ->where('id_user', $request->userId)
                ->whereNotIn('id_role', function($mainQuery) {
                              $mainQuery->select('id_role')
                                        ->from('web_role')
                                        ->where('name', '=', 'customer');
        })->delete();

        // Add selected roles to the user
        $roles = WebRole::where('name', '!=', 'customer')
                        ->get();

        foreach ($roles as $role)
        {
            if ($request->has($role->name))
            {
                DB::table('user_role')->insert([
                    'id_user' => $request->userId,
                    'id_role' => $role->id_role
                ]);
            }
        }

        return redirect('/admin/user/')->with('message', 'Editacia roli pouzivatela bola uspesna');
    }
}
