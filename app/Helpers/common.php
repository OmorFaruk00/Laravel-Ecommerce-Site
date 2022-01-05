<?php 
function prx($arr){
	echo"<pre>";
	print_r($arr);
	die();
}
 function user_temp_id(){
 	if(session()->has("User_temp_id")===null){
        $rand=rand(111111111,999999999);
        session()->put("User_temp_id",$rand);
        return $rand;
    }else{
      return session()->get("User_temp_id");
    }
 }

 ?>