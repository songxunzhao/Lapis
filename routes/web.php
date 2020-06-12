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

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::namespace('Dashboard')->prefix('dashboard')->group(function () {
        Route::get('/', 'DashboardController@index')->name('admin/dashboard');
    });
    Route::namespace('Courses')->prefix('courses')->group(function() {
        Route::get('/', 'CoursesController@index')->name('admin/courses');
        Route::post('/create', 'CoursesController@create')->name('admin/courses/create');
        Route::post('/update', 'CoursesController@update')->name('admin/courses/update');
    });
    Route::namespace('Blogs')->prefix('blogs')->group(function() {
        Route::get('/', 'BlogsController@index')->name('admin/blogs');
        Route::post('/create', 'BlogsController@create')->name('admin/blogs/create');
        Route::post('/update', 'BlogsController@update')->name('admin/blogs/update');
    });
    Route::namespace('Tags')->prefix('tags')->group(function() {
        Route::get('/', 'TagsController@index')->name('admin/tags');
    });
    Route::namespace('Transactions')->prefix('transactions')->group(function() {
        Route::get('/', 'TransactionsController@index')->name('admin/transactions');
    });

    Route::namespace('Users')->prefix('users')->group(function () {
        Route::get('/', 'UsersController@index')->name('admin/users');
        Route::get('/{id}/activate', 'UsersController@activate')->name('admin/users/activate');
    });
});