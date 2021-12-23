<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
       $data['result'] = DB::table('categories')->get();
       return view("admin/product/add",$data);
    } 
    

    
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:categories',
            'category'=>'required',
            'model'=>'required',
            'brand'=>'required',
            'short_desc'=>'required',
            'desc'=>'required',
            'qty'=>'required',
            'price'=>'required',
            'image'=>'required',
            
        ]);
        $file = $request->file('image');
        $ext = $file->extension();
        $fileName = time().'.'.$ext;
        $file->move(public_path('product_img'), $fileName);
       
        $data = new product();
        $data->title = $request->post('title');
        $data->slug = $request->post('slug');
        $data->category_id = $request->post('category');
        $data->model = $request->post('model');
        $data->brand = $request->post('brand');
        $data->short_desc = $request->post('short_desc');
        $data->desc = $request->post('desc');
        $data->qty = $request->post('qty');
        $data->price = $request->post('price');        
        $data->image = $fileName;        
        $data->warrenty = 23;        
        $data->status = 1;
        $data->save();
        $request->session()->flash('msg', 'Product Insert Successfully');
        return Redirect('/product/show');
    }

    
    public function show(product $product)
    {
       $data['result'] = product::orderBy('id','desc')->paginate(5);
        return view("admin/product/show",$data);
    }

    public function edit_data(Request $request, $id)
    {
        $cat['category'] = DB::table('categories')->get();
        $data = product::find($id);        
        return view("admin/product/update",['data'=>$data],$cat);

        
    }

    
    public function update(Request $request)
    {
         
         
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:categories',
            'category'=>'required',
            'model'=>'required',
            'brand'=>'required',
            'short_desc'=>'required',
            'desc'=>'required',
            'qty'=>'required',
            'price'=>'required',
            
            
        ]);
       
       
        $data = product::find($request->id);
        $data->title = $request->post('title');
        $data->slug = $request->post('slug');
        $data->category_id = $request->post('category');
        $data->model = $request->post('model');
        $data->brand = $request->post('brand');
        $data->short_desc = $request->post('short_desc');
        $data->desc = $request->post('desc');
        $data->qty = $request->post('qty');
        $data->price = $request->post('price');             
        $data->warrenty = 23;        
        $data->status = 1;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $ext = $file->extension();
            $fileName = time().'.'.$ext;
            $file->move(public_path('product_img'), $fileName);
            $data['image']=$fileName;
        }   
        $data->save();
        $request->session()->flash('msg', 'Product update Successfully');
        return Redirect('/product/show');
    }

    public function destroy(Request $request, $id)
    {
        $data = product::find($id);
        $data->delete();
        $request->session()->flash('msg', 'Product Delete Successfully');
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
