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

  // echo "<pre>";
  // print_r($data);
  // die();
  $data['home_brand'] = DB::table('brands')
  ->where(['status' => 1])
  ->get();

  return view("front/index",$data);
} 

}
