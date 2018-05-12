
<table border="2" width="100%">
<?php 

session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");


require_once('ConnectionClass.php');
$connection = new Connection();
$q = $connection->execute("select * from doctors");
echo "<h1>Doctors</h1>
		<tr>
		<th>dr id</th>
		<th>name</th>
		<th>age</th>
		<th>gender</th>
		<th>email</th>
		<th>phone number</th>
		<th>department id</th></tr>";
while($row = mysql_fetch_array($q))
{
	$id = $row["dr_id"]; 
	echo "<tr>"; 
	echo "<td>".$row["dr_id"]."</td>"; 
	echo "<td>".$row["name"]."</td>"; 
	echo "<td>".$row["age"]."</td>"; 
	echo "<td>".$row["gender"]."</td>"; 
	echo "<td>".$row["email"]."</td>"; 
	echo "<td>".$row["phone"]."</td>"; 
	echo "<td>".$row["department_id"]."</td>"; 
	echo "<td><a href='update_doctor_cms.php?dr_id=$id'>update</a></td>";
	echo "<td><a href='delete_doctor_cms.php?dr_id=$id'>delete</a></td>"; 
	echo "</tr>"; 
}


 ?>

 </table>