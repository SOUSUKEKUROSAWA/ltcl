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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', 'PostController@index');
    //Route::get('/', 'PostController@index')->middleware('auth');
    Route::get('/posts/create', 'PostController@create');
    Route::get('/posts/{post}', 'PostController@show');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::get('/categories/{category}', 'CategoryController@index');
    /*Route::get('/posts', function() {
        return view('posts/index');
    });*/
    //Route::get('/posts', 'PostController@index');

    Route::post('/posts', 'PostController@store');

    Route::put('/posts/{post}', 'PostController@update');

    Route::delete('/posts/{post}', 'PostController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
