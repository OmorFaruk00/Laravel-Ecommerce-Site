<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Crypt;
use Mail;

class UserController extends Controller
{
	function index(){
		return "ok";
	}
	
//   function registration_process(Request $request){
//    $valid = validator::make($request->all(),[
//     "first_name"=>'required',
//     "last_name"=>'required',
//     "email"=>'required|email|unique:customers,email',
//     "password"=>'required',
//     "mobile"=>'required|numeric|digits:11',
//   ]);
//    if(!$valid->passes()){
//     return response()->json(['status'=>'error', "error"=>$valid->errors()]);
//   }else{
//     $rand_id = rand(111111111,999999999);
//     $result = DB::table('customers')->insert([
//       "first_name"=>$request->first_name,
//       "last_name"=>$request->last_name,
//       "email"=>$request->email,
//       "password"=>Crypt::encrypt($request->password),
//       "phone"=>$request->mobile,
//       "status"=>1,
//       "is_verify"=>0,
//       "rand_id"=>$rand_id
//     ]);
//     if($result){
//       $user['to'] = $request->email;
//       $data = ['name' =>$request->first_name, "rand_id"=>$rand_id];
//       Mail::send('front/email_verification', $data, function($message) use($user){
//         $message->to($user['to']);
//         $message->subject("Email Id Varification");

//       });
//       return response()->json(['status'=>'success', "msg"=>"Registration Successfully, Plesae check your email id for varification"]);
//     }
//   }
// }

// function login_process(Request $request){
//   $user_email = $request->user_email;
//   $user_password = $request->user_password;
//   $result = DB::table('customers')
//   ->where(['email' => $user_email])  
//   ->get();
//   if(isset($result[0])){
//     $status = $result[0]->status;
//     $verify = $result[0]->is_verify;
//     if($verify==0){
//       return response()->json(['status'=>'error', "msg"=>'Please Verify Your Email']);
//     }
//     if($status==0){
//       return response()->json(['status'=>'error', "msg"=>'Your account has been deactivate']);
//     }
//     $db_password = Crypt::decrypt($result[0]->password);
//     if($db_password == $user_password){
//       if($request->rememberme === null){
//         setcookie("user_email",$request->user_email,100);
//         setcookie("user_password",$request->user_password,100);
//       }else{
//         setcookie("user_email",$request->user_email,time()+60*60*24*100);
//         setcookie("user_password",$request->user_password,time()+60*60*24*100);
//       }        
//       $request->session()->put("User_login",true);
//       $request->session()->put("User_id",$result[0]->id); 
//       $request->session()->put("User_name",$result[0]->first_name.$result[0]->last_name);
//       $status = "success";
//       $msg = "";
//     }else{
//       $status = "error";
//       $msg = "Please Enter Vailed Password";
//     }

//   }else{
//     $status = "error";
//     $msg = "Please Enter Vailed Email Id";
//   }
//   return response()->json(['status'=>$status, "msg"=>$msg]);

// }
// function verification_process(Request $request,$id){
//   $result = DB::table('customers')  
//   ->where(['rand_id' => $id])
//   ->get();

//   if($result[0]){
//      DB::table('customers')  
//   ->where(['rand_id' => $id])
//   ->update(['is_verify' => 1]);
//   return view('front/verification');
  
//   }else{
//     return redirect('/');
//   }
// }




}
