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
     $qty = $request->post('qty');
     $size = $request->post('size');
     $color = $request->post('color');  

     foreach($sku as $key=>$val){   
         $product_arr['product_id']=1;
         $product_arr['sku'] = $sku[$key];
         $product_arr['mrp'] = $mrp[$key];
         $product_arr['qty'] = $qty[$key];
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
   $request->session()->flash('msg', ' Insert Successfully');
   return Redirect('/product/show');
}


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
    $data['size'] = DB::table('sizes')->get();
    $data['color'] = DB::table('colors')->get();
    $data['product_attr'] = DB::table('product_attr')->where('product_id',1)->get();
    // echo"<pre>";
    // print_r($data['product_attr']);

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

    // $data = product::find($request->id);
    // $data->title = $request->post('title');
    // $data->slug = $request->post('slug');
    // $data->category_id = $request->post('category');
    // $data->model = $request->post('model');
    // $data->brand_id = $request->post('brand_id');
    // $data->short_desc = $request->post('short_desc');
    // $data->desc = $request->post('desc');
    // $data->qty = $request->post('qty');
    // $data->price = $request->post('price');            
    // $data->warrenty = 23;        
    // $data->status = 1;
    // $data->lead_time = $request->post('lead_time'); 
    // $data->promo = $request->post('promo'); 
    // $data->tranding = $request->post('tranding'); 
    // $data->feature = $request->post('feature'); 
    // $data->discount = $request->post('discount');
    // if($request->hasfile('image')){
    //     $file = $request->file('image');
    //     $ext = $file->extension();
    //     $fileName = time().'.'.$ext;
    //     $file->move(public_path('product_img'), $fileName);
    //     $data['image']=$fileName;
    // }   
    // $data->save();
    $attr_id = $request->post('attr_id');
    $sku = $request->post('sku');  
    $mrp = $request->post('mrp');
    $price = $request->post('price');
    $qty = $request->post('qty');
    $size = $request->post('size');
    $color = $request->post('color');
// dd(DB::table('product_attr')->where('id',$attr_id)->get());
    foreach($sku as $key=>$val){
        $product_arr['product_id']=1;
        $product_arr['sku'] = $sku[$key];
        $product_arr['mrp'] = $mrp[$key];
        $product_arr['qty'] = $qty[$key];
        $product_attr_id = $attr_id[$key];        
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
           
        if($product_attr_id == ''){            
            DB::table('product_attr')->insert($product_arr);      
            
        }else{
            DB::table('product_attr')->where(['id'=>$product_attr_id])->update($product_arr);           

        }        
    }
    // $request->session()->flash('msg', 'Update Successfully');
        return Redirect('/product/show');
}

public function destroy(Request $request, $id)
{
    $data = product::find($id);
    $data->delete();
    $request->session()->flash('msg', ' Delete Successfully');
    return Redirect('/product/show');
}
public function attr_delete(Request $request, $id,$pid)

{ 
  DB::table('product_attr')->where('id', '=', $id)->delete();   
  $request->session()->flash('msg', ' Delete Successfully');
  return Redirect('/product/edit/'.$pid);
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
