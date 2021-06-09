<?php

use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'index');
    Route::get('/profile/{profile}', 'ProfileController@edit')->name('profile');
});
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
