<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    // Welcome page
    public function index()
    {
        $user = Auth::user();

        // User might not be logged in
        $imagePath = null;
        if (!is_null($user))
        {
            $imagePath = $user->getImagePath();
        }

        return view('main.index', [
            'user' => $user,
            'imagePath' => $imagePath
        ]);
    }

    // Contact page
    public function contact()
    {
        $user = Auth::user();

        // User might not be logged in
        $imagePath = null;
        if (!is_null($user))
        {
            $imagePath = $user->getImagePath();
        }

        return view('main.contact', [
            'user' => $user,
            'imagePath' => $imagePath
        ]);
    }

    // About us page
    public function about()
    {
        $user = Auth::user();

        // User might not be logged in
        $imagePath = null;
        if (!is_null($user))
        {
            $imagePath = $user->getImagePath();
        }

        return view('main.about', [
            'user' => $user,
            'imagePath' => $imagePath
        ]);
    }
}
