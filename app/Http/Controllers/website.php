<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class website extends Controller
{
    function index(){
    	// return "pk";
    	$user['to'] ="omorfaruk5020@gmail.com";
    	$data = ['name' =>'omor', "data"=>"hello omor"];
    	Mail::send('front/email_verification', $data, function($message) use($user){
    		$message->to($user['to']);
    		$message->subject("hello Omor");

    	});

    	}
    	function mailView()
    {
        return view('mail');
    }
    
}
