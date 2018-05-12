<?php
session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="admin"){
 header("location: cms_menu.php");
}
require_once('ConnectionClass.php');
$connection = new Connection();
$c = $connection->execute("select * from operation");

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
    <a id="logout" href="Login.html">
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

  <div class="profile"> 
    Operation name
    <p>Operation's doctor</p> 
    <p>Operation's patient</p> 
    <p>Operation date</p>
    <p>Operation Time</p> 
    <p>Operation procedure</p> 
    <p>Operation Room Number</p>
  </div>

</div>
</body>

</html>
