<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Crypt;
use Mail;

class FrontController extends Controller
{
	public function index(Request $request)
  {
    $data['home_banner'] = DB::table('banners')
    ->where(['status' => 1])
    ->get();

    $data['home_category'] = DB::table('categories')
    ->where(['status' => 1])
    ->get();

    foreach ($data['home_category'] as $list) {
      $data['home_category_product'][$list->id] = DB::table('products')
      ->where(['status' => 1])
      ->where(['category_id' => $list->id])
      ->get();

      foreach ($data['home_category_product'][$list->id] as $list1) {
        $data['product_attr'][$list1->id] =DB::table('product_attr')
        ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
        ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
        ->where(['product_attr.product_id' => $list1->id])
        ->get();
      }

    }
  // tranding productt function start here
    $data['home_tranding_product'][$list->id] = DB::table('products')
    ->where(['status' => 1])
    ->where(['tranding' => 1])
    ->get();

    foreach ($data['home_tranding_product'][$list->id] as $list1) {
      $data['tranding_product_attr'][$list1->id] =DB::table('product_attr')
      ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
      ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
      ->where(['product_attr.product_id' => $list1->id])
      ->get();
    }

  // featured product function start here
    $data['home_feature_product'][$list->id] = DB::table('products')
    ->where(['status' => 1])
    ->where(['feature' => 1])
    ->get();

    foreach ($data['home_feature_product'][$list->id] as $list1) {
      $data['feature_product_attr'][$list1->id] =DB::table('product_attr')
      ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
      ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
      ->where(['product_attr.product_id' => $list1->id])
      ->get();
    }
   // discount product function start here     
    $data['home_discount_product'][$list->id] = DB::table('products')
    ->where(['status' => 1])
    ->where(['discount' => 1])
    ->get();

    foreach ($data['home_discount_product'][$list->id] as $list1) {
      $data['discount_product_attr'][$list1->id] =DB::table('product_attr')
      ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
      ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
      ->where(['product_attr.product_id' => $list1->id])
      ->get();
    }

// home brand function start here
    $data['home_brand'] = DB::table('brands')
    ->where(['status' => 1])
    ->get();
    return view("front/index",$data);
  } 
  // product_detailes function start here
  public function product_detailes(Request $request,$slug){
    $data['product'] = DB::table('products')
    ->where(['status' => 1])
    ->where(['slug' => $slug])
    ->get();

    foreach ($data['product'] as $list) {
      $data['product_attr'][$list->id] =DB::table('product_attr')
      ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
      ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
      ->where(['product_attr.product_id' => $list->id])
      ->get();
    }
    foreach ($data['product'] as $list) {
      $data['product_attr_img'][$list->id] =DB::table('product_attr_img')      
      ->where(['product_attr_img.product_id' => $list->id])
      ->get();
    }
       // related product function start here
    $data['related_product'] = DB::table('products')
    ->where(['status' => 1])
    ->where('slug','!=', $slug)
    ->where(['category_id' => $data['product'][0]->category_id])
    ->get();

    foreach ($data['related_product'] as $list1) {
      $data['related_product_attr'][$list1->id] =DB::table('product_attr')
      ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
      ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
      ->where(['product_attr.product_id' => $list1->id])
      ->get();
    }    
    return view('front/product_detailes',$data);

  }
  //  add to cart function start here
  public function add_to_cart(Request $request)
  {    
    if($request->session()->has('User_id')){
      $uid = $request->session()->get('User_id');
      $user_type = "Reg";
    }else{      
      $uid = user_temp_id();
      $user_type = "No Reg";        
    } 
    $product_id = $request->post('product_id');
    $qty = $request->post('pqty');
    $size = $request->post('size_id');
    $color = $request->post('color_id');  
    $data = DB::table('product_attr')
    ->select('product_attr.id')
    ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
    ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
    ->where(['product_id'=> $product_id])
    ->where(['sizes.size'=> $size])
    ->where(['colors.color'=>  $color])
    ->get();
    $product_attr_id = $data[0]->id;
    $check = DB::table('cart')
    ->where(['user_id'=> $uid])
    ->where(['user_type'=> $user_type])
    ->where(['product_id'=> $product_id])
    ->where(['product_attr_id'=> $product_attr_id])
    ->get();
    if(isset($check[0])){
      $update_id = $check[0]->id;      
      if($qty == 0){
        DB::table('cart')
        ->where(['id'=> $update_id])
        ->delete();
        $msg = "Remove";       
      }else{
        DB::table('cart')
        ->where(['id'=> $update_id])
        ->update(['qty'=> $qty]);
        $msg = "Updated";
      }      
    }
    else{
      DB::table('cart')->insert([
        'user_id'=> $uid,
        'user_type'=> $user_type,
        'qty'=> $qty,
        'product_id'=> $product_id,
        'product_attr_id'=> $product_attr_id,
        'added_on'=> date('Y-m-d h:i:s')
      ]);
      $msg = "Added";      
    }    
    $data = DB::table('cart')
    ->leftjoin('products', 'products.id', '=', 'cart.product_id')
    ->leftjoin('product_attr', 'product_attr.id', '=', 'cart.product_attr_id')
    ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
    ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
    ->where(['user_id' => $uid])
    ->where(['user_type' => $user_type])
    ->select('products.id as pid','products.title','products.slug','products.image','cart.qty','sizes.size','colors.color','product_attr.price','product_attr.id as attr_id')
    ->get();      
    $total_cart = count($data);
    return response()->json(["msg"=>$msg,"total_cart"=>$total_cart,"result"=>$data]);
  }
  //  cart page function start here
  function cart_page(Request $request){
    if($request->session()->has('User_id')){
      $uid = $request->session()->get('User_id');
      $user_type = "Reg";
    }else{      
      $uid = user_temp_id();
      $user_type = "No Reg";        
    }
    $data["result"] =DB::table('cart')
    ->leftjoin('products', 'products.id', '=', 'cart.product_id')
    ->leftjoin('product_attr', 'product_attr.id', '=', 'cart.product_attr_id')
    ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
    ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
    ->where(['user_id' => $uid])
    ->where(['user_type' => $user_type])
    ->select('products.id as pid','products.title','products.slug','products.image','cart.qty','sizes.size','colors.color','product_attr.price','product_attr.id as attr_id')
    ->get();    
    return view('front/cart',$data);
  }
  //  product search function start here
  function product_search(Request $request,$str){
    $data['product'] = DB::table('products')    
    ->where(['status' => 1])
    ->where('title', 'like',"%$str%")   
    ->orwhere('model', 'like',"%$str%")   
    ->orwhere('short_desc', 'like',"%$str%")   
    ->orwhere('desc', 'like',"%$str%") 
    ->get();

    foreach ($data['product'] as $list) {
      $data['product_attr'][$list->id] =DB::table('product_attr')
      ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
      ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
      ->where(['product_attr.product_id' => $list->id])
      ->get();
    }    
    return view('front/search_product',$data);
  }
  //  registration process function start here
  function registration_process(Request $request){
   $valid = validator::make($request->all(),[
    "first_name"=>'required',
    "last_name"=>'required',
    "email"=>'required|email|unique:customers,email',
    "password"=>'required',
    "mobile"=>'required|numeric|digits:11',
  ]);
   if(!$valid->passes()){
    return response()->json(['status'=>'error', "error"=>$valid->errors()]);
  }else{
    $rand_id = rand(111111111,999999999);
    $result = DB::table('customers')->insert([
      "first_name"=>$request->first_name,
      "last_name"=>$request->last_name,
      "email"=>$request->email,
      "password"=>Crypt::encrypt($request->password),
      "phone"=>$request->mobile,
      "status"=>1,
      "is_verify"=>0,
      "rand_id"=>$rand_id,
      "forgot_pass"=>0
    ]);
    if($result){
      $user['to'] = $request->email;
      $data = ['name' =>$request->first_name, "rand_id"=>$rand_id];
      Mail::send('front/email_verification', $data, function($message) use($user){
        $message->to($user['to']);
        $message->subject("Email Id Varification");

      });
      return response()->json(['status'=>'success', "msg"=>"Registration Successfully, Plesae Check Your Email Id For Verification"]);
    }
  }
}
// login process function start here
function login_process(Request $request){
  $user_email = $request->user_email;
  $user_password = $request->user_password;
  $result = DB::table('customers')
  ->where(['email' => $user_email])  
  ->get();
  if(isset($result[0])){
    $status = $result[0]->status;
    $verify = $result[0]->is_verify;
    if($verify==0){
      return response()->json(['status'=>'error', "msg"=>'Please Verify Your Email']);
    }
    if($status==0){
      return response()->json(['status'=>'error', "msg"=>'Your account has been deactivate']);
    }
    $db_password = Crypt::decrypt($result[0]->password);
    if($db_password == $user_password){
      if($request->rememberme === null){
        setcookie("user_email",$request->user_email,100);
        setcookie("user_password",$request->user_password,100);
      }else{
        setcookie("user_email",$request->user_email,time()+60*60*24*100);
        setcookie("user_password",$request->user_password,time()+60*60*24*100);
      }        
      $request->session()->put("User_login",true);
      $request->session()->put("User_id",$result[0]->id); 
      $request->session()->put("User_name",$result[0]->first_name.$result[0]->last_name);
      $status = "success";
      $msg = "";
    }else{
      $status = "error";
      $msg = "Please Enter Vailed Password";
    }

  }else{
    $status = "error";
    $msg = "Please Enter Vailed Email Id";
  }
  return response()->json(['status'=>$status, "msg"=>$msg]);
}
// Email verification function start here
function verification_process(Request $request,$id){
  $result = DB::table('customers')  
  ->where(['rand_id' => $id])
  ->get();

  if(isset($result[0])){
   DB::table('customers')  
   ->where(['id' => $result[0]->id])
   ->update(['is_verify' => 1, "rand_id" => 0]);
   return view('front/verification');

 }else{
  return redirect('/');
}
}

// forgot password  function start here

function forgot_password(Request $request){
  $forgot_email = $request->forgot_email;
  $result = DB::table('customers')  
  ->where(['email' => $forgot_email])
  ->where(['is_verify' => 1])
  ->get();
  $rand_id = rand(111111111,999999999);
  if(isset($result[0])){    
    DB::table('customers')  
    ->where(['email' => $forgot_email])
    ->update(['forgot_pass' => 1, "rand_id" => $rand_id]);
    $user['to'] = $forgot_email;
    $data = ['name' =>$result[0]->first_name, "rand_id"=>$rand_id];
    Mail::send('front/password_verification', $data, function($message) use($user){
      $message->to($user['to']);
      $message->subject("Forgot Password Varification");
    });
    $status = "error";
    $msg = "Plesae Check Your Email Id For Verification";    
  }else{
    $status = "error";
    $msg = "Please Enter Your Correct Email Id";    
  }
  return response()->json(['status'=>$status, "msg"=>$msg]);
}



function forgot_password_change(Request $request,$id){
  $result = DB::table('customers')->where(['rand_id' => $id])->where(['forgot_pass' => 1])->get();
  if(isset($result[0])){
    $request->session()->put("FP_user_id",$result[0]->id);
    return view('front/forgot_password');
  }
   else{
    return redirect('/');
  
}
}

public function forgot_password_change_process(Request $request){
  $user_id =$id = session()->get("FP_user_id");   
   $password = Crypt::encrypt($request->user_password);  
   $result = DB::table('customers')
   ->where(['id' => $user_id])
   ->where(['forgot_pass' => 1])
   ->update(['forgot_pass' => 0,'rand_id' => 0,'password' => $password]);
   
}

}
