<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Front_CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\test;




// Route::get("/", [FrontController::class,'index']);
// Route::get("product_detailes/{slug}",[FrontController::class,"product"]);
// Route::get("/cart",[FrontController::class,"cart_page"]);
// Route::post("add_to_cart",[FrontController::class,"add_to_cart"]);
// Route::get('category/{slug}',[Front_CategoryController::class,"category"]);
// Route::get('search/{str}',[FrontController::class,"product_search"]);
// Route::view("/signup","front/user_registration");

// Route::post("user_registration",[FrontController::class,"registration_process"]);
// Route::post("user_login",[FrontController::class,"login_process"]);
// Route::get("verification/{id}",[FrontController::class,"verification_process"]);




Route::get("/", "FrontController@index");
Route::get("product_detailes/{slug}","FrontController@product_detailes");
Route::get("/cart","FrontController@cart_page");
Route::post("add_to_cart","FrontController@add_to_cart");
Route::get('category/{slug}',"Front_CategoryController@category");
Route::get('search/{str}',"FrontController@product_search");
Route::view("/signup","front/user_registration");
Route::post("user_registration","FrontController@registration_process");
Route::post("user_login","FrontController@login_process");
Route::get("verification/{id}","FrontController@verification_process");
Route::view('verification','front/verification');
Route::post("forgot_password_process","FrontController@forgot_password");
Route::get("forgot_password_verification/{id}","FrontController@forgot_password_change");
Route::view('forgot_password_change','front/forgot_password');
Route::post("/change_password","FrontController@forgot_password_change_process");




Route::group(['middleware'=>['admin_auth']], function(){
	Route::view("dashboard","admin/dashboard/show");
	Route::get("category/show","CategoryController@show");
	Route::get("category/add","CategoryController@add");
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
	Route::get("product/attr_delete/{id}/{pid}","ProductController@attr_delete");
	Route::get("product/attr_img_delete/{id}/{pid}/{image}","ProductController@image_delete");
	

    Route::get('brand/show','BrandController@show');
	Route::view("brand/add","admin/brand/add");
	Route::post("brand_add","BrandController@store");
	Route::get("brand/edit/{id}","BrandController@edit_data");
	Route::post("brand_update","BrandController@update");
	Route::get("brand/delete/{id}","BrandController@destroy");
	Route::get("brand/status/{id}/{status}","BrandController@status");

    Route::get('banner/show','BannerController@show');
	Route::view("banner/add","admin/banner/add");
	Route::post("banner_add","BannerController@store");
	Route::get("banner/edit/{id}","BannerController@edit_data");
	Route::post("banner_update","BannerController@update");
	Route::get("banner/delete/{id}","BannerController@destroy");
	Route::get("banner/status/{id}/{status}","BannerController@status");



	
});
Route::view("admin","admin/login");
Route::post("login_submit","AdminController@login");
Route::get('logout', function () {
	session()->forget('ADMIN_ID');
	return redirect('admin');
});
Route::get('/user_logout', function () {
	session()->forget("User_login");
    session()->forget("User_id");
    session()->forget("User_name");
	return redirect('/');
});