<?php 
require_once('ConnectionClass.php');
$name = $_GET["query"]; 
 $name = htmlspecialchars($name);
$connection = new Connection();
$c = $connection->execute("select * from patient where name LIKE '$name%'");


 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Patients</title>
	<style>
<?php include 'style.css'; ?>
</style>
</head>	
<body>

	<a id="logout" href="logout.php">
		Log out
	</a>

	<form class="search" action="search_patients.php" style="float:right;" method="GET">
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
  		<li id="topmenu"><a id="topmenu" href="Doctors.php">Doctors</a></li>
  		<li id="topmenu"><a id="topmenu" class="active" href="Patients.php">Patients</a></li>
 		<li id="topmenu"><a id="topmenu" href="Operations.php">Operations</a></li>
  		<li id="topmenu"><a id="topmenu" href="Schedule.php
  			">Schedule</a></li></b>
	</ul>

	<table class="dtable">
	<?php
	$col = 1; 
	if(mysql_num_rows($c) > 0){ 
		while($d = mysql_fetch_array($c))
    {
    
    $ptname =$d['name'];
    $ptimage = $d['image'];
    $ptid=$d['id'];
    $ptroom=$d['room'];
      if($col == 5  ) {
		echo "<tr class='dtcontent'>";
		$col=1; 
	}
      echo	"<td class='dtcontent'>
		 		<a class='dacontent' href='view_patient.php?id=$ptid'>
				<img src='$ptimage'>
				<div class='profile2'>
				$ptname</br>
				Room: $ptroom</div>
				</a>
			</td> ";
			$col++;
		if($col == 5  ){	
      echo "</tr>";
	       
	}  }
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