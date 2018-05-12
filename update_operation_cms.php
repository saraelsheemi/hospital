
<?php 

session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");


$opid = $_GET["id"]; 
require_once('ConnectionClass.php');
$connection = new Connection();
$c = $connection->execute("select * from operation where id=$opid");
$row = mysql_fetch_array($c); 


 ?>
 <form action="operation_updated_cms.php" method="post">
 	<input type="hidden" name="op_id" value="<?php echo $opid?>">
 	Name  <input type="text" name="opname" value="<?php echo $row['name'] ?>"><br>
 	Patient ID  <input type="text" name="ptid" value="<?php echo $row['patient_id'] ?>"><br>
 	Doctor ID  <input type="text" name="drid" value="<?php echo $row['dr_id'] ?>"><br>
	Submission Date  <input type="date" name="date" value="<?php echo $row['date'] ?>"><br>
	Room Number  <input type="text" name="room" value="<?php echo $row['room'] ?>"><br>
	<input type="submit" value="update">

 </form>