<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Front_CategoryController extends Controller
{
     function category( Request $request,$slug){
  	$data['product'] = DB::table('products')
  	->leftjoin('categories', 'categories.id', '=', 'products.category_id')
    ->where(['products.status' => 1])
    ->where(['categories.slug' => $slug])
    ->select("products.*")
    ->get();

    foreach ($data['product'] as $list) {
      $data['product_attr'][$list->id] =DB::table('product_attr')
      ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
      ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
      ->where(['product_attr.product_id' => $list->id])
      ->get();
    } 
    $data['left_category'] = DB::table('categories')
    ->where(['status' => 1])
    ->get();   
    return view('front/category',$data);
  }  
}
