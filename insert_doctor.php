
<?php 
session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="doctor") 
   header("location: WelcomePage.php");


require_once('ConnectionClass.php');
$connection = new Connection(); 
$q = $connection->execute("select name from department");

$name=$_POST["drname"];
$age=$_POST["drage"];
$email=$_POST["dremail"];
$phone=$_POST["drphone"];
$gender=$_POST["drgender"];
$dep = $_POST["departments"];
$hash = password_hash($_POST['drpassword'], PASSWORD_DEFAULT, ['cost' => 12]);


$a =  $connection->execute("select id from department where name='$dep'");
$i = mysql_fetch_array($a);
$depid=$i['id'];

$e=$connection->execute("insert into doctors (name, age, email, phone, gender, department_id, password) values ('$name', $age, '$email', '$phone', '$gender', $depid, '$hash');");
echo "insert into doctors (name, age, email, phone, gender, department_id, password) values ('$name', $age, '$email', '$phone', '$gender', $depid, '$hash');";
if($e){ 
	header("location: LoginIndex.php");
}
else {
	echo "not inserted";
    echo "<a href='signup.html'>Retry.</a>";
}



?>
