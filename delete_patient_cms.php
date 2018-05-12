
<?php 

session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");


$id = $_GET["id"]; 
require_once('ConnectionClass.php');
$connection = new Connection();
$c = $connection->execute("delete from patient where id=$id");
$c = $connection->execute("delete from operation where patient_id=$id");

if($c)
header("location:view_patient_cms.php"); 
else 
echo "Not Deleted"; 







 ?>