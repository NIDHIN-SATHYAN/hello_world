<?php
class get_id{
	function get_id_now($car_make,$car_model,$car_version)
	{
		mysql_connect("182.50.133.87","nithinsathyan","nithinsathyan123");
		mysql_select_db("nidhinsathyan_car");
		$q="select id from car_details where car_make='$car_make' and car_model='$car_model' and car_version='$car_version'";
		$r=mysql_query($q);
		$id;
		while($row=mysql_fetch_row($r))
		{
$id=$row[0];
		}
return $id;
}
	}
?>