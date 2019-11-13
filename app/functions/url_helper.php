<?php 	


	function redirect($location){

		header("Location:".URL.DS.$location);
	}
	
	function get_url($location = null){

		if($location == null) {

			return URL;
		}
		else{
			return URL.DS.$location;
		}
	}

	function print_url($location = null){

		if($location == null) {

			echo URL;
		}
		else{
			echo URL.DS.$location;
		}
	}

	function err_404()
	{
		redirect('Error/index');
	}

	function logo()
	{	
		$img = URL.DS.'uploads/main_icon.jpg';
		echo '<a href="/">
	            <?php $img = ?>
	            <img src="'.$img.'" style="width:40px; height;40px; border-radius:50%">
	        </a>';
	}
?>