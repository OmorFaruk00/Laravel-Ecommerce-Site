<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;
use File;
class BrandController extends Controller
{    
    public function store(Request $request)
    {
        $request->validate([
        'name'=>'required',        
        'image'=>'required|mimes:jpeg,jpg,png',      

    ]);
    if($request->file('image') == ''){
        $fileName = '';
    }else{

        $file = $request->file('image');
        $ext = $file->extension();
        $fileName = time().'.'.$ext;
        $file->move(public_path('brand_img'), $fileName);
    }

    $data = new brand();
    $data->name = $request->post('name');   
    $data->image = $fileName;
    $data->status = 1;
    $data->save();
    $request->session()->flash('msg', ' Insert Successfully');
    return Redirect('/brand/show');
    }

    public function show(brand $brand)
    {
        $data['result']=brand::orderBy('id', 'desc')->paginate(5);
        return view('admin/brand/show',$data);
    }

    
    public function edit_data(brand $brand, $id)
    {
       $data['result'] = brand::find($id);
       return view('admin/brand/update',$data);

    }

   
    public function update(Request $request, brand $brand)
    {
       $request->validate([
        'name'=>'required',        
        'image'=>'mimes:jpeg,jpg,png',      

    ]);
    $data = brand::find($request->id);
    $data->name = $request->post('name');    
    if($request->hasfile('image')){
        File::delete('brand_img/'.$data->image);
        $file = $request->file('image');
        $ext = $file->extension();
        $fileName = time().'.'.$ext;
        $file->move(public_path('brand_img'), $fileName);
        $data['image']=$fileName;
    } 
    $data->save();
    $request->session()->flash('msg', 'Update Successfully');
    return Redirect('/brand/show');
    }

    
   public function destroy(Request $request, $id)
{
    $data = brand::find($id);
    $data->delete();
    $request->session()->flash('msg', 'elete Successfully');
    return Redirect('/brand/show');
}
public function status(Request $request, $status, $id)    
{        
    $data = brand::find($id);        
    $data->status = $status;
    $data->save();
    $request->session()->flash('msg', 'Status Change Successfully');
    return Redirect('/brand/show');
}
}
