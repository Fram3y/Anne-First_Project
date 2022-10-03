<?php

use App\Http\Controllers\PageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', function () {
    return view('home', ['name' => "Sam"]);
});

Route::get('/about', function () {
    return view('about', ['name' => "Aaron"]);
});

Route::get('/contactus', function () {
    return view('contactus', ['name' => "Ben"]);
});

// Route::get('/home', [PageController::class, 'home']);