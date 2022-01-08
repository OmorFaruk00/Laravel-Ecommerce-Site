<?php 
use Illuminate\Support\Facades\DB;
function prx($arr){
	echo"<pre>";
	print_r($arr);
	die();
}
 function user_temp_id(){
 	if(session()->has("User_temp_id")==null){
        $rand=rand(111111111,999999999);
        session()->put("User_temp_id",$rand);
        return $rand;
    }else{
      return session()->get("User_temp_id");
    }
 }

 function cart_menu_count(){
 	 if(session()->has('User_id')){
      $uid = session()->get('User_id');
      $user_type = "Reg";
    }else{      
      $uid = user_temp_id();
      $user_type = "No Reg";        
    }
     $data =DB::table('cart')      
      ->where(['user_id' => $uid])
      ->where(['user_type' => $user_type])  
      ->get();   
      return count($data);
 }
function cart_menu(){
 	 if(session()->has('User_id')){
      $uid = session()->get('User_id');
      $user_type = "Reg";
    }else{      
      $uid = user_temp_id();
      $user_type = "No Reg";        
    }
     $data =DB::table('cart')
      ->leftjoin('products', 'products.id', '=', 'cart.product_id')
      ->leftjoin('product_attr', 'product_attr.id', '=', 'cart.product_attr_id')
      ->leftjoin('sizes', 'sizes.id', '=', 'product_attr.size')
      ->leftjoin('colors', 'colors.id', '=', 'product_attr.color')
      ->where(['user_id' => $uid])
      ->where(['user_type' => $user_type])
      ->select('products.id as pid','products.title','products.slug','products.image','cart.qty','sizes.size','colors.color','product_attr.price','product_attr.id as attr_id')
      ->get();
      // prx($data);
      return $data;    
 }
 ?>