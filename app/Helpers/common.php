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

return $data;    
}
 // start dynamic top menu
function Dynamic_top_nav(){
  $result = DB::table('categories')
  ->where(['status' => 1])
  ->get();
  $arr = [];
  foreach ($result as $row) {
    $arr[$row->id]['name']= $row->name;
    $arr[$row->id]['parent_id']= $row->parent_id;
    $arr[$row->id]['slug']= $row->slug;
  }
  $str = build_tree_view($arr ,0);
  return $str;
}
$html = '';
function build_tree_view($arr,$parent,$level=0, $prelevel=-1){
  global $html;
  foreach ($arr as $id=>$data) {
    if($parent == $data['parent_id']){
      if($level>$prelevel){
        if($html == ''){
          $html.='<ul class="nav navbar-nav">';
        }else{
          $html.='<ul class="dropdown-menu">';     
        }        
      }
      if($level==$prelevel){
        $html.='<li>';
      }
      $html.='<li><a href="/category/'.$data['slug'].'">'.$data['name'].'<span class="caret"></span></a>';

      if($level>$prelevel){
        $level=$prelevel;
      }
      $level++;
      build_tree_view($arr,$id,$level, $prelevel);
      $level--;
    }
  }
  if($level==$prelevel){
    $html.='</li></ul>';
  }
  return $html;
}
// end dynamic top menu
?>