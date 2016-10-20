<?php
session_start();
$t=$_GET['token'];
if($_SESSION['token']==$t)
{
?><option>--Select-Version--</option><?php
$q=$_GET['q'];
$q1=$_GET['q1'];
mysql_connect("182.50.133.87","nithinsathyan","nithinsathyan123");
		mysql_select_db("nidhinsathyan_car");
$q1="select distinct car_version from car_details where car_make='$q' and car_model='$q1'";
$r1=mysql_query($q1);
while ($row=mysql_fetch_row($r1)) {
	echo "<option>".$row[0]."</option>";
}
}?>

