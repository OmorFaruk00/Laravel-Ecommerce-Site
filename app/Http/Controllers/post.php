<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class post extends Controller
{
	function show_post(){
		$data= DB::table('posts')->orderBy('id','desc')->get();   	  	
		return view("admin.post.list",['data'=>$data]);
	}
	function add_post(Request $req){
		$file = $req->file('image');
		$ext = $file->extension();
		$fileName = time().'.'.$ext;
		$file->move(public_path('post1'), $fileName);

		$req->validate([
			'title'=>'required',
			'short_desc'=>'required',
			'long_desc'=>'required',
			// 'image'=>'required',
			'added_on'=>'required',
		]);
		
		$data = array(
			'title'=>$req->input('title'),
			'short_desc'=>$req->input('short_desc'),
			'long_desc'=>$req->input('long_desc'),
			'image'=>$fileName,
			'status'=>1,
			'added_on'=>$req->input('added_on')
		);
		DB::table('posts')->insert($data);
		$req->session()->flash('msg',"Post Add Successfuly");
		return redirect('post/list');

	}
	function edit_post(Request $request, $id){
		$data= DB::table('posts')->where('id',$id)->get();   	  	
		return view("admin.post.update_post",['data'=>$data]);
	}
	function update_post(Request $req,$id){
		$req->validate([
			'title'=>'required',
			'short_desc'=>'required',
			'long_desc'=>'required',			
			'added_on'=>'required',
		]);
		
		$data = array(
			'title'=>$req->input('title'),
			'short_desc'=>$req->input('short_desc'),
			'long_desc'=>$req->input('long_desc'),			
			'status'=>1,
			'added_on'=>$req->input('added_on')
		);
		if($req->hasfile('image')){
			$file = $req->file('image');
			$ext = $file->extension();
			$fileName = time().'.'.$ext;
			$file->move(public_path('post1'), $fileName);
			$data['image']=$fileName;
		}	
		
		DB::table('posts')->where('id',$id)->update($data);
		$req->session()->flash('msg',"Post Update Successfuly");
		return redirect('post/list');


	}
	function delete_post(Request $req,$id){
		DB::table('posts')->where('id',$id)->delete();
		$req->session()->flash('msg',"Post Delete Successfuly");
		return redirect('post/list');
	}
}
