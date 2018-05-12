
<?php 

session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");


$drid = $_GET["dr_id"]; 
require_once('ConnectionClass.php');
$connection = new Connection();
$c = $connection->execute("select * from doctors where dr_id=$drid");
$row = mysql_fetch_array($c); 


 ?>
 <form action="doctor_updated_cms.php" method="post">
 	<input type="hidden" name="dr_id" value="<?php echo $drid?>">
 	Doctor Name  <input type="text" name="drname" value="<?php echo $row['name'] ?>"><br>
	Age  <input type="text" name="drage" value="<?php echo $row['age'] ?>"><br>
	Gender  <input type="text" name="drgender" value="<?php echo $row['gender'] ?>"><br>
	Phone  <input type="text" name="drphone" value="<?php echo $row['phone'] ?>"><br>
	Email  <input type="text" name="dremail" value="<?php echo $row['email'] ?>"><br>
	Department ID  <input type="text" name="drdepartment" value="<?php echo $row['department_id'] ?>"><br>
	<input type="submit" value="update">

 </form>