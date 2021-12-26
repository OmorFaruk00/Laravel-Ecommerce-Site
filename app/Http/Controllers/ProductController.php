<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
public function add(Request $request)
    {
     $data['result'] = DB::table('categories')->get();
     $data['brand'] = DB::table('brands')->get();
     $data['size'] = DB::table('sizes')->get();
     $data['color'] = DB::table('colors')->get();
     return view("admin/product/add",$data);
 } 
 public function store(Request $request)
 {
    
    
        // $request->validate([
        //     'title'=>'required',
        //     'slug'=>'required|unique:categories',
        //     'category'=>'required',
        //     'model'=>'required',
        //     'brand'=>'required',
        //     'short_desc'=>'required',
        //     'desc'=>'required',
        //     'qty'=>'required',
        //     'price'=>'required',
        //     'image'=>'required',

        // ]);
    // $file = $request->file('image');
    // $ext = $file->extension();
    // $fileName = time().'.'.$ext;
    // $file->move(public_path('product_img'), $fileName);

    // $data = new product();
    // $data->title = $request->post('title');
    // $data->slug = $request->post('slug');
    // $data->category_id = $request->post('category');
    // $data->model = $request->post('model');
    // $data->brand_id = $request->post('brand_id');
    // $data->short_desc = $request->post('short_desc');
    // $data->desc = $request->post('desc');
    // $data->qty = $request->post('qty');
    // $data->price = $request->post('price');        
    // $data->image = $fileName;        
    // $data->warrenty = 23;        
    // $data->status = 1;
    // $data->lead_time = $request->post('lead_time'); 
    // $data->promo = $request->post('promo'); 
    // $data->tranding = $request->post('tranding'); 
    // $data->feature = $request->post('feature'); 
    // $data->discount = $request->post('discount'); 
    // $data->save();


    

   $sku = $request->post('sku');  
   $mrp = $request->post('mrp');
   $price = $request->post('price');
   $size = $request->post('size');
   $color = $request->post('color');
   
    // echo "<pre>";
    // print_r($sku);
    // die();
   foreach($sku as $key=>$val){   
   $product_arr['product_id']=1;
    $product_arr['sku'] = $sku[$key];
    $product_arr['mrp'] = $mrp[$key];
    if($price[$key] == ""){
        $price[$key] = '';
    }else{
       $product_arr['price'] = $price[$key];
    }    
    if($size[$key]==""){
        $size[$key] = '';
    }else{
        $product_arr['size'] = $size[$key];
    }
    if($color[$key] == ""){
        $color[$key] = '';
    }else{
         $product_arr['color'] = $color[$key];
    }
   
    $product_arr['image']=1;
    $product_arr['status']=1;
    DB::table('product_attr')->insert($product_arr);
   }
   // echo $sku;
    // echo "<pre>";
    // print_r($request->post());
    // die();
    // $request->session()->flash('msg', ' Insert Successfully');
    return Redirect('/product/show');
}
public function show(product $product)
{
 $data['result'] = product::orderBy('id','desc')->paginate(5);
 return view("admin/product/show",$data);
}

public function edit_data(Request $request, $id)
{
    $data['category'] = DB::table('categories')->get();
    $data['brand'] = DB::table('brands')->get();
    $data['product'] = product::find($id);        
    return view("admin/product/update",$data);
}

public function update(Request $request)
{   

    // $request->validate([
    //     'title'=>'required',
    //     'slug'=>'required|unique:categories',
    //     'category'=>'required',
    //     'model'=>'required',
    //     'brand'=>'required',
    //     'short_desc'=>'required',
    //     'desc'=>'required',
    //     'qty'=>'required',
    //     'price'=>'required',

    // ]);

    $data = product::find($request->id);
    $data->title = $request->post('title');
    $data->slug = $request->post('slug');
    $data->category_id = $request->post('category');
    $data->model = $request->post('model');
    $data->brand_id = $request->post('brand_id');
    $data->short_desc = $request->post('short_desc');
    $data->desc = $request->post('desc');
    $data->qty = $request->post('qty');
    $data->price = $request->post('price');            
    $data->warrenty = 23;        
    $data->status = 1;
    $data->lead_time = $request->post('lead_time'); 
    $data->promo = $request->post('promo'); 
    $data->tranding = $request->post('tranding'); 
    $data->feature = $request->post('feature'); 
    $data->discount = $request->post('discount');
    if($request->hasfile('image')){
        $file = $request->file('image');
        $ext = $file->extension();
        $fileName = time().'.'.$ext;
        $file->move(public_path('product_img'), $fileName);
        $data['image']=$fileName;
    }   
    $data->save();
    $request->session()->flash('msg', 'Update Successfully');
    return Redirect('/product/show');
}

public function destroy(Request $request, $id)
{
    $data = product::find($id);
    $data->delete();
    $request->session()->flash('msg', ' Delete Successfully');
    return Redirect('/product/show');
}
public function status(Request $request, $status, $id)    
{        
    $data = product::find($id);        
    $data->status=$status;
    $data->save();
    $request->session()->flash('msg', 'Status Change Successfully');
    return Redirect('/product/show');
}
}
