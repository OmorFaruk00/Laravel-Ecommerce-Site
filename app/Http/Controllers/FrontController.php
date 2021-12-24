<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
	public function index(Request $request)
    {
       $data['home_category'] = DB::table('categories')
       ->where(['status' => 1])
       ->get();

       foreach ($data['home_category'] as $list) {
       	$data['home_category_product'][$list->id] = DB::table('products')
       ->where(['status' => 1])
       ->where(['category_id' => $list->id])
       ->get();
       	
       }
       // echo "<pre>";
       // print_r($data);
       return view("front/index",$data);
    } 
    
}
