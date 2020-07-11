<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::resource('blog', 'BlogController');

// category
// Route::resource('category', 'CategoryController');
Route::middleware('auth')->group(function () {
    Route::get('/categories/{category:slug}', 'CategoryController@show')->withoutMiddleware('auth');
    Route::get('/category', 'CategoryController@index')->name('category.index');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');
    Route::get('/category/{category:slug}/edit', 'CategoryController@edit')->name('category.edit');
    Route::patch('/category/{category:slug}/edit', 'CategoryController@update')->name('category.update');
    Route::delete('/category/{category:slug}/delete', 'CategoryController@destroy')->name('category.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('tags', 'TagController@index')->name('tag.index');
    Route::get('tags/{tag:slug}', 'TagController@show')->name('tag.show')->withoutMiddleware('auth');
    Route::post('tag/store', 'TagController@store')->name('tag.store');
    Route::put('tag/{tag:slug}/update/', 'TagController@update')->name('tag.update');
    Route::delete('tag/{tag:slug}/delete', 'TagController@destroy')->name('tag.delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
