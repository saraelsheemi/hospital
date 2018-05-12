
<?php 
session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");


require_once('ConnectionClass.php');
$connection = new Connection(); 
$q = $connection->execute("select name from doctors");


 ?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form class="insertform" action="#" method="post" >
	<p> Insert Patient Info </p> 
	Name   <input type="text" name="patientname" required><br> 
	Age <input type="text" name="patientage"><br> 
	Gender <input id="radio1" type="radio" onclick="change(radio1)" name ="patgender" value="Female">Female
			<input id="radio2" type="radio" onclick="change(radio2)" name ="patgender" value="Male">Male<br>
	Phone Number <input type="text" name="patientphone"><br> 
	Submission Date <input type="date" name="Submissiondate"><br>
	Room Number <input type="text" name="roomnumber"><br>
	Doctor <SELECT name="doctors"> 
		  <option value='select'>(Select One)</option>
		<?php  
			 while($row = mysql_fetch_array($q)) {
		?>
			<option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>;  
			<?php 
					}
			?> 
			</SELECT>
	<br>

	<input type="submit" name="btn" value="Insert Patient">
</form>
</body>
</html>

<?php  
if(isset($_POST["btn"])){ 
$name=$_POST["patientname"];
$age=$_POST["patientage"];
$phone=$_POST["patientphone"];
$gender=$_POST["patgender"];
$dr = $_POST["doctors"];
$room=$_POST["roomnumber"]; 
$subdate=$_POST["Submissiondate"]; 

$a =  $connection->execute("select dr_id from doctors where name='$dr'");
$i = mysql_fetch_array($a);
$drid=$i["dr_id"];

$e=$connection->execute("insert into patient (name, age, submission_date, phone, gender,room, dr_id) values ('$name', $age, '$subdate', '$phone', '$gender',$room, $drid);");
if($e){ 
	echo "inserted";
}
else 
	echo "not inserted";
}


?>