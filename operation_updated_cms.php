
<?php 
session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");


$id=$_POST["op_id"];
$opname=$_POST["opname"];
$drid=$_POST["drid"];
$ptid=$_POST["ptid"];
$date=$_POST["date"];
$room=$_POST["room"];  


require_once('ConnectionClass.php');
$connection = new Connection();
$c = $connection->execute("update operation set name='$opname', dr_id=$drid, patient_id=$ptid, date='$date', room=$room  where id=$id");
if($c)
	header("location:view_operation_cms.php"); 
else 
	echo "not updated";


?>