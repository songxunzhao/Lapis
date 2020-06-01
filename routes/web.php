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

Route::get('/', 'HomeController@index')->name('home');
Route::namespace('Auth')->group(function () {
    Route::post('/auth/login', 'LoginController@login')->name('login');
    Route::get('/auth/logout', 'LoginController@logout')->name('logout');
    Route::post('/auth/register', 'RegisterController@register')->name('register');
});

Route::namespace('Course')->prefix('course/')->group(function () {
    Route::get('/', 'CourseController@all')->name('courses');
});

Route::namespace('Blog')->prefix('blog/')->group(function() {
    Route::get('/', 'BlogController@all')->name('blogs');
});