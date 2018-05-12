<?php 

session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="admin"){
 header("location: cms_menu.php");
}
if (isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor"){ 
}

 else 
    header("location: LoginIndex.php");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
  <style>
<?php include 'style.css'; ?>
</style>
</head>
<body class="hospitalpage">

	<a id="logout" href="logout.php">
    Log out
  </a>

  <div>
    <a href="WelcomePage.php">
      <img id="log" src="images/Logo.png" alt="logo" >
    </a>  
    <h1 id="lo">HPIMS</h1>
  </div>

  <div id="body">
  </div>

  <ul id="navbar"><b>
      <li id="topmenu"><a id="topmenu"  href="Doctors.php">Doctors</a></li>
      <li id="topmenu"><a id="topmenu" href="Patients.php">Patients</a></li>
    <li id="topmenu"><a id="topmenu" href="Operations.php">Operations</a></li>
      <li id="topmenu"><a id="topmenu" href="Schedule.php">Schedule</a></li></b>
  </ul>


	<div class="hospital">
	<h3>Welcome to Seattle Children Hospital</h3>
	+1 206-987-2000<br>
	4800 Sand Point Way NE, Seattle, WA 98105, USA<br>
	</div>
</body>
</html>