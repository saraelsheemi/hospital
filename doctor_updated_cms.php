
<?php 
session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");


$drid=$_POST["dr_id"];
$name=$_POST["drname"];
$age=$_POST["drage"];
$email=$_POST["dremail"];
$phone=$_POST["drphone"];
$gender=$_POST["drgender"];
$dep = $_POST["drdepartment"];

require_once('ConnectionClass.php');
$connection = new Connection();
$c = $connection->execute("update doctors set name='$name', age=$age, email='$email', phone='$phone', gender='$gender', department_id=$dep where dr_id=$drid");
if($c)
	header("location:view_doctor_cms.php"); 
else 
	echo "not updated";


?>