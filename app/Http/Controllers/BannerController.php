<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Illuminate\Http\Request;
use File;

class BannerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([             
            'image'=>'required',     

        ]);
        if($request->has('btn_link') == '' || $request->has('btn_text') == ''){
            $request->btn_link = '';
            $request->btn_text = '';
        }
        else{

            $file = $request->file('image');
            $ext = $file->extension();
            $fileName = time().'.'.$ext;
            $file->move(public_path('banner_img'), $fileName);
            $data = new banner();
            $data->btn_text = $request->post('btn_text');
            $data->btn_link = $request->post('btn_link');   
            $data->image = $fileName;
            $data->status = 1;
            $data->save();
            $request->session()->flash('msg', 'Insert Successfully');
            return Redirect('/banner/show');
        }
    }
    public function show(Request $request)
    {
        $data['result'] = banner::orderBy('id','desc')->paginate(5);
        return view("admin/banner/show",$data);
    }
    public function edit_data(Request $request, $id)
    {
        $data['result'] = banner::find($id);
        return view("admin/banner/update",$data);
    }
    public function update(Request $request)
    {        
        if($request->has('btn_link') == '' || $request->has('btn_text') == ''){
            $request->btn_link = '';
            $request->btn_text = '';
        }
        else{
            $id = $request->post('id');
            $banner = banner::find($id);      
            $banner->btn_text = $request->post('btn_text');
            $banner->btn_link = $request->post('btn_link');    
            $banner->status = 1;
            
            if($request->hasfile('image')){
                File::delete('banner_img/'.$banner->image);
                $file = $request->file('image');
                $ext = $file->extension();
                $fileName = time().'.'.$ext;
                $file->move(public_path('banner_img'), $fileName);
                $banner->image = $fileName;                
            }
            $banner->save();
            $request->session()->flash('msg', 'Update Successfully');
            return Redirect('/banner/show');
        }
    }
    public function destroy(Request $request, $id)
    {
        $data = banner::find($id);
        $data->delete();
        $request->session()->flash('msg', 'Delete Successfully');
        return Redirect('/banner/show');
    }
    public function status(Request $request, $status, $id)    
    {        
        $data = banner::find($id);        
        $data->status=$status;
        $data->save();
        $request->session()->flash('msg', 'Status Change Successfully');
        return Redirect('/banner/show');
    }
}
