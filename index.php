<?php
session_start();
$_SESSION["token"]=md5(uniqid(mt_rand(),true));
$t1=$_SESSION["token"];
?><html>
<head>
	<title>Car Compare Home</title>
	<link rel="shortcut icon" href="car.png">
	<link rel="stylesheet" type="text/css" href="new.css">
	<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
$("#lo").click(function(){
$("#lo1").slideDown(2000);
});

		});
	</script>
	<script type="text/javascript">
		
		function fun1(str)
		{
			if(str=="--Select-Make--")
			{
				 document.getElementById("txtHint").innerHTML ="<option>--Select-Model--</option>";
				  document.getElementById("txtHint2").innerHTML ="<option>--Select-Version--</option>";
			}
			else{
			var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                document.getElementById("txtHint2").innerHTML ="<option>--Select-Version--</option>";
            }
        }
        xmlhttp.open("GET", "gethint1.php?q=" + str+"&token=<?php echo $t1;?>", true);
        xmlhttp.send();
	}	}

	function fun2(str)
	{
		var x=document.getElementById('txt').value;
if(str=="--Select-Model--")
			{
				 document.getElementById("txtHint2").innerHTML ="<option>--Select-Version--</option>";
			}
			else{
				var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint2").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "gethint2.php?q=" +x+"&q1="+str+"&token=<?php echo $t1;?>", true);
        xmlhttp.send();
			}
	}
	function fun3(str)
		{
			if(str=="--Select-Make--")
			{
				 document.getElementById("txtHint11").innerHTML ="<option>--Select-Model--</option>";
				  document.getElementById("txtHint12").innerHTML ="<option>--Select-Version--</option>";
			}
			else{
			var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint11").innerHTML = xmlhttp.responseText;
                document.getElementById("txtHint12").innerHTML ="<option>--Select-Version--</option>";
            }
        }
        xmlhttp.open("GET", "gethint1.php?q=" + str+"&token=<?php echo $t1;?>", true);
        xmlhttp.send();
	}	}
	function fun4(str)
	{
		var x=document.getElementById('txt1').value;
if(str=="--Select-Model--")
			{
				 document.getElementById("txtHint12").innerHTML ="<option>--Select-Version--</option>";
			}
			else{
				var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint12").innerHTML = xmlhttp.responseText;

            }
        }
        xmlhttp.open("GET", "gethint2.php?q=" +x+"&q1="+str+"&token=<?php echo $t1;?>", true);
        xmlhttp.send();
			}
	}
	function form_valid()
	{
var t1=document.getElementById("txt").value;
var t2=document.getElementById("txtHint").value;
var t3=document.getElementById("txtHint2").value;
var x1=document.getElementById("txt1").value;
var x2=document.getElementById("txtHint11").value;
var x3=document.getElementById("txtHint12").value;
if(t3=="--Select-Version--"||x3=="--Select-Version--")
{
	  $(document).ready(function(){
	  	$("#error1").hide();
$("#error2").show(500);
            });
            return false;
}

else if(x1==t1&&x2==t2&&x3==t3)
{
            $(document).ready(function(){
            	$("#error2").hide();
$("#error1").show(500);

            });
            return false;
	}

}
	</script>
</head>
<body>
<div class="login" id="lo1"style=" display:none;">
	<div class="log" >
	<form action="login.php" method="post">
		<div class="i3"><label>Email</label><input type="email" name="email" required /></div>
          <div class="i3"><label>Password</label><input type="password" name="pass" required /></div>
          <div class="i3"><label></label><input type="submit" value="Login" name=""/></div>
</form>	</div><br>
	<hr>
	<div class="reg">
	<form action="reg.php" method="post">
	<div class="i3"><label>Name</label><input type="text" name="name" required/></div>
		<div class="i3"><label>Email</label><input type="email" required name="email"/></div>
		<div class="i3"><label>Place</label><input type="text" name="place" required/></div>
		<div class="i3"><label>Age</label><input type="number" name="age" required/></div>
          <div class="i3"><label>Password</label><input type="password" name="pass" required/></div>
          <div class="i3"><label></label><input type="submit" value="Register" name=""/></div>
          </form>
	</div>
</div>
<div class="header">
	<div class="h1">
		
		CarNCar
	</div>

	<div class="h2">
		<div class="h21" onclick="window.location='new_car.php'">
			<span>New Car</span>
		</div>
		
	</div>
    <div class="h3">
    	<div class="h31"><?php
echo $_SESSION['user'];
    	?>

    	</div>
    	<div class="h32" id="lo">
    		<img class="add_img" src="logo.png" width="40px" height="40px">
    	</div>
    </div>
</div>
<div class="add">
	<img src="add.jpg" style=" margin-top: 20px; margin-left: 100px;">
</div>
<form action="compare.php" method="post" onsubmit="return form_valid()">
<div class="compare">
	<div class="c1">
		<h1>Compare Car : </h1>
		<hr>
		Choose at least two cars of your choice to see how they compare on price, features, and performance.
		<div class="car1">
			<div class="input">
				<label>Car-1 : </label><select id="txt" name="car1_make" onchange="fun1(this.value)"><option>  --Select-Make--</option>
<?php
mysql_connect("182.50.133.87","nithinsathyan","nithinsathyan123");
mysql_select_db("nidhinsathyan_car");
$q="select distinct car_make from car_details";
$r=mysql_query($q);
while ($row=mysql_fetch_row($r)) {
	echo "<option>".$row[0]."</option>";
}
?>
				</select>
				<select name="car1_model" id="txtHint" onchange="fun2(this.value)"><option>--Select-Model--</option></select>
				<select id="txtHint2" name="car1_version"><option>  --Select-Version--</option></select>
			</div>

		</div>
        <div class="car2">
        	<label>Car-2 : </label><select name="car2_make" id="txt1" onchange="fun3(this.value)"><option>  --Select-Make--</option>

<?php 
mysql_connect("182.50.133.87","nithinsathyan","nithinsathyan123");
mysql_select_db("nidhinsathyan_car");
$q="select distinct car_make from car_details";
$r=mysql_query($q);
while ($row=mysql_fetch_row($r)) {
	echo "<option>".$row[0]."</option>";
}
?>
        	</select>
				<select name="car2_model" id="txtHint11" onchange="fun4(this.value)"><option>  --Select-Model--</option></select>
				<select name="car2_version"id="txtHint12"><option>  --Select-Version--</option></select>
        </div>
         <div class="car2">
        	<button type="submit" >Compare</button><span id="error1" style=" margin-left: 20px;font-weight: bold;color: red; font-family:calibari; display:none;">Sorry...Please Compare Two Different Vehicles..!!</span>
        	<span id="error2" style=" margin-left: 20px;font-weight: bold;color: red; font-family:calibari; display:none;">Please Select Two Vehicles..!!</span>
        </div>
	</div>
	<div class="c2">
		
		<img src="add2.jpg" width="280px" height="200px">
</div>
</div>

</form>
<div class="footer"></div>
</body>
</html>
<?php
if(isset($_GET["log"]))
{
	if($_GET["log"]="ok")
	{
		?>
<script>
	alert("Welcome");
	window.location='index.php';
</script>
		<?php
	}
	else{
		?>
<script>
	alert("Invalid");
	window.location='index.php';
</script>
		<?php
	}
}
?>
