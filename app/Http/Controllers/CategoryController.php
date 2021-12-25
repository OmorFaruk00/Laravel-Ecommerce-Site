<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class CategoryController extends Controller
{
 public function add(Request $request)
 {
   $data['result'] = category::get();
   return view("admin/category/add",$data);
}
public function store(Request $request)
{
    $request->validate([
        'category_name'=>'required',
        'slug'=>'required|unique:categories',       
        
    ]);
    if($request->file('image') == ''){
        $fileName = '';
    }else{

        $file = $request->file('image');
        $ext = $file->extension();
        $fileName = time().'.'.$ext;
        $file->move(public_path('category_img'), $fileName);
    }

    $data = new category();
    $data->name = $request->post('category_name');
    $data->slug = $request->post('slug');
    $data->parent_id = $request->post('parent_category');
    $data->image = $fileName;
    $data->status = 1;
    $data->save();
    $request->session()->flash('msg', 'Category Insert Successfully');
    return Redirect('/category/show');  
    
}
public function show(category $category)
{
    $data['result'] = category::orderBy('id','desc')->paginate(5);
    return view("admin/category/show",$data);
}
public function edit_data(Request $request, $id)
{
    $data = category::find($id);
    $category['result'] = category::where('id', '!=', $id )->get();

    return view("admin/category/update",['data'=>$data],$category);
}
public function update(Request $request)
{
    $request->validate([
        'category_name'=>'required',      

    ]);
    $data = category::find($request->id);
    $data->name = $request->category_name;
    $data->slug = $request->slug;
    $data->parent_id = $request->parent_category;
    if($request->hasfile('image')){
        File::delete('category_img/'.$data->image);
        $file = $request->file('image');
        $ext = $file->extension();
        $fileName = time().'.'.$ext;
        $file->move(public_path('category_img'), $fileName);
        $data['image']=$fileName;
    } 
    $data->save();
    $request->session()->flash('msg', 'Category Update Successfully');
    return Redirect('/category/show');
}
public function destroy(Request $request, $id)
{
    $data = category::find($id);
    $data->delete();
    $request->session()->flash('msg', 'Category Delete Successfully');
    return Redirect('/category/show');
}
public function status(Request $request, $status, $id)    
{        
    $data = category::find($id);        
    $data->status=$status;
    $data->save();
    $request->session()->flash('msg', 'Status Change Successfully');
    return Redirect('/category/show');
}
}
