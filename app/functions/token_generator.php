<?php 	

	function random_gen($length = 12){

		$bytes = random_bytes($length);

		return substr(bin2hex($bytes), 0 , $length);
	}


	function random_number($length = 12)
	{
		return substr(rand(1 , 1000000), 0 , $length);
	}
	function to_number($number)
	{
		return number_format($number , 2);
	}

	function var_dump_pre($data)
	{
		echo '<pre>';
			var_dump($data);
		echo '</pre>';
	}


	function seal($val = null)
	{
		try{
			if($val == null)
			{
				throw new Exception("Cannot Serialize Null value");
			}
		}catch(Exception $e)
		{	
			echo $e->getMessage();
			die();
		}
		

		return base64_encode(serialize($val));
	}

	function unseal($val = null)
	{
		try{
			if(!unserialize(base64_decode($val)))
			{
				throw new Exception("String is not Serialized Properly");	
			}
		}catch(Exception $e)
		{
			echo $e->getMessage();
			die();
		}

		return unserialize(base64_decode($val)); 
	}