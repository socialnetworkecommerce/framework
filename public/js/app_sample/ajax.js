$(function(){


	$("#request_post").click(function(e){

		$.post(get_url('ajax/json') , {data:"chromatic"} , function(result){

			$("#ajax_result").html("REQUESTED FROM CONTROLLER AJAX/JSON " + result);

			$("#ajax_result").slideToggle(1000);
		},'json');


		e.preventDefault();
	});
});