<?php

use App\Http\Controllers\Admin\Block_Controller as AdminBlockController;
use App\Http\Controllers\User\Block_Controller as UserBlockController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('blocks');
//     })->middleware(['auth', 'verified'])->name('dashboard');
// });

Route::get('/dashboard', function () {
    return view('blocks');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::resource('/blocks', Block_Controller::class)->middleware(['auth']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('blocks.index');

Route::get('/home/texturepacks', [App\Http\Controllers\HomeController::class, 'TexturepackIndex'])->name('admin.texturepacks.index');

//This will create all the routes for Book
//and the routes will only be available when a user is logged in
Route::resource('/admin/blocks', AdminBlockController::class)->middleware(['auth'])->names('admin.blocks');

Route::resource('/user/blocks', UserBlockController::class)->middleware(['auth'])->names('user.blocks')->only(['index', 'show']);
