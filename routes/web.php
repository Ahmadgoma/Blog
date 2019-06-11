<?php

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
Auth::routes();

// disable register route
Route::match(['get', 'post'], 'register', function () {
    return redirect('/admin');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Dashboard'], function () {
    Route::get('/', 'AdminController@index');
    // Routing Posts
    Route::resource('posts', 'PostsController', [
        'except' => ['show']
    ]);
    // Routing categories
    Route::resource('categories', 'CategoriesController', [
        'except' => ['show']
    ]);

});


Route::group(['namespace' => 'Frontend'], function () {

Route::get('/post/{id}', 'PostController@show')->name('post.show');
Route::get('/categories/{id}', 'CategoriesController@getCategoryPosts')->name('categories.posts');


Route::get('/', 'HomeController@index')->name('home');
});
