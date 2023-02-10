<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * MainController
 */

// Welcome page
Route::get('/', [MainController::class, 'index']);



/*
 * UserController
 */

// Register page
Route::get('/register', [UserController::class, 'register'])
    ->middleware('guest');

// Login page
Route::get('/login', [UserController::class, 'login'])
    ->middleware('guest')
    ->name('login');

// Forgotten password page
Route::get('/forgottenPassword', [UserController::class, 'forgottenPassword'])
    ->middleware('auth');

// Edit profile page
Route::get('/edit', [UserController::class, 'edit'])
    ->middleware('auth');

// Register user
Route::post('/register', [UserController::class, 'store']);

// Login user
Route::post('/login', [UserController::class, 'authenticate']);

// Logout
Route::post('/logout', [UserController::class, 'logout']);

// Edit
Route::post('/edit', [UserController::class, 'update']);

// AJAX call to get current user's values from database
Route::get('/getPreviousValues', [UserController::class, 'getPreviousValues']);



/*
 * AdminController
 */

// Admin page
Route::get('/admin', [AdminController::class, 'admin']);


/*
|--------------------------------------------------------------------------
| Old Stuff
|--------------------------------------------------------------------------
|
*/


/*
// Show create form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store listing data
Route::post('/listings', [ListingController::class, 'store']);



Route::get('/listings', [ListingController::class, 'index']);

Route::get('/listings/{listing}', [ListingController::class, 'show']);

Route::post('/search', [ListingController::class, 'search']);

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

Route::put('/listings/{listing}', [ListingController::class, 'update']);

Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);



Route::get('/layout', function() {
    return view('layout');
});



Route::get('/hello', function() {
    return response('<h1>Hello world!</h1>', 200)
        ->header('Content-Type', 'text/plain')
        ->header('foo', 'bar');
});

Route::get('/posts/{id}', function($id) {
    return response('Post ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function(Request $request) {
    return response($request->name . ' ' . $request->city);
});

*/
