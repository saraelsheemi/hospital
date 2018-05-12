<?php
session_start();
if(isset($_SESSION['logged'])) { 
require_once('ConnectionClass.php');
$connection = new Connection();
$c = $connection->execute("select * from operation");
} 
 else 
    header("location: LoginIndex.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Operations</title>
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

	<div id="body">
	</div>

	<ul id="navbar"><b>
  		<li id="topmenu"><a id="topmenu" href="Doctors.php">Doctors</a></li>
  		<li id="topmenu"><a id="topmenu" href="Patients.php">Patients</a></li>
 		<li id="topmenu"><a id="topmenu" class="active" href="Operations.php">Operations</a></li>
  		<li id="topmenu"><a id="topmenu"  href="Schedule.php">Schedule</a></li></b>
	</ul>

	<table class="dtable">
	<?php
	$col = 1; 
		while($d = mysql_fetch_array($c))
    {
    
    $opname =$d['name'];
    $opid = $d['id'];
    $opdate = $d['image'];
    
    $opimage = $d['image'];
    $roomnum= $d['room'];

    $ptid = $d['patient_id'];  
    $e = $connection->execute("select * from patient where id=$ptid");
	$row2 = mysql_fetch_array($e);
	$ptname = $row2['name'];
	$drid = $row2['dr_id']; 
    $x = $connection->execute("select * from doctors where dr_id=$drid");
	$row = mysql_fetch_array($x);
	$drname = $row['name']; 

    

      if($col == 5  ) {
		echo "<tr class='dtcontent'>";
		$col=1; 
	}
      echo	"<td class='dtcontent'>
		 	
				<img src='$opimage'>
				<div class='profile2'>
				$opname</br>
				Doctor: $drname<br>
				Patient: $ptname<br>
				Room: $roomnum</div>
				
			</td> ";
			$col++;
		if($col == 5  ){	
      echo "</tr>";
	       
	}  }

	?>

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
		</table>



</body>
</html>