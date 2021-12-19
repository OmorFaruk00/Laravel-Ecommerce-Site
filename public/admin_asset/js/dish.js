function show_dish(){		
	$.ajax({
		url : 'pages/dish/dish_action.php',
		type: 'POST',
		success: function(data){
			$("#show_dish_data").html(data);
		}
	});
}
show_dish();

$(document).on("click", "#dish_status", function(){	
	var id = $(this).data("id");
	var type = $(this).val();
	if(confirm("Do You Really Want To Change This Status.. ? ")){
		$.ajax({
			url : 'pages/dish/dish_action.php',
			type : 'POST',
			data:{dish_status:"1", id:id, type:type},
			success: function(data){
				show_dish();

			}
		});
	}	
});

function show_dish_category(){		
	$.ajax({
		url : 'pages/dish/dish_action.php',
		type: 'POST',
		data: {dish_category:""},
		success: function(data){
			$("#select_category").append(data);
		}
	});
}
show_dish_category();

$("#add_dish").on("click", function(){		
	var formData = new FormData(document.getElementById('dish_form'));	
	$.ajax({
		url : 'pages/dish/add_dish.php',
		type: 'POST',
		data : formData,
		contentType: false,
		processData: false,
		success: function(data){
			console.log(data);				
			show_dish();			
			$("#dish_form").trigger("reset");
			$("#alert_msg").html("<h4 class='text-success text-center mb-3 '>Add Successfully..</h4>");
			setTimeout(function(){ $("#alert_msg").html("") }, 2000);				
		}
	});
});


$(document).on("click", "#delete_dish", function(){	
	var getid = $(this).data("id");
	if(confirm("Do You Really Want To Delete This Record.. ? ")){
		$.ajax({
			url : 'pages/dish/dish_action.php',
			type : 'POST',
			data : {delete_dish:'1', deleteid:getid},
			success : function(data){
				show_dish();
				$("#alert_msg").html("<h4 class='text-success text-center mb-3 '>Delete Successfully..</h4>");
				setTimeout(function(){ $("#alert_msg").html("") }, 2000);      
			}
		});
	}
});

$(document).on("click","#update_dish", function(){

	var id = $(this).data("id");
	$("#update_dish_modal").modal('show');
	$.ajax({
		url : 'pages/dish/update_dish.php',
		type : 'POST',
		data : {update:'', editid:id},
		success : function(data){
			$("#dish_modal").html(data);    
		}
	});
});