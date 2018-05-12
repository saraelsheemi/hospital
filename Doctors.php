<?php

require_once('ConnectionClass.php');
session_start();
if(isset($_SESSION['logged'])) { 
$connection = new Connection();
$c = $connection->execute("select * from doctors");
 } else 
    header("location: LoginIndex.php");
?>

<!DOCTYPE html>
<html>
<head>
<style>
<?php include 'style.css'; ?>
</style>
	<title>Doctors</title>
</head>
<body>

	<a id="logout" href="logout.php">
		Log out
	</a>

	<form class="search" action="search_doctors.php" style="float:right;" method="GET">
	    <input type="text" name="query" />
	    <input type="submit" name ="search" value="Search" />
	</form>

	<div>
		<a href="WelcomePage.php">
			<img id="log" src="images/Logo.png" alt="logo" >
		</a>
		<h1 id="lo">HPIMS</h1>
	</div>

	<div id="body">
	</div>

	<ul id="navbar"><b>
  		<li id="topmenu"><a id="topmenu" class="active" href="Doctors.php">Doctors</a></li>
  		<li id="topmenu"><a id="topmenu" href="Patients.php">Patients</a></li>
 		<li id="topmenu"><a id="topmenu" href="Operations.php">Operations</a></li>
  		<li id="topmenu"><a id="topmenu" href="Schedule.php">Schedule</a></li></b>
	</ul>

	<table class="dtable">
	<?php
	$col = 1; 
		while($d = mysql_fetch_array($c))
    {
    
    $depid=$d['department_id'];
    $drname =$d['name'];
    $drimage = $d['image'];
    $drid=$d['dr_id'];
    $n=$connection->execute("select name from department where id=$depid");
    $m= mysql_fetch_array($n);
    $depname = $m['name'];
      if($col == 5  ) {
		echo "<tr class='dtcontent'>";
		$col=1; 
	}
      echo	"<td class='dtcontent'>
		 		<a class='dacontent' href='view_doctor.php?dr_id=$drid'>
				<img src='$drimage'>
				<div class='profile2'>
				$drname</br>
				$depname</div>
				</a>
			</td> ";
			$col++;
		if($col == 5  ){	
      echo "</tr>";
  }
       
}
	?>
  </table>
	<script type="text/javascript">

		window.onscroll = function() {myFunction()};

		var navbar = document.getElementById("navbar");
		var sticky = navbar.offsetTop;

		function myFunction() {
 			 if (window.pageYOffset >= sticky) {
 			   navbar.classList.add("sticky")
  				} else {
 	   			navbar.classList.remove("sticky");
  				}
			}
	</script>
</body>
</html>
