<?php
use Illuminate\Support\Facades\Route;
 
Route::get('/', 'DashboardController')->name('dashboard');
Route::resource('posts', 'PostController')->except('show');
Route::resource('tags', 'TagController')->except('show');
Route::group(['middleware' => 'can:admin'], function () {
    Route::resource('users', 'UserController')->except('show');
});