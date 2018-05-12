<a href="insert_operation.php">insert patient</a><br>

<table border="2" width="100%">
<?php 

session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");


require_once('ConnectionClass.php');
$connection = new Connection();
$q = $connection->execute("select * from operation");
echo "<h1>Operations</h1>
		<tr>
		<th>Name</th>
		<th>Doctor ID</th>
		<th>Patient ID</th>
		<th>Date</th>
		<th>Room Number</th></tr>";
while($row = mysql_fetch_array($q))
{
	$id = $row["id"]; 
	echo "<tr>"; 
	echo "<td>".$row["name"]."</td>"; 
	echo "<td>".$row["dr_id"]."</td>"; 
	echo "<td>".$row["patient_id"]."</td>"; 
	echo "<td>".$row["date"]."</td>";
	echo "<td>".$row["room"]."</td>";
	
	echo "<td><a href='update_operation_cms.php?id=$id'>update</a></td>";
	echo "<td><a href='delete_operation_cms.php?id=$id'>delete</a></td>"; 
	echo "</tr>"; 
}


 ?>

 </table>