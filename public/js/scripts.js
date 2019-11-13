$( document ).ready(function() {
	$('#login').submit(function(event) {		
		event.preventDefault();
			
			
		$('#submit_login').hide();
		$('#loader').fadeIn('slow');			
		
		$.ajax({
			type: 'POST',
			url: '/backoffice/login',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (data) {	
				if (data.passed != 'true')
				{						
					$('#loader').hide();
					$('#submit_login').fadeIn('slow');
					$('#flash_message').show().html(data.html).delay( 5000 ).fadeOut();
				}
				else
				{		
					$('#loader').hide();
					$('#flash_message').show().html(data.html);				
					window.location = "/admin";
				}
			}
		});
	});	
	
	$('#member_login').submit(function(event) {		
		event.preventDefault();
			
			
		$('#submit_login').hide();
		$('#loader').fadeIn('slow');			
		
		$.ajax({
			type: 'POST',
			url: '/login.html',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (data) {
				if (data.passed != 'true')
				{						
					$('#loader').hide();
					$('#submit_login').fadeIn('slow');
					$('#flash_message').show().html(data.html).delay( 5000 ).fadeOut();
				}
				else
				{		
					$('#loader').hide();
					$('#flash_message').show().html(data.html);				
					window.location = "/admin";
				}
			}
		});
	});	
	
	$('#financer_login').submit(function(event) {		
		event.preventDefault();
			
			
		$('#submit_login').hide();
		$('#loader').fadeIn('slow');			
		
		$.ajax({
			type: 'POST',
			url: '/financer/login',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (data) {
				if (data.passed != 'true')
				{						
					$('#loader').hide();
					$('#submit_login').fadeIn('slow');
					$('#flash_message').show().html(data.html).delay( 5000 ).fadeOut();
				}
				else
				{		
					$('#loader').hide();
					$('#flash_message').show().html(data.html);				
					window.location = "/admin";
				}
			}
		});
	});	
	
	$('#collection_login').submit(function(event) {		
		event.preventDefault();
			
			
		$('#submit_login').hide();
		$('#loader').fadeIn('slow');			
		
		$.ajax({
			type: 'POST',
			url: '/collection/login',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (data) {
				console.log(data)
				if (data.passed != 'true')
				{						
					$('#loader').hide();
					$('#submit_login').fadeIn('slow');
					$('#flash_message').show().html(data.html).delay( 5000 ).fadeOut();
				}
				else
				{		
					$('#loader').hide();
					$('#flash_message').show().html(data.html);				
					window.location = "/admin/collections/sevendays";
				}
			}
		});
	});	
	
	$('.cart-header').css('cursor', 'pointer').click(function()
	{
		window.location.href = '/admin/repurchase/checkout';
	})
});


	function price_format($id) {
		$('#'+$id).blur(function () {
			$(this).val($(this).val().replace(/\,/g,''));			
			$(this).val(numberWithCommas($(this).val()))
		});
	}
	
	function number_format($id) {
		$('#'+$id).keydown(function (e) {
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
				(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
				(e.keyCode >= 35 && e.keyCode <= 40)) { return; }
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) { e.preventDefault(); }
		});
	}
	
	function numberWithCommas(x) {
		
		if (x == '') {
			return '0.00'
		}
		
		if (x % 1 != 0){
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}else{
			return parseInt(x).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
		}
	}
	
	function show_errors($errors) {
		if ($errors){
			$.each($errors, function( index, value ) 
			{
				$('#'+index).addClass('error_input').after('<div class="error_label"><i class="fa fa-warning"> </i> '+value+'</div>');
				$('label.'+index).addClass('error_label');
			});
		}
	}
	
	function removeCommas(x){
		return parseInt(x.replace(/,/g, ""));
	}