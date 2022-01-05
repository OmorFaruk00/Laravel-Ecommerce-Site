<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
	public function index(Request $request)
  {
    $data['home_banner'] = DB::table('banners')
    ->where(['status' => 1])
    ->get();

    $data['home_category'] = DB::table('categories')
    ->where(['status' => 1])
    ->get();

    foreach ($data['home_category'] as $list) {
      $data['home_category_product'][$list->id] = DB::table('products')
      ->where(['status' => 1])
      ->where(['category_id' => $list->id])
      ->get();

      foreach ($data['home_category_product'][$list->id] as $list1) {
        $data['product_attr'][$list1->id] =DB::table('product_attr')
        ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
        ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
        ->where(['product_attr.product_id' => $list1->id])
        ->get();
      }

    }
  //start tranding product
    $data['home_tranding_product'][$list->id] = DB::table('products')
    ->where(['status' => 1])
    ->where(['tranding' => 1])
    ->get();

    foreach ($data['home_tranding_product'][$list->id] as $list1) {
      $data['tranding_product_attr'][$list1->id] =DB::table('product_attr')
      ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
      ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
      ->where(['product_attr.product_id' => $list1->id])
      ->get();
    }
    //End tranding product
    //Start featured product
    $data['home_feature_product'][$list->id] = DB::table('products')
    ->where(['status' => 1])
    ->where(['feature' => 1])
    ->get();

    foreach ($data['home_feature_product'][$list->id] as $list1) {
      $data['feature_product_attr'][$list1->id] =DB::table('product_attr')
      ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
      ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
      ->where(['product_attr.product_id' => $list1->id])
      ->get();
    }
    //End featured product
    //Start featured product
    $data['home_discount_product'][$list->id] = DB::table('products')
    ->where(['status' => 1])
    ->where(['discount' => 1])
    ->get();

    foreach ($data['home_discount_product'][$list->id] as $list1) {
      $data['discount_product_attr'][$list1->id] =DB::table('product_attr')
      ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
      ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
      ->where(['product_attr.product_id' => $list1->id])
      ->get();
    }
    //End featured product


    $data['home_brand'] = DB::table('brands')
    ->where(['status' => 1])
    ->get();

    return view("front/index",$data);
  } 
  public function product(Request $request,$slug){
    $data['product'] = DB::table('products')
    ->where(['status' => 1])
    ->where(['slug' => $slug])
    ->get();

    foreach ($data['product'] as $list) {
      $data['product_attr'][$list->id] =DB::table('product_attr')
      ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
      ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
      ->where(['product_attr.product_id' => $list->id])
      ->get();
    }
    foreach ($data['product'] as $list) {
      $data['product_attr_img'][$list->id] =DB::table('product_attr_img')      
      ->where(['product_attr_img.product_id' => $list->id])
      ->get();
    }


       //Start related product
    $data['related_product'] = DB::table('products')
    ->where(['status' => 1])
    ->where('slug','!=', $slug)
    ->where(['category_id' => $data['product'][0]->category_id])
    ->get();

    foreach ($data['related_product'] as $list1) {
      $data['related_product_attr'][$list1->id] =DB::table('product_attr')
      ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
      ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
      ->where(['product_attr.product_id' => $list1->id])
      ->get();
    }
    
    return view('front/product',$data);

  }
  public function add_to_cart(Request $request)
  {    
    if($request->session()->has('User_id')){
      $uid = $request->session()->get('User_id');
      $user_type = "Reg";
    }else{      
      $uid = user_temp_id();
      $user_type = "No Reg";        
    }  
    
    $product_id = $request->post('product_id');
    $qty = $request->post('pqty');
    $size = $request->post('size_id');
    $color = $request->post('color_id');  
    $data = DB::table('product_attr')
    ->select('product_attr.id')
    ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
    ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
    ->where(['product_id'=> $product_id])
    ->where(['sizes.size'=> $size])
    ->where(['colors.color'=>  $color])
    ->get();
    $product_attr_id = $data[0]->id;    
    $check = DB::table('cart')
    ->where(['user_id'=> $uid])
    ->where(['user_type'=> $user_type])
    ->where(['product_id'=> $product_id])
    ->where(['product_attr_id'=> $product_attr_id])
    ->get();  
    if(isset($check[0])){
      $update_id = $check[0]->id;      
      DB::table('cart')
      ->where(['id'=> $update_id])
      ->update(['qty'=> $qty]);
      $msg = "updated";
    }
    else{
      DB::table('cart')->insert([
        'user_id'=> $uid,
        'user_type'=> $user_type,
        'qty'=> $qty,
        'product_id'=> $product_id,
        'product_attr_id'=> $product_attr_id,
        'added_on'=> date('Y-m-d h:i:s')
      ]);
      $msg = "added";
    }
    return response()->json(['msg'=>$msg]);


    

  }

}
