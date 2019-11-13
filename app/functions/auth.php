<?php 	

	function is_logged_in()
	{
		if(Session::check('is_logged_in'))
			return true;

		return false;
	}

	function set_logged_in()
	{
		Session::set('is_logged_in' , TRUE);
	}



	function get_user_position()
	{

		$position;

		if(is_logged_in())
		{

			$user_position = Session::get('USERSESSION')['type'];


			switch ($user_position) {
				case '1':
					$position = 'admin';
					break;
				
				default:
					$position = 'user';
					break;
			}
		}

		echo $position;
	}

	function get_user_id()
	{

		if(is_logged_in())
		{
			echo Session::get('USERSESSION')['id'];
		}
	}

	function get_user_username()
	{
		if(is_logged_in())
		{
			echo Session::get('USERSESSION')['username'];
		}
	}