<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

// blogs
// Route::get('/blogs', 'BlogController@index');
// Route::get('/blogs/{blog:slug}', 'BlogController@show');
// Route::get('/blog/create', 'BlogController@create');
// Route::post('/blog/store', 'BlogController@store');
// Route::get('/blog/{blog:slug}/edit', 'BlogController@edit');
// Route::patch('/blog/{blog:slug}/edit', 'BlogController@update');
// Route::delete('/blog/{blog:slug}/delete', 'BlogController@destroy');


Route::resource('blog', 'BlogController');


// category
// Route::resource('category', 'CategoryController');
Route::get('/categories/{category:slug}', 'CategoryController@show');
Route::get('/category', 'CategoryController@index')->name('category.index');
Route::get('/category/create', 'CategoryController@create')->name('category.create');
Route::post('/category/store', 'CategoryController@store')->name('category.store');
Route::get('/category/{category:slug}/edit', 'CategoryController@edit')->name('category.edit');
Route::patch('/category/{category:slug}/edit', 'CategoryController@update')->name('category.update');
Route::delete('/category/{category:slug}/delete', 'CategoryController@destroy')->name('category.destroy');
