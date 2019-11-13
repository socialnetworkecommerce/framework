$(function(){


	let countdown  = 10;

	setInterval(function(){

	  if(countdown != 0) {

	  	$('.timer').html(countdown--)

	  }
	  
	  else{

	  	$('.timer').css('font-size' , '1em');

	  	$('.timer').html(" Importing javascript files shall be in root public folder");
	  }

	},500);




	console.log(get_url('ajax/json'));
	//call ajax
	// $("#btnSubmit").click(function(e){

	// 	$.post(get_url('ajax/json') , {data:'mark'} , function(result){

	// 		console.log(result);

	// 	},'json');

	// 	e.preventDefault();
	// });
	
})