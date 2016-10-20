<?php
session_start();
$_SESSION["token"]=md5(uniqid(mt_rand(),true));
$t1=$_SESSION["token"];
$car1_make=$_REQUEST['car1_make'];
$car1_model=$_REQUEST['car1_model'];
$car1_version=$_REQUEST['car1_version'];
$car2_make=$_REQUEST['car2_make'];
$car2_model=$_REQUEST['car2_model'];
$car2_version=$_REQUEST['car2_version'];
include 'view_count.php';
include 'get_id.php';
$ob1=new get_id();
$car1_id=$ob1->get_id_now($car1_make,$car1_model,$car1_version);
$car2_id=$ob1->get_id_now($car2_make,$car2_model,$car2_version);
$c=$car1_make.$car1_model.$car1_version;
if(!isset($_SESSION[$c]))
{
	$ob=new view_count();
$ob->count($car1_make,$car1_model,$car1_version);
}
$c1=$car2_make.$car2_model.$car2_version;
if(!isset($_SESSION[$c1]))
{
	$ob=new view_count();
$ob->count($car2_make,$car2_model,$car2_version);
}

?><html>
<head>
	<title>Car Compare Home</title>
	<link rel="shortcut icon" href="car.png">
	<link rel="stylesheet" type="text/css" href="new.css">
	<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
$("#se1").click(function(){
$("#o1").show();
$("#o2").hide();
$("#o3").hide();
$("#o4").hide();
});
$("#se2").click(function(){
$("#o2").show();
$("#o1").hide();
$("#o3").hide();
$("#o4").hide();
});
$("#se3").click(function(){
$("#o3").show();
$("#o1").hide();
$("#o2").hide();
$("#o4").hide();
});
$("#se4").click(function(){
$("#o4").show();
$("#o1").hide();
$("#o2").hide();
$("#o3").hide();
});

		});
	</script>
</head>
<body>
<div class="header">
	<div class="h1">
		
		CarNCar
	</div>
	<div class="h2">
		<div class="h21">
			<span>New Car</span>
		</div>
		
	</div>
    <div class="h3">
    	<div class="h31"><?php
echo $_SESSION['user'];
    	?>
    	</div>
    	
    </div>
</div>
<div class="add">
	<img src="add.jpg" style=" margin-top: 20px; margin-left: 100px;">
</div>
<div class="compare_now">
	<div class="frq_srch">
		<h3 style="text-align: center; text-transform:uppercase;">Frequently&nbsp;Searched</h3>
		<hr>
		<div class="srch_dis">
			<?php
mysql_connect("182.50.133.87","nithinsathyan","nithinsathyan123");
mysql_select_db("nidhinsathyan_car");
$q="select png_image,car_make,car_model,car_version,price,id from car_details ORDER BY view DESC limit 4";
$r=mysql_query($q);
while ($row=mysql_fetch_row($r)) {
	?>
<div class="src1" style="text-align:center;" onclick="window.location='new.php?id=<?php
echo $row[5];
?>'">
				<img src="<?php echo $row[0];?>" style=" width:40%; height: 40%; margin-top: 10px;">
				<div style=" text-align:center; margin-top: 10px;">
					<l1 style="color: blue;">
					<?php echo $row[1]." ".$row[2];?>
				</l1><br><l2 style=" font-weight:bold;">
					<?php echo $row[3];?>
				</l2><br>
				<l3 style=" font-style:italic;">
					Price : <b><?php echo $row[4];?>/-</b>
				</l3>
				</div>
				
			</div>

	<?php

}
			?>

			

		</div>
	</div>
	<div class="car_compare">
		<?php


		?>
		<h5 style=" margin-top: 20px; text-align: center; text-transform:uppercase;"><?php echo $car1_make." ".$car1_model."- ".$car1_version."<l5> Vs </l5>";
echo $car2_make." ".$car2_model."- ".$car2_version;?></h5>
	
		<hr>
		<div class="car_view">
			<?php
mysql_connect("182.50.133.87","nithinsathyan","nithinsathyan123");
mysql_select_db("nidhinsathyan_car");
$q="select png_image,car_make,car_model,car_version,price from car_details where car_make='$car1_make' and car_model='$car1_model' and car_version='$car1_version'";
$r=mysql_query($q);
while ($row=mysql_fetch_row($r)) {
	?>
<div class="sr" style="text-align:center;">
				<img src="<?php echo $row[0];?>" style=" width:40%; height: 40%; margin-top: 10px;">
				<div style=" text-align:center; margin-top: 10px;">
					<l1 style="color: blue;">
					<?php echo $row[1]." ".$row[2];?>
				</l1><br><l2 style=" font-weight:bold;">
					<?php echo $row[3];?>
				</l2><br>
				<l3 style=" font-style:italic;">
					Price : <b><?php echo $row[4];?>/-</b>
				</l3>
				</div>
				
			</div>

	<?php

}
			?>
