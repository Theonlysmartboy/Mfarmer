<?php
/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
   */
Route::get('/', function () {
    return view('welcome');
});
Route::match(['get', 'post'], '/admin', 'AdminController@login');
Route::get('/admin/settings', 'AdminController@settings');
Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updatePassword');
Route::get('/logout', 'AdminController@logout');
Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/check-pwd','AdminController@chkPassword');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
