<?php 
session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");


require_once('ConnectionClass.php');
$connection = new Connection(); 
$d = $connection->execute("select name from doctors");
$p = $connection->execute("select * from patient");

 ?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form class="insertform" action="#" method="post" >
	<p > Insert Operation Info </p> 
	Patient Name <SELECT id="select" name="patients"  required> 
		 		 <option value='select'>(Select One)</option>
					<?php  
						 while($row = mysql_fetch_array($p)) {
					?>
						<option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>;  
						<?php 
					}
						 ?> 
						</SELECT>
						<br>
	Doctor Name <SELECT id="select" name="doctors"  required> 
		 		 <option value='select'>(Select One)</option>
					<?php  
						 while($row2 = mysql_fetch_array($d)) {
					?>
						<option value="<?php echo $row2['name'];?>"><?php echo $row2['name'];?></option>;  
						<?php 
					}
						 ?> 
						</SELECT>
						<br>
	Operation Name <input type="text" name="operationname" required><br> 
	Date <input type="date" name="operationdate"  required><br>
	Room Number <input type="text" name="roomnumber"  required><br>
	<input type="submit" name="btn" value="Insert Operation">
</form>
</body>
</html>

<?php 
if(isset($_POST["btn"])){ 
$pname= $_POST["patients"];
$opname=$_POST["operationname"];
$opdate=$_POST["operationdate"];
$room=$_POST["roomnumber"];  

$b =  $connection->execute("select id, dr_id from patient where name='$pname'");
$j = mysql_fetch_array($b);
$pid=$j['id'];
$drid=$j['dr_id'];

$e=$connection->execute("insert into operation (name, date, room, patient_id, dr_id) values ('$opname', '$opdate', $room ,$pid, 
	$drid);");

if($e){ 
	echo "inserted";
}
else 
	echo "not inserted";
}
 ?>