<?php
mysql_connect("182.50.133.87","nithinsathyan","nithinsathyan123");
mysql_select_db("nidhinsathyan_car");
$q="select png_image,car_make,car_model,car_version,price from car_details where car_make='$car2_make' and car_model='$car2_model' and car_version='$car2_version'";
$r=mysql_query($q);
while ($row=mysql_fetch_row($r)) {
	?>
<div class="sr1" style="text-align:center;">
				<img src="<?php echo $row[0];?>" style=" width:40%; height: 40%; margin-top: 10px;">
				<div style=" text-align:center; margin-top: 10px;">
					<l1 style="color: blue;">
					<?php echo $row[1]." ".$row[2];?>
				</l1><br><l2 style=" font-weight:bold;">
					<?php echo $row[3];?>
				</l2><br>
				<l3 style=" font-style:italic;">
					Price : <b><?php echo $row[4];?>/-</b>
				</l3>
				</div>
				
			</div>

	<?php

}
			?>

		</div>

<?php
mysql_connect("182.50.133.87","nithinsathyan","nithinsathyan123");
mysql_select_db("nidhinsathyan_car");
$row1;
$q="select * from car_details where id='$car1_id'";
$re=mysql_query($q);
while($row=mysql_fetch_row($re))
{
$row1[0]=$row[3];
$row1[1]=$row[4];
$row1[2]=$row[5];
$row1[3]=$row[6];
$row1[4]=$row[7];
$row1[5]=$row[8];
$row1[6]=$row[9];
$row1[7]=$row[10];
$row1[8]=$row[11];
$row1[9]=$row[12];
$row1[10]=$row[13];
$row1[11]=$row[14];
$row1[12]=$row[15];
$row1[13]=$row[16];
$row1[14]=$row[17];
$row1[15]=$row[18];
$row1[16]=$row[19];
$row1[17]=$row[20];
$row1[18]=$row[21];
$row1[19]=$row[22];
$row1[20]=$row[23];
$row1[21]=$row[24];
$row1[22]=$row[25];
$row1[23]=$row[26];
$row1[24]=$row[27];
$row1[25]=$row[28];
$row1[26]=$row[29];
$row1[27]=$row[30];
$row1[28]=$row[31];
$row1[29]=$row[32];
$row1[30]=$row[33];
$row1[31]=$row[34];
$row1[32]=$row[35];
$row1[33]=$row[36];
$row1[34]=$row[37];
$row1[35]=$row[38];
$row1[36]=$row[39];
$row1[37]=$row[40];
$row1[38]=$row[41];
$row1[39]=$row[42];
}
$row2;
mysql_connect("182.50.133.87","nithinsathyan","nithinsathyan123");
mysql_select_db("nidhinsathyan_car");
$q="select * from car_details where id='$car2_id'";
$re=mysql_query($q);
while($row=mysql_fetch_row($re))
{
$row2[0]=$row[3];
$row2[1]=$row[4];
$row2[2]=$row[5];
$row2[3]=$row[6];
$row2[4]=$row[7];
$row2[5]=$row[8];
$row2[6]=$row[9];
$row2[7]=$row[10];
$row2[8]=$row[11];
$row2[9]=$row[12];
$row2[10]=$row[13];
$row2[11]=$row[14];
$row2[12]=$row[15];
$row2[13]=$row[16];
$row2[14]=$row[17];
$row2[15]=$row[18];
$row2[16]=$row[19];
$row2[17]=$row[20];
$row2[18]=$row[21];
$row2[19]=$row[22];
$row2[20]=$row[23];
$row2[21]=$row[24];
$row2[22]=$row[25];
$row2[23]=$row[26];
$row2[24]=$row[27];
$row2[25]=$row[28];
$row2[26]=$row[29];
$row2[27]=$row[30];
$row2[28]=$row[31];
$row2[29]=$row[32];
$row2[30]=$row[33];
$row2[31]=$row[34];
$row2[32]=$row[35];
$row2[33]=$row[36];
$row2[34]=$row[37];
$row2[35]=$row[38];
$row2[36]=$row[39];
$row2[37]=$row[40];
$row2[38]=$row[41];
$row2[39]=$row[42];
}


		?>
		<div class="spec_bar">
			<div class="s1" id="se1">
				<new>Overview</new>
			</div>
			<div class="s1" id="se2">
				<new>Features</new>
			</div>
			<div class="s1" id="se3">
				<new>Specification</new>
			</div>
			<div class="s1" id="se4">
				<new>Colours</new>
			</div>
		</div>
		<div class="ov1" id="o1">
		
			<div>
				<table>
					<tr>
						<td>
							Length(mm) 
						</td>
						<td>
							<?php echo $row1[0];?>
						</td>
						<td>
							<?php echo $row2[0];?>
						</td>

					</tr>
					<tr>
						<td>
							Width(mm) 
						</td>
						<td>
							<?php echo $row1[1];?>
						</td>
						<td>
							<?php echo $row2[1];?>
						</td>

					</tr>
