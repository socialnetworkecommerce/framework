<?php 	

	// function mk_time()/

	function date_long($date)
	{
		echo date('Y-M-d' , strtotime($date));
	}

	function getDateBefore()
	{
		return date('Y/m/d',strtotime("-1 days"));
	}


	function getPastDate($period)
	{
		$now = time(); // or your date as well
        $your_date = strtotime($period);
        $datediff = $now - $your_date;

        echo round($datediff / (60 * 60 * 24));
	}