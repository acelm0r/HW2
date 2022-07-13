<?php

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
    return view('login');
});

// registrazione
Route::get('register', 'App\Http\Controllers\LoginController@register_form');
Route::post('register', 'App\Http\Controllers\LoginController@do_register');

// login e logout
Route::get('login', 'App\Http\Controllers\LoginController@login_form');
Route::post('login', 'App\Http\Controllers\LoginController@do_login');
Route::get('logout', 'App\Http\Controllers\LoginController@logout');

// home
Route::get('home', 'App\Http\Controllers\HomeController@home');
Route::get('home', 'App\Http\Controllers\HomeController@show_comments');

// crea un commento
Route::get('comment', 'App\Http\Controllers\CommentController@home');
Route::post('comment', 'App\Http\Controllers\CommentController@create_comment');

// search
Route::get('search', 'App\Http\Controllers\SearchController@home');
