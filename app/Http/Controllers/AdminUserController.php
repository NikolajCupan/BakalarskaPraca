<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController
{
    // Table with users with some web role page
    public function showUsers(Request $request)
    {
        Helper::allow(['accountManager']);

        $roleName = $request->webRoleName;
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
            'activeCategory' => $roleName
        ]);
    }

    // Single user information page
    public function showUser($id_user)
    {
        Helper::allow(['accountManager']);

        $user = User::where('id_user', '=', $id_user)
                    ->first();

        return view('admin.user.show', [
            'user' => $user
        ]);
    }
}
