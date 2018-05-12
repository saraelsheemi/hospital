<?php

require_once('ConnectionClass.php');
session_start();
if(isset($_SESSION['logged'])) { 
$connection = new Connection();
$drid = $_GET["dr_id"]; 
$c = $connection->execute("select * from doctors where dr_id=$drid");
$row = mysql_fetch_array($c); 

$depid=$row['department_id'];
$n=$connection->execute("select name from department where id=$depid");
$m= mysql_fetch_array($n);
$depname = $m['name']; }
else 
    header("location: LoginIndex.php");

?>



<!DOCTYPE html> 
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Doctor</title>
  <style>
<?php include 'style.css'; ?>
</style>
</head>

<body>
    <a id="logout" href="logout.php">
    Log out
  </a>

  <div>
    <a href="WelcomePage.php">
      <img id="log" src="images/Logo.png" alt="logo" >
    </a>
    <h1 id="lo">HPIMS</h1>
  </div>

  <ul id="navbar"><b>
      <li id="topmenu"><a id="topmenu" href="Doctors.php">Doctors</a></li>
      <li id="topmenu"><a id="topmenu" href="Patients.php">Patients</a></li>
    <li id="topmenu"><a id="topmenu" href="Operations.php">Operations</a></li>
      <li id="topmenu"><a id="topmenu" href="Schedule.php">Schedule</a></li></b>
  </ul> 

<div class="whole">

  <div class="image">
    <img src="<?php echo $row['imageBIG']?>">
  </div>

  <div class="profile"> 
    <p class="drinfo">Doctor's Info</p>
    <p>Name: <?php echo $row['name']?></p> 
    <p>Gender: <?php echo $row['gender']?></p>  
    <p>Department: <?php echo $depname?></p> 
    <p>Email: <?php echo $row['email']?></p> 
    <p>Phone: <?php echo $row['phone']?></p>
   
  </div>

</div>
</body>

</html>
