<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class admin extends Controller
{
	function login(Request $r){
		$email = $r->input('email');
		$password = $r->input('password');
		$result = DB::table('users')
		->where('email',$email)
		->where('password',$password)
		->get();

		if(isset($result[0]->id)){
			if($result[0]->status==1){
				$r->session()->put("ADMIN_ID",$result[0]->id);
				return Redirect('post/list');

			}else{
				session()->flash("msg","Your Account is Deactivated");
				return redirect('admin');
			}

		}else{
			session()->flash("msg","Email And Password Are Not Match");
			return redirect('admin');
		}	

	}
	
}
