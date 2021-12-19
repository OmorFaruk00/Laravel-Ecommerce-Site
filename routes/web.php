<?php

use Illuminate\Support\Facades\Route;

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



Route::view("admin","admin/login");
Route::post("login_submit","AdminController@login");

Route::group(['middleware'=>['admin_auth']], function(){
	Route::get("category/show","CategoryController@show");
	Route::view("category/add","admin/category/add");
	Route::post("category_add","CategoryController@store")->name('category_add');
	Route::get("category/edit/{id}","CategoryController@edit_data");
	Route::post("category_update","CategoryController@update")->name('category_update');
	Route::get("category/delete/{id}","CategoryController@destroy");
    Route::view('edit','admin/category/update');
	
	// Route::get("post/list","post@show_post");
	// Route::view("post/add","admin/post/add_post");
	// Route::post("post_submit","post@add_post");
	// Route::get("post/update/{id}","post@edit_post")->name('post/update');
	// Route::post("post_update/{id}","post@update_post");
	// Route::get("post/delete/{id}","post@delete_post");
});

Route::get('logout', function () {
	session()->forget('ADMIN_ID');
	return redirect('admin');
});
