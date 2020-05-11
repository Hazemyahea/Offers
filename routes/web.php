<?php

use App\Gift;
use App\Post;
use App\User;
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

Auth::routes();

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/offers','OffersController')->middleware('CheckAge');

    Route::get('/admin', function () {
        return view('admin');
    })->middleware('auth:admin');;


});


Route::get('/usergift', function () {
  $user = User::whereDoesntHave('gift')->get();
  return $user;

    return view('welcome');
});

Route::get('/userposts', function () {
    $post = Post::find(1);
    return $post->user;


});
