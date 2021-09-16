<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataController;


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

Route::view('/success', 'success');

Route::view('/login', 'login');

Route::view('/', 'welcome');

Route::post('register', 'App\Http\Controllers\UserController@register');
// Route::get('login', 'App\Http\Controllers\UserController@getAuthenticatedUser')->name('login');
// Route::post('login', 'App\Http\Controllers\UserController@authenticate');
Route::get('open', 'App\Http\Controllers\DataController@open');


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'App\Http\Controllers\UserController@getAuthenticatedUser');
    Route::get('closed', 'App\Http\Controllers\DataController@closed');
});