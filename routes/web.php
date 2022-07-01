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
    return view('welcome');
});


//Register
Route::get('register', 'App\Http\Controllers\RegisterController@index')->name('register');
Route::post('register', 'App\Http\Controllers\RegisterController@register');    
Route::get('register/username/{Username}', 'App\Http\Controllers\RegisterController@checkUsername');    
Route::get('register/email/{Email}', 'App\Http\Controllers\RegisterController@checkEmail');


//Home
Route::get('home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('getPlaylists', 'App\Http\Controllers\HomeController@getPlaylists');


//Login
Route::get ('login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('login', 'App\Http\Controllers\LoginController@checkLogin');


//Logout
Route::get('logout', 'App\Http\Controllers\LoginController@logout')->name('logout');


//Profile
Route::get('userProfile', 'App\Http\Controllers\ProfileController@userProfile')->name('userProfile');
Route::get('usernameProfile/{username}', 'App\Http\Controllers\ProfileController@userProfileWithUsername')->name('usernameProfile');
Route::get('changeEmailVisualization', 'App\Http\Controllers\ProfileController@changeEmailVisualization');
Route::get('changeShopDetails', 'App\Http\Controllers\ProfileController@changeShopDetails');


//Post
Route::get('getPost', 'App\Http\Controllers\PostController@getPost')->name('getPost');
Route::get('newPost', 'App\Http\Controllers\PostController@newPost')->name('newPost');
Route::post('newPost', 'App\Http\Controllers\PostController@createPost');
Route::get('deletePost/{post_id}','App\Http\Controllers\PostController@deletePost');


//Favourite
Route::get('favourite','App\Http\Controllers\FavouriteController@index')->name('favourite');
Route::get('addFavourite/{post_id}', 'App\Http\Controllers\FavouriteController@addFavourite');
Route::get('removeFavourite/{post_id}/{route}', 'App\Http\Controllers\FavouriteController@removeFavourite');
Route::get('getFavourite', 'App\Http\Controllers\FavouriteController@getFavourite');


//Comments
Route::get('addComment', 'App\Http\Controllers\CommentController@createComment');
Route::get('findComment', 'App\Http\Controllers\CommentController@findComment');
Route::get('deleteComment/{comment_id}', 'App\Http\Controllers\CommentController@deleteComment');