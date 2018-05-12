
<?php 

session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");


$id=$_POST["pt_id"];
$name=$_POST["ptname"];
$age=$_POST["ptage"];
$phone=$_POST["ptphone"];
$gender=$_POST["ptgender"];
$subdate = $_POST["sub_date"];
$room = $_POST["room"];
$drid = $_POST["drid"];

require_once('ConnectionClass.php');
$connection = new Connection();
$c = $connection->execute("update patient set name='$name', age=$age, phone='$phone', gender='$gender', submission_date='$subdate', room=$room, dr_id=$drid where id=$id");
$o= $connection->execute("update operation set dr_id=$drid where patient_id=$id");
if($c)
	header("location:view_patient_cms.php"); 
else 
	echo "not updated";


?>