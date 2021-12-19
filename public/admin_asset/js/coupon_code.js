function show_coupon(){		
	$.ajax({
		url : 'pages/coupon_code/coupon_code_action.php',
		type: 'POST',
		success: function(data){
			$("#show_data").html(data);
		}
	});
}
show_coupon();

$("#add_coupon").on("click", function(){
	var code = $("#code").val();
	var type = $("#type").val();
	var value = $("#value").val();
	var min_value = $("#min_value").val();
	var added = $("#added").val();
	var expire = $("#expire").val();
	var status = $("#status").val();
	if(code == "" || type  == "" || value == "" || min_value == "" || added==""|| expire ==""){
		$("#error_msg").html("<h6 class='text-danger text-center mr-5 '>Please Fill All The Filled..</h6>");
		setTimeout(function(){ $("#error_msg").html("") }, 2000);
		return false;
	}else{
		$.ajax({
			url : 'pages/coupon_code/coupon_code_action.php',
			type: 'POST',
			data : {add_coupon:"1", code:code, type:type, value:value, min_value:min_value, added:added, expire:expire, status:status},
			success: function(data){				
					show_coupon();			
					$("#add_delivery_boy_form").trigger("reset");
					$("#alert_msg").html("<h4 class='text-success text-center mb-3 '>Add Successfully..</h4>");
					setTimeout(function(){ $("#alert_msg").html("") }, 2000);				
			}
		});
}

});
$(document).on("click","#update_coupon", function(){
	var id = $(this).data("id");
	$("#update_coupon_modal").modal('show');
	$.ajax({
		url : 'pages/coupon_code/coupon_update.php',
		type : 'POST',
		data : {update:"1", editid:id},
		success : function(data){
			$("#update_modal").html(data);    
		}
	});
});

$(document).on("click","#update_action", function(){	
	var id = $("#up_id").val();
	var code = $("#up_code").val();
	var type = $("#up_type").val();
	var value = $("#up_value").val();
	var min_value = $("#up_min_value").val();
	var added = $("#up_added").val();
	var expire = $("#up_expire").val();
	var status = $("#up_status").val();	
	$.ajax({
		url : 'pages/coupon_code/coupon_update.php',
		type: 'POST',
		data : {update_coupon:"1", id:id, code:code, type:type, value:value, min_value:min_value, added:added, expire:expire},
		success: function(data){
			show_coupon();			
			$("#update_coupon_form").trigger("reset");
			$("#alert_msg").html("<h4 class='text-success text-center mb-3 '>Update Successfully..</h4>");
			setTimeout(function(){ $("#alert_msg").html("") }, 2000);
		}
	});
});
$(document).on("click", "#delete_coupon", function(){
	var getid = $(this).data("id");
	if(confirm("Do You Really Want To Delete This Record.. ? ")){
		$.ajax({
			url : 'pages/coupon_code/coupon_code_action.php',
			type : 'POST',
			data : {delete_coupon:'1', deleteid:getid},
			success : function(data){
				show_coupon();
				$("#alert_msg").html("<h4 class='text-success text-center mb-3 '>Delete Successfully..</h4>");
				setTimeout(function(){ $("#alert_msg").html("") }, 1000);      
			}
		});
	}
});
$(document).on("click", "#coupon_status", function(){	
	var id = $(this).data("id");
	var type = $(this).val();
	if(confirm("Do You Really Want To Change This Status.. ? ")){
		$.ajax({
			url : 'pages/coupon_code/coupon_code_action.php',
			type : 'POST',
			data:{coupon_status:"1", id:id, type:type},
			success: function(data){
				show_coupon();
			}
		});
	}	
});