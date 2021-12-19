$( document ).ready(function() {
	var session = $('#session').val();
	if(session !== null && session !== ''  && session!==undefined){
		dashboard();
	}else{
		index();
	}
});

function index(){
	$.ajax({
		url: "pages/login/login.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#main_container').html(response);               
		}
	});
}



function dashboard(){
	$.ajax({
		url: "pages/dashboard/dashboard.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#admin_content').html(response);
			active_nav_menu('dashboard');               
		}
	});
}
function cetegory(){
	$.ajax({
		url: "pages/category/category.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#admin_content').html(response);
			active_nav_menu('category');
			show_category();
				              
		}
	});
}
function users(){
	$.ajax({
		url: "pages/users/users.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#admin_content').html(response);
			active_nav_menu('users'); 
			show_user();              
		}
	});
}
function delivery_boy(){
	$.ajax({
		url: "pages/delivery_boy/delivery_boy.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#admin_content').html(response);
			active_nav_menu('delivery_boy');
			show_delevery_boy();               
		}
	});
}

function coupon_code(){
	$.ajax({
		url: "pages/coupon_code/coupon_code.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#admin_content').html(response);
			active_nav_menu('coupon_code');                
		}
	});
}
function dish(){
	$.ajax({
		url: "pages/dish/dish.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#admin_content').html(response);
			active_nav_menu('dish');                
		}
	});
}
function order(){
	$.ajax({
		url: "pages/order/order.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#admin_content').html(response);
			active_nav_menu('order');                
		}
	});
}

function active_nav_menu(nev_id){
	$(".active").removeClass("active");
	document.getElementById(nev_id).classList.add("active");
}