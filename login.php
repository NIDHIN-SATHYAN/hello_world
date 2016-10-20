<?php
session_start();
$e=$_POST["email"];
$p=$_POST["pass"];
mysql_connect("182.50.133.87","nithinsathyan","nithinsathyan123");
mysql_select_db("nidhinsathyan_car");
$q="select * from register where email='$e' and password='$p'";
$r=mysql_query($q);
$c=mysql_num_rows($r);
if($c)
{
	$_SESSION["user"]=$e;
	header("location:index.php?log=ok");
}
?>