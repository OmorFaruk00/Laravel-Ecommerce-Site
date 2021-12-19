// Delivery Boy Start Script
function show_delevery_boy(){		
	$.ajax({
		url : 'pages/delivery_boy/delivery_boy_action.php',
		type: 'POST',
		success: function(data){
			$("#show_deliveryboy_data").html(data);
		}
	});
}


$("#add_delivery_boy").on("click", function(){
	var name = $("#name").val();
	var email = $("#email").val();
	var password = $("#password").val();
	var mobile = $("#mobile").val();
	var added = $("#added").val();
	var status = $("#status").val();
	if(name == "" || email == "" || mobile == "" || added == ""){
		$("#error_msg").html("<h6 class='text-danger text-center mr-5 '>Please Fill All The Filled..</h6>");
		setTimeout(function(){ $("#error_msg").html("") }, 2000);
		return false;
	}else{
	$.ajax({
		url : 'pages/delivery_boy/delivery_boy_action.php',
		type: 'POST',
		data : {add_delivery_boy:"", name:name, email:email, password:password, mobile:mobile, added:added, status:status},
		success: function(data){
		    show_delevery_boy();			
			$("#add_delivery_boy_form").trigger("reset");
			$("#alert_msg").html("<h4 class='text-success text-center mb-3 '>Add Successfully..</h4>");
			setTimeout(function(){ $("#alert_msg").html("") }, 1000);
		}
	});
}

});

$(document).on("click", "#delete_delivery_boy", function(){
	var getid = $(this).data("id");
	if(confirm("Do You Really Want To Delete This Record.. ? ")){
		$.ajax({
			url : 'pages/delivery_boy/delivery_boy_action.php',
			type : 'POST',
			data : {delete_delivery_boy:'1', deleteid:getid},
			success : function(data){
				show_delevery_boy();
				$("#alert_msg").html("<h4 class='text-success text-center mb-3 '>Delete Successfully..</h4>");
				setTimeout(function(){ $("#alert_msg").html("") }, 1000);      
			}
		});
	}
});
$(document).on("click", "#deliveryboy_change_status", function(){	
	var id = $(this).data("id");
	var type = $(this).val();
	if(confirm("Do You Really Want To Change This Status.. ? ")){
		$.ajax({
			url : 'pages/delivery_boy/delivery_boy_action.php',
			type : 'POST',
			data:{deliveryboy_change_status:"1", id:id, type:type},
			success: function(data){
				show_delevery_boy();
			}
		});
	}	
});
$(document).on("click","#update_delivery_boy", function(){
	var id = $(this).data("id");
	$("#update_delivery_boy_modal").modal('show');
	$.ajax({
		url : 'pages/delivery_boy/delivery_boy_update.php',
		type : 'POST',
		data : {update_delivery_boy:"1", editid:id},
		success : function(data){
			$("#deliveryboy_modal").html(data);    
		}
	});
});
$(document).on("click","#update_deliveryboy_action", function(){	
	var id = $("#up_id").val();
	var name = $("#up_name").val();
	var email = $("#up_email").val();	
	var mobile = $("#up_mobile").val();
	var added = $("#up_added").val();	
	$.ajax({
		url : 'pages/delivery_boy/delivery_boy_action.php',
		type: 'POST',
		data : {update_deliveryboy_action:"1", id:id, name:name, email:email, mobile:mobile, added:added},
		success: function(data){
		    show_delevery_boy();			
			$("#update_delivery_boy_form").trigger("reset");
			$("#alert_msg").html("<h4 class='text-success text-center mb-3 '>Update Successfully..</h4>");
			setTimeout(function(){ $("#alert_msg").html("") }, 1000);
		}
	});
});
// Delivery Boy End Script