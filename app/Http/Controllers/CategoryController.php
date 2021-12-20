<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
   
      public function store(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
            'slug'=>'required|unique:categories',
            
        ]);
       
        $data = new category();
        $data->name = $request->post('category_name');
        $data->slug = $request->post('slug');
        $data->status = 1;
        $data->save();
        $request->session()->flash('msg', 'Category Insert Successfully');
        return Redirect('/category/show');
    }

    
    public function show(category $category)
    {
        $data['result'] = category::orderBy('id','desc')->get();
        return view("admin/category/show",$data);
    }

    
    public function edit_data(Request $request, $id)
    {
        $data= category::find($id);        
        return view("admin/category/update",['data'=>$data]);
    }

    
    public function update(Request $request)
    {
        $data = category::find($request->id);
        $data->name = $request->category_name;
        $data->slug = $request->slug;
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
