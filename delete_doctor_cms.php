
<?php 

session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");


$drid = $_GET["dr_id"]; 
require_once('ConnectionClass.php');
$connection = new Connection();
$c = $connection->execute("delete from doctors where dr_id=$drid");

if($c)
header("location:view_doctor_cms.php"); 
else 
echo "Not Deleted"; 







 ?>