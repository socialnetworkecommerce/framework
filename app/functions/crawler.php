<?php

	function crawler_upline($child)
	{

		$con = mysqli_connect(DBHOST , DBUSER , DBPASS , DBNAME);

		$upline_list = [];//upline container

		$cur_child = $child;

		do{

			$sql = "SELECT id, upline , L_R as position from users where id = '$cur_child'";

			$query = $con->query($sql);

			$result = $query->fetch_assoc();

			if($result['upline'] != 0)
			{
				$upline = new stdClass();

				$upline->downline = $result['id'];
				$upline->id       = $result['upline'];
				$upline->position = $result['position'];


				array_push($upline_list, $upline);

				$cur_child = $result['upline'];

			}else{
				$cur_child = FALSE;
			}

		}while($cur_child != FALSE);

		return $upline_list;
	}


	function crawler_drc($child , $deep = null)
	{
		$con = mysqli_connect(DBHOST , DBUSER , DBPASS , DBNAME);

		$drc_list = [];

		$cur_child = $child;

		$instance = 0;

		do{

			if($deep !== null && $deep < $instance)
			{
				$sql = "SELECT * FROM users where id ='{$cur_child}'";

				$query = $con->query($sql);

				$result = $query->fetch_assoc();

				if($cur_child != 0)
				{
					//CHECK IF WE ARE SEARCHING FOR CHILDS PARENT
					if($instance == 0)
					{
						$cur_child = $result['direct_sponsor'];
					}else{
						$sponsor = new stdClass();

						$sponsor->id = $result['id'];
						$sponsor->direct_sponsor = $result['direct_sponsor'];

						array_push($drc_list, $sponsor);

						$cur_child = $result['direct_sponsor'];
					}
					
				}
				else{
					$cur_child = FALSE;
				}
				$instance++;
			}else if($deep == null)
			{
				$sql = "SELECT * FROM users where id ='{$cur_child}'";

				$query = $con->query($sql);

				$result = $query->fetch_assoc();

				if($cur_child != 0)
				{
					//CHECK IF WE ARE SEARCHING FOR CHILDS PARENT
					if($instance == 0)
					{
						$cur_child = $result['direct_sponsor'];
					}else{
						$sponsor = new stdClass();

						$sponsor->id = $result['id'];
						$sponsor->direct_sponsor = $result['direct_sponsor'];

						array_push($drc_list, $sponsor);

						$cur_child = $result['direct_sponsor'];
					}
				}
				else{
					$cur_child = FALSE;
				}
				$instance++;
			}

		}while($cur_child != FALSE);

		return $drc_list;
	}