<?php
session_start();
$q=$_GET['q'];
mysql_connect("182.50.133.87","nithinsathyan","nithinsathyan123");
		mysql_select_db("nidhinsathyan_car");
$q1="select * from car_details where car_make like '%$q%' or car_model='%$q%' or car_version='%$q%'";
$r1=mysql_query($q1);
while ($row=mysql_fetch_row($r1)) {
	?>

<div class="in_car">
		<div class="in_car1">
			<div class="in_car11" style="text-align:center;">
				<img src="<?php echo $row[37]?>"" style=" width:90%; height: 90%; ">
			</div>
			<div class="in_car12" style="text-align:center;">
			<?php
$car_name=$row[0]." ".$row[1]." ".$row[2];
			?>
				<dis1><?php echo $row[0];?></dis1>
				<dis1><?php echo $row[1];?></dis1>
				<dis1><?php echo $row[2];?></dis1>
				<dis1>Price : <?php echo $row[34];?>/-</dis1>
				<dis1>
<?php 

for($i=1;$i<=$row[35];$i++)
{
	?>
<img src="star.png" width="20px" height="20px"/>
	<?php
}
							?>
				</dis1>
			</div>
		</div>
		<div class="in_car2">
			<div><dis1><s1>Car Type:</s1><?php echo $row[41];?></dis1>
				<dis1><s1>Fuel Type:</s1><?php echo $row[8];?></dis1>
				<dis1><s1>Max Power:</s1><?php echo $row[9];?></dis1>
				<dis1><s1>Milage:</s1><?php echo $row[11];?> km/l</dis1>
				<dis1><s1>
<?php
if(!isset($_GET["id"]))
{
?>
				<button onclick="window.location='new.php?id=<?php echo $row[39];?>'" style=" cursor: pointer">View More</button></s1>
<?php }?>
				</dis1></div>
		</div>
	</div>
	<?php


	
}
?>

