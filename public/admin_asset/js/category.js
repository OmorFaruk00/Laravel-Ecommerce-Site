function show_category(){	
	$.ajax({
		url : 'pages/category/category_action.php',
		type: 'POST',
		success: function(data){
			$("#show_data").html(data);
		}
	});
}

$("#add_category").on("click", function(){
	var category = $("#category_name").val();
	var order = $("#order").val();
	var added = $("#added_on").val();
	var status = $("#status").val();
	if(category == "" || order == "" || added == "" || status == ""){
		$("#error_msg").html("<h6 class='text-danger text-center mr-5 '>Please Fill All The Filled..</h6>");
		setTimeout(function(){ $("#error_msg").html("") }, 2000);
		return false;
	}else{
		$.ajax({
		url : 'pages/category/category_action.php',
		type: 'POST',
		data : {add_category:"1", category:category, order:order, added:added, status:status},
		success: function(data){
			show_category();
			$("#add_category_form").trigger("reset");
			$("#alert_msg").html("<h4 class='text-success text-center mb-3 '>Add Successfully..</h4>");
			setTimeout(function(){ $("#alert_msg").html("") }, 1000);
		}
	});
}
	
});

$(document).on("click", "#delete_category", function(){
	var getid = $(this).data("id");
	if(confirm("Do You Really Want To Delete This Record.. ? ")){
		$.ajax({
			url : 'pages/category/category_action.php',
			type : 'POST',
			data : {delete_category:'1', deleteid:getid},
			success : function(data){
				show_category();
				$("#alert_msg").html("<h4 class='text-success text-center mb-3 '>Delete Successfully..</h4>");
				setTimeout(function(){ $("#alert_msg").html("") }, 1000);      
			}
		});
	}
});
$(document).on("click","#edit_category", function(){
	var id = $(this).data("id");
	$("#update_category_modal").modal('show');
	$.ajax({
		url : 'pages/category/category_update.php',
		type : 'POST',
		data : {edit:"1", editid:id},
		success : function(data){
			$("#modal").html(data);    
		}
	});
});
$(document).on("click","#update_category", function(){
	var update_id = $("#update_id").val();
	var update_category = $("#update_category_name").val();
	var update_order = $("#update_order").val();
	var update_added = $("#update_added_on").val();	
		$.ajax({
		url : 'pages/category/category_update.php',
		type: 'POST',
		data : {category_update:"1", id:update_id, category:update_category, order:update_order, added:update_added},
		success: function(data){
			show_category();
			$("#add_category_form").trigger("reset");
			$("#alert_msg").html("<h4 class='text-success text-center mb-3 '>Update Successfully..</h4>");
			setTimeout(function(){ $("#alert_msg").html("") }, 1000);
		}
	});	
});
$(document).on("click", "#change_status", function(){	
	var id = $(this).data("id");
	var type = $(this).val();
	if(confirm("Do You Really Want To Change This Status.. ? ")){
		$.ajax({
			url : 'pages/category/category_action.php',
			type : 'POST',
			data:{status_change:"1", id:id, type:type},
			success: function(data){
				show_category();
			}
		});	
	}	
	
});

// Category End