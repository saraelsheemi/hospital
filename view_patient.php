<?php


require_once('ConnectionClass.php');
session_start();
if(isset($_SESSION['logged'])) { 
$connection = new Connection();
$ptid = $_GET["id"]; 
$c = $connection->execute("select * from patient where id=$ptid");
$row = mysql_fetch_array($c); 

$drid=$row['dr_id'];
$n=$connection->execute("select name from doctors where dr_id=$drid");
$m= mysql_fetch_array($n);
$drname = $m['name'];
} else 
    header("location: LoginIndex.php");

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Patient</title>
  <style>
  <?php include 'style.css'; ?>
  </style>
</head>

<body>
    <a id="logout" href="logout.php">
    Log out
  </a>
  <div>
    <img id="log" src="images/Logo.png" alt="logo" >
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
    Patient's Info
    <p>Name: <?php echo $row['name']?></p> 
    <p>Gender: <?php echo $row['gender']?></p>
    <p>Age: <?php echo $row['age']?></p> 
    <p>Phone Number: <?php echo $row['phone']?></p> 
    <p>Submission Date: <?php echo $row['submission_date']?></p> 
    <p>Room Number: <?php echo $row['room']?></p>
    <p>Doctor Name: <?php echo $drname?></p>
  </div>

</div>
</body>

</html>
