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
	Route::view("dashboard","admin/dashboard/show");
	Route::get("category/show","CategoryController@show");
	Route::view("category/add","admin/category/add");
	Route::post("category_add","CategoryController@store");
	Route::get("category/edit/{id}","CategoryController@edit_data");
	Route::post("category_update","CategoryController@update");
	Route::get("category/delete/{id}","CategoryController@destroy");
	Route::get("category/status/{id}/{status}","CategoryController@status");
    
	Route::get("size/show","SizeController@show");
	Route::view("size/add","admin/size/add");
	Route::post("size_add","SizeController@store");
	Route::get("size/edit/{id}","SizeController@edit_data");
	Route::post("size_update","SizeController@update");
	Route::get("size/delete/{id}","SizeController@destroy");
	Route::get("size/status/{id}/{status}","SizeController@status");

	Route::get('product/show','ProductController@show');
	Route::get('product/add','ProductController@add');
	Route::post("product_add","ProductController@store");
	Route::get("product/edit/{id}","ProductController@edit_data");
	Route::post("product_update","ProductController@update");
	Route::get("product/delete/{id}","ProductController@destroy");
	Route::get("product/status/{id}/{status}","ProductController@status");






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
