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

Route::get('/', 'HomeController@index');

Route::get('/post/{slug}', 'HomeController@show')->name('post.show');
Route::get('/tag/{slug}', 'HomeController@tag')->name('tag.show');
Route::get('/category/{slug}', 'HomeController@category')->name('category.show');
Route::post('/subscribe', 'SubsController@subscribe');
Route::get('/verify/{token}', 'SubsController@verify');

Route::group(['middleware'  =>  'auth'], function(){
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store');
    Route::get('/logout', 'AuthController@logout');
    Route::post('/comment', 'CommentsController@store');
});

Route::group(['middleware'  =>  'guest'], function(){
    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@register');
    Route::get('/login','AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'DashboardController@index');
    Route::resource('/subscribers', 'SubscribersController');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/posts', 'PostsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/tags', 'TagsController');
    Route::get('/comments', 'CommentsController@index')->name('comments.index');
    Route::get('/comments/toggle/{id}', 'CommentsController@toggle')->name('comments.toggle');
    Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comments.destroy');

    Route::get('/deleted-users', 'UsersController@deleted')->name('users.deleted');
    Route::post('/deleted-users/{user}/restore', 'UsersController@restore')->name('users.restore');
});
