<?php

namespace App\Http\Controllers;

use App\Models\size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
      public function store(Request $request)
    {
        $request->validate([
            'size'=>'required',            
         
        ]);
       
        $data = new size();
        $data->size = $request->post('size');        
        $data->status = 1;
        $data->save();
        $request->session()->flash('msg', 'Size Insert Successfully');
        return Redirect('/size/show');
    }

    
    public function show()
    {
        $data['result'] = size::orderBy('id','desc')->get();
        return view("admin/size/show",$data);
    }

    
    public function edit_data(Request $request, $id)
    {
        $data= size::find($id);        
        return view("admin/size/update",['data'=>$data]);
    }

    
    public function update(Request $request)
    {
        $data = size::find($request->id);
        $data->size = $request->size;        
        $data->save();
         $request->session()->flash('msg', 'Size Update Successfully');
        return Redirect('/size/show');
    }

    
    public function destroy(Request $request, $id)
    {
        $data = size::find($id);
        $data->delete();
        $request->session()->flash('msg', 'Size Delete Successfully');
        return Redirect('/size/show');
    }
    public function status(Request $request, $status, $id)    
    {        
        $data = size::find($id);        
        $data->status=$status;
        $data->save();
        $request->session()->flash('msg', 'Status Change Successfully');
        return Redirect('/size/show');
    }
}
