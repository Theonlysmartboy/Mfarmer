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
//Categories routes
Route::match(['get', 'post'], '/admin/add_category', 'CategoryController@addCategory');
Route::get('/admin/view_categories', 'CategoryController@viewCategories');
Route::match(['get', 'post'], '/admin/edit_category/{id}', 'CategoryController@editCategory');
Route::match(['get', 'post'], '/admin/delete_category/{id}', 'CategoryController@deleteCategory');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
