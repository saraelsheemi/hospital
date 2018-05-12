
<?php 

session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");


$opid = $_GET["id"]; 
require_once('ConnectionClass.php');
$connection = new Connection();
$c = $connection->execute("delete from operation where id=$opid");

if($c)
header("location:view_operation_cms.php"); 
else 
echo "Not Deleted"; 







 ?>