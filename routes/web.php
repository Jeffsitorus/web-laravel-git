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

Route::get('/blogs', 'BlogController@index');
Route::get('/blogs/{blog:slug}', 'BlogController@show');
Route::get('/blog/create', 'BlogController@create');
Route::post('/blog/store', 'BlogController@store');

Route::get('/blog/{blog:slug}/edit','BlogController@edit');
Route::patch('/blog/{blog:slug}/edit','BlogController@update');