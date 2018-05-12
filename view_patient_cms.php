
<a href="insert_patient.php">insert patient</a><br>
<table border="2" width="100%">
<?php 

session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");


require_once('ConnectionClass.php');
$connection = new Connection();
$q = $connection->execute("select * from patient");
echo "<h1>Patients</h1>
		<tr>
		<th>Name</th>
		<th>Age</th>
		<th>Gender</th>
		<th>Phone Number</th>
		<th>Submission Date</th>
		<th>Room Number</th>
		<th>Doctor ID</th></tr>";
while($row = mysql_fetch_array($q))
{
	$id = $row["id"]; 
	echo "<tr>"; 
	echo "<td>".$row["name"]."</td>"; 
	echo "<td>".$row["age"]."</td>"; 
	echo "<td>".$row["gender"]."</td>";
	echo "<td>".$row["phone"]."</td>"; 
	echo "<td>".$row["submission_date"]."</td>";
	echo "<td>".$row["room"]."</td>";
	echo "<td>".$row["dr_id"]."</td>"; 
	echo "<td><a href='update_patient_cms.php?id=$id'>update</a></td>";
	echo "<td><a href='delete_patient_cms.php?id=$id'>delete</a></td>"; 
	echo "</tr>"; 
}


 ?>

 </table>