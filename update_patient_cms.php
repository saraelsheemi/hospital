
<?php 

session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");



$ptid = $_GET["id"]; 
require_once('ConnectionClass.php');
$connection = new Connection();
$c = $connection->execute("select * from patient where id=$ptid");
$row = mysql_fetch_array($c); 


 ?>
 <form action="patient_updated_cms.php" method="post">
 	<input type="hidden" name="pt_id" value="<?php echo $ptid?>">
 	Doctor Name  <input type="text" name="ptname" value="<?php echo $row['name'] ?>"><br>
	Age  <input type="text" name="ptage" value="<?php echo $row['age'] ?>"><br>
	Gender  <input type="text" name="ptgender" value="<?php echo $row['gender'] ?>"><br>
	Phone  <input type="text" name="ptphone" value="<?php echo $row['phone'] ?>"><br>
	Submission Date  <input type="date" name="sub_date" value="<?php echo $row['submission_date'] ?>"><br>
	Room Number  <input type="text" name="room" value="<?php echo $row['room'] ?>"><br>
	Doctor ID  <input type="text" name="drid" value="<?php echo $row['dr_id'] ?>"><br>
	<input type="submit" value="update">

 </form>