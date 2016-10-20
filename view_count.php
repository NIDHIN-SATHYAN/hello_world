<?php
session_start();
class view_count{
	function count($car_make,$car_model,$car_version)
	{
		mysql_connect("182.50.133.87","nithinsathyan","nithinsathyan123");
		mysql_select_db("nidhinsathyan_car");
		$c=$car_make.$car_model.$car_version;
		if(!isset($_SESSION[$c]))
		{
			$_SESSION[$c]="done";
		$q="update car_details set view=view+1 where car_make='$car_make' and car_model='$car_model' and car_version='$car_version'";
		mysql_query($q);
}
	}
}


?>