<tr>
						<td>
							Height(mm)
						</td>
						<td>
							<?php echo $row1[2];?>
						</td>
						<td>
							<?php echo $row2[2];?>
						</td>

					</tr>
					<tr>
						<td>
							Seat Capacity
						</td>
						<td>
							<?php echo $row1[3];?>
						</td>
						<td>
							<?php echo $row2[3];?>
						</td>

					</tr>
					<tr>
						<td>
							Displacement(cc)
						</td>
						<td>
							<?php echo $row1[4];?>
						</td>
						<td>
							<?php echo $row2[4];?>
						</td>

					</tr>
					<tr>
						<td>
							Fuel Type
						</td>
						<td>
							<?php echo $row1[5];?>
						</td>
						<td>
							<?php echo $row2[5];?>
						</td>

					</tr>
					<tr>
						<td>
							Max Power
						</td>
						<td>
							<?php echo $row1[6];?>
						</td>
						<td>
							<?php echo $row2[6];?>
						</td>

					</tr>
					<tr>
						<td>
							Max Torque
						</td>
						<td>
							<?php echo $row1[7];?>
						</td>
						<td>
							<?php echo $row2[7];?>
						</td>

					</tr>
					<tr>
						<td>
							Milage
						</td>
						<td>
							<?php echo $row1[8];?>
						</td>
						<td>
							<?php echo $row2[8];?>
						</td>

					</tr>
					<tr>
						<td>
							Number Of Gear
						</td>
						<td>
							<?php echo $row1[9];?>
						</td>
						<td>
							<?php echo $row2[9];?>
						</td>

					</tr>
					<tr>
						<td>
							AirBags
						</td>
						<td>
							<?php echo $row1[10];?>
						</td>
						<td>
							<?php echo $row2[10];?>
						</td>

					</tr>
					<tr>
						<td>
							Abs
						</td>
						<td>
							<?php if($row1[11]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>
						<td>
							<?php if($row2[11]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>

					</tr>
				</table>

			</div>
		</div>
		<div class="ov1" id="o2" style=" display:none">
			<div>
				<table>
					<tr>
						<td>
							Tyre Pressure Monitoring
						</td>
						<td>
							<?php if($row1[12]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>
						<td>
							<?php if($row2[12]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>

					</tr>
					<tr>
						<td>
						Child Seat Anchor points
						</td>
						<td>
							<?php if($row1[13]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>
						<td>
							<?php if($row2[13]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>

					</tr>
<tr>
						<td>
							Seat Belt Warning
						</td>
						<td>
							<?php if($row1[14]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>
						<td>
							<?php if($row2[14]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>

					</tr>
					<tr>
						<td>
							Electronic Break Force
						</td>
						<td>
							<?php if($row1[15]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>
						<td>
							<?php if($row2[15]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>

					</tr>
					<tr>
						<td>
							Four Wheel Drive
						</td>
						<td>
							<?php if($row1[16]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>
						<td>
							<?php if($row2[16]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>

					</tr>
					<tr>
						<td>
							Hill Hold Control
						</td>
						<td>
							<?php if($row1[17]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>
						<td>
							<?php if($row2[17]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>

					</tr>
					<tr>
						<td>
							Traction Control System
						</td>
					<td>
							<?php if($row1[18]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>
						<td>
							<?php if($row2[18]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>

					</tr>
					<tr>
						<td>
							Ride Height Adjustment
						</td>
						<td>
							<?php if($row1[19]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>
						<td>
							<?php if($row2[19]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>
					</tr>
					<tr>
						<td>
							Central Lock
						</td>
						<td>
							<?php if($row1[20]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>
						<td>
							<?php if($row2[20]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>

					</tr>
					<tr>
						<td>
							Parking Sensor
						</td>
						<td>
							<?php if($row1[21]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>
						<td>
							<?php if($row2[21]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>

					</tr>
					<tr>
						<td>
							Dual Stage Air Bags
						</td>
						<td>
							<?php if($row1[22]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>
						<td>
							<?php if($row2[22]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>

					</tr>
					<tr>
						<td>
							Abs
						</td>
						<td>
							<?php if($row1[11]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>
						<td>
							<?php if($row2[11]==1){
?>
<img src="tick.png" width="20px" height="20px"/>
<?php
								}

else{
	?>
	<img src="non_tick.png" width="20px" height="20px"/>
	<?php
}
								?>
						</td>

					</tr>
				</table>

			</div>
		</div>
		<div class="ov1" id="o3" style="display:none;">
			<table>
					<tr>
						<td>
							WheelBase(mm) 
						</td>
						<td>
							<?php echo $row1[23];?>
						</td>
						<td>
							<?php echo $row2[23];?>
						</td>

					</tr>
					<tr>
						<td>
							Ground Clearence
						</td>
						<td>
							<?php echo $row1[24];?>
						</td>
						<td>
							<?php echo $row2[24];?>
						</td>

					</tr>
<tr>
						<td>
							Front Break Type
						</td>
						<td>
							<?php echo $row1[25];?>
						</td>
						<td>
							<?php echo $row2[25];?>
						</td>

					</tr>
					<tr>
						<td>
							Rear Break Type
						</td>
						<td>
							<?php echo $row1[26];?>
						</td>
						<td>
							<?php echo $row2[26];?>
						</td>

					</tr>
					<tr>
						<td>
							Wheel
						</td>
						<td>
							<?php echo $row1[27];?>
						</td>
						<td>
							<?php echo $row2[27];?>
						</td>

					</tr>
					<tr>
						<td>
							Door
						</td>
						<td>
							<?php echo $row1[28];?>
						</td>
						<td>
							<?php echo $row2[28];?>
						</td>

					</tr>
					<tr>
						<td>
							Boot Space
						</td>
						<td>
							<?php echo $row1[29];?>
						</td>
						<td>
							<?php echo $row2[29];?>
						</td>

					</tr>
					<tr>
						<td>
							Tank Capacity
						</td>
						<td>
						<?php echo $row1[30];?>
						</td>
						<td>
							<?php echo $row2[30];?>
						</td>

					</tr>
					<tr>
						<td>
							Price
						</td>
						<td>
							<?php echo $row1[31];?>/-
						</td>
						<td>
							<?php echo $row2[31];?>/-
						</td>

					</tr>
					<tr>
						<td>
							Site Rate
						</td>
						<td>
							<?php 

for($i=1;$i<=$row1[32];$i++)
{
	?>
<img src="star.png" width="20px" height="20px"/>
	<?php
}
							?>

						</td>
						<td>
							<?php 

for($i=1;$i<=$row2[32];$i++)
{
	?>
<img src="star.png" width="20px" height="20px"/>
	<?php
}
							?>
						</td>

					</tr>
					
				</table>

		</div>
		<div class="ov1" id="o4" style=" display:none;">
			<table>
				<tr>
					<td>
						<?php echo $car1_make." ".$car1_model." ".$car1_version;?>
					</td>
					<?php $p=explode(",",$row1[33]);
foreach ($p as $key => $value) {
	?>
<td><div style=" margin-top: 10px; margin-left: 20px; float:left;width: 50px; height: 50px; background-color: <?php echo $value;?>"></div>
	</td><?php
}
				?>


				</tr>
<tr>
	<td>
		<?php echo $car2_make." ".$car2_model." ".$car2_version;?>
	</td>
	<?php
$p=explode(",",$row2[33]);
foreach ($p as $key => $value) {
	?>
<td><div style=" margin-top: 10px; margin-left: 20px; float:left;width: 50px; height: 50px; background-color: <?php echo $value;?>"></div>
	</td><?php
}
				?>

</tr>

			</table>

			<div >
			
				

			</div>

			
		</div>
	</div>
	<div class="new_cars">
		<h3 style="text-align: center; text-transform:uppercase;">New&nbsp;Car's</h3>
	<hr>
	<div class="srch_dis">
			<?php
mysql_connect("182.50.133.87","nithinsathyan","nithinsathyan123");
mysql_select_db("nidhinsathyan_car");
$q="select png_image,car_make,car_model,car_version,price from car_details ORDER BY id DESC limit 4";
$r=mysql_query($q);
while ($row=mysql_fetch_row($r)) {
	?>
<div class="src1" style="text-align:center;">
				<img src="<?php echo $row[0];?>" style=" width:40%; height: 40%; margin-top: 10px;">
				<div style=" text-align:center; margin-top: 10px;">
					<l1 style="color: blue;">
					<?php echo $row[1]." ".$row[2];?>
				</l1><br><l2 style=" font-weight:bold;">
					<?php echo $row[3];?>
				</l2><br>
				<l3 style=" font-style:italic;">
					Price : <b><?php echo $row[4];?>/-</b>
				</l3>
				</div>
				
			</div>

	<?php

}
			?>

			

		</div>
	</div>

</div>
<div class="footer"></div>
</body>
</html>
