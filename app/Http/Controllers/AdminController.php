<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public static function admin()
    {
        if (!Gate::allows('administrate'))
        {
            abort(403);
        }

        return view('admin.admin');
    }
}
