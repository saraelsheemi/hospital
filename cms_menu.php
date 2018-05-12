
<?php 
session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");

?> 
 <!DOCTYPE html>
<html>
<head>
  <title>Schedule</title>
</head> 
<body>

<a  style="float:right; padding-right: 50px" href="logout.php">
    Log out </a>


  <div >
  </div>

  <ul style="list-style-type: none;" ><b>
      <li ><a   href="view_doctor_cms.php">Doctors</a></li>
      <li ><a  href="view_patient_cms.php">Patients</a></li>
    <li ><a  href="view_operation_cms.php">Operations</a></li>
  </ul>
</body> 
</html> 
