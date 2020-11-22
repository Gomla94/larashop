<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/redirect', 'Socialite\SocialiteController@redirect')->name('facebook.login');
Route::get('/callback', 'Socialite\SocialiteController@callback');

Route::group(['prefix' => 'admin'], function () {
    Route::get('home', 'Admin\HomeController@home');
    Route::get('categories', 'Admin\CategoryController@index')->name('admin.categories.index');
    Route::get('categories/create', 'Admin\CategoryController@create')->name('admin.categories.create');
    Route::post('categories/create', 'Admin\CategoryController@store')->name('admin.categories.store');
    Route::get('categories/{category}', 'Admin\CategoryController@show')->name('admin.categories.show');
    Route::get('categories/{category}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
    Route::put('categories/{category}/edit', 'Admin\CategoryController@update')->name('admin.categories.update');
    Route::delete('categories/{category}', 'Admin\CategoryController@destroy')->name('admin.categories.delete');

    Route::get('products', 'Admin\ProductController@index')->name('admin.products.index');
    Route::get('products/create', 'Admin\ProductController@create')->name('admin.products.create');
    Route::post('products/create', 'Admin\ProductController@store')->name('admin.products.store');
    Route::get('products/{product}', 'Admin\ProductController@show')->name('admin.products.show');
});
