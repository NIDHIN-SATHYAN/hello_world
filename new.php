<?php
session_start();
$q12="select * from car_details";
if(isset($_GET["company"]))
{

$co=$_GET["company"];

	$q12="select * from car_details where car_make='$co'";
}
if(isset($_GET["type"]))
{

$co=$_GET["type"];

	$q12="select * from car_details where body_type='$co'";
}
if(isset($_GET["fuel"]))
{

$co=$_GET["fuel"];

	$q12="select * from car_details where fuel_type='$co'";
}
if(isset($_GET["id"]))
{
	$co=$_GET["id"];
	$q12="select * from car_details where id='$co'";
}
$car_name;
?>
<html>
<head>
	<title>New Car</title>
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
<div class="header1">
	<div class="h1">
		
		CarNCar
	</div>
	<div class="h2">
		<div class="h21" onclick="window.location='index.php'">
			<span>Home</span>
		</div>
		<div class="h21" onclick="window.location='new_car.php'">
			<span>New Car</span>
		</div>
		<script>function fun4(str)
	{
		
if(str.length==0)
			{
				 document.getElementById("txtHint").innerHTML ="";
			}
			else{
				var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;

            }
        }
        xmlhttp.open("GET", "geth.php?q="+str, true);
        xmlhttp.send();
			}
	}</script>
		<div class="h24">
			<input onkeyup="fun4(this.value)" type="text" name="" placeholder="Search Here..!!" style="text-align: center">
		</div>
	</div>
    <div class="h3">
    	<div class="h31"><?php
echo $_SESSION['user'];
    	?>

    	</div>
    	<div class="h32" id="lo">
    		
    	</div>
    </div>
</div>

<div class="car_dis">
<div id="txtHint" style=" background-color: gray">
	
</div>
<?php
mysql_connect("182.50.133.87","nithinsathyan","nithinsathyan123");
mysql_select_db("nidhinsathyan_car");

$r=mysql_query($q12);
while ($row=mysql_fetch_row($r)) {
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

	


</div>
<?php
if(isset($_GET['id']))
{
	$car1_id=$_GET['id'];
	?>
	<div style=" margin-left: 280px;" class="car_compare">
	


<?php

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
						

					</tr>
					<tr>
						<td>
							Width(mm) 
						</td>
						<td>
							<?php echo $row1[1];?>
						</td>
						

					</tr>
<tr>
						<td>
							Height(mm)
						</td>
						<td>
							<?php echo $row1[2];?>
						</td>
						

					</tr>
					<tr>
						<td>
							Seat Capacity
						</td>
						<td>
							<?php echo $row1[3];?>
						</td>
						

					</tr>
					<tr>
						<td>
							Displacement(cc)
						</td>
						<td>
							<?php echo $row1[4];?>
						</td>
						

					</tr>
					<tr>
						<td>
							Fuel Type
						</td>
						<td>
							<?php echo $row1[5];?>
						</td>
						
					</tr>
					<tr>
						<td>
							Max Power
						</td>
						<td>
							<?php echo $row1[6];?>
						</td>
						

					</tr>
					<tr>
						<td>
							Max Torque
						</td>
						<td>
							<?php echo $row1[7];?>
						</td>
						

					</tr>
					<tr>
						<td>
							Milage
						</td>
						<td>
							<?php echo $row1[8];?>
						</td>
						

					</tr>
					<tr>
						<td>
							Number Of Gear
						</td>
						<td>
							<?php echo $row1[9];?>
						</td>
						

					</tr>
					<tr>
						<td>
							AirBags
						</td>
						<td>
							<?php echo $row1[10];?>
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
						

					</tr>
					<tr>
						<td>
							Ground Clearence
						</td>
						<td>
							<?php echo $row1[24];?>
						</td>
						

					</tr>
<tr>
						<td>
							Front Break Type
						</td>
						<td>
							<?php echo $row1[25];?>
						</td>
						

					</tr>
					<tr>
						<td>
							Rear Break Type
						</td>
						<td>
							<?php echo $row1[26];?>
						</td>
						
					</tr>
					<tr>
						<td>
							Wheel
						</td>
						<td>
							<?php echo $row1[27];?>
						</td>
						

					</tr>
					<tr>
						<td>
							Door
						</td>
						<td>
							<?php echo $row1[28];?>
						</td>
						

					</tr>
					<tr>
						<td>
							Boot Space
						</td>
						<td>
							<?php echo $row1[29];?>
						</td>
						

					</tr>
					<tr>
						<td>
							Tank Capacity
						</td>
						<td>
						<?php echo $row1[30];?>
						</td>
						

					</tr>
					<tr>
						<td>
							Price
						</td>
						<td>
							<?php echo $row1[31];?>/-
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
						

					</tr>
					
				</table>

		</div>
		<div class="ov1" id="o4" style=" display:none;">
			<table>
				<tr>
					<td>
						<?php
echo $car_name;
						?>
					</td>
					<?php $p=explode(",",$row1[33]);
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
	</div><?php
}
?>
</body>
</html>
