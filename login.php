
<?php 
require_once('ConnectionClass.php');
session_start();

if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor")
	header("location: WelcomePage.php");
if (!empty($_POST['username']) && !empty($_POST['password']))
{
$email=$_POST["username"];
$password=$_POST["password"];

//prevent SQL injection 
$email=stripslashes($email); 
$password=stripcslashes($password); 

// $email=mysqli_real_escape_string($email); 
// $password=mysqli_real_escape_string($password); 

$connection = new Connection(); 
$q = $connection->execute("select * from doctors where email='$email'");
$w = $connection->execute("select * from admin where email='$email'");


if(mysql_num_rows($w) > 0) { 
	echo "hi";	
	$_SESSION["logged"]="yes";
	$_SESSION["type"]="admin";
	header("location: cms_menu.php");
}

if(mysql_num_rows($q) > 0)  {
	$row = mysql_fetch_array($q);

	$pw=$row["password"];
	$checked = password_verify($password, $pw);

	if($checked) {
		$_SESSION["logged"]="yes";
		$_SESSION["type"]="doctor";
		header("location: WelcomePage.php");
	}	
}

else {
	 echo "Wrong Credentials"."<br>";
	 header('Refresh:1;URL= LoginIndex.php');
}


}
?>
