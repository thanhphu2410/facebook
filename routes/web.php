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
    Route::get('/', 'HomeController@index');
    Route::get('profile/{profile}', 'ProfileController@show')->name('profile');
    Route::get('profile/tab/introduction/{profile}', 'ProfileController@tabIntroduction')->name('profile.introduction-tab');
    Route::get('profile/tab/myposts/{profile}', 'ProfileController@tabMyPosts')->name('profile.myposts-tab');
    Route::post('profile/update/{profile}', 'ProfileController@update')->name('profile.update');
    Route::get('add-friend/{user}', 'FriendController@store')->name('add-friend');
    Route::get('cancel-friend/{user}', 'FriendController@destroy')->name('cancel-friend');
    Route::get('accept-friend/{user}', 'FriendController@accept')->name('accept-friend');
    Route::get('get-districts', 'AjaxController@getDistricts')->name('get-districts');
    Route::get('get-wards', 'AjaxController@getWards')->name('get-wards');
});
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
