// user Script start
function show_user(){	
	$.ajax({
		url :'pages/users/user_action.php',
		type: 'POST',
		data:{
			hrllo:'yte'
		},
		success: function(data){
			$("#show_user").html(data);
		}
	});
}
$(document).on("click", "#user_status", function(){	
	var id = $(this).data("id");
	var type = $(this).val();
	if(confirm("Do You Really Want To Change This Status.. ? ")){
		$.ajax({
			url : 'pages/users/user_action.php',
			type : 'POST',
			data:{user_status:"1", id:id, type:type},
			success: function(data){
				show_user();
			}
		});
	}	
});
// user Script end