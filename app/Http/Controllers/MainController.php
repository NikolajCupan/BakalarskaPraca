<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    // Shows welcome page
    public function index()
    {
        return view('main.index');
    }
}
