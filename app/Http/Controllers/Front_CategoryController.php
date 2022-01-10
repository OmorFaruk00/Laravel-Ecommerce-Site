<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Front_CategoryController extends Controller
{
   // start category controller
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
    // prx($data);
    return view('front/category',$data);

  }
  // end category controller
}
