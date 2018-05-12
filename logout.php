
<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: LoginIndex.php"); // Redirecting To Home Page
}
?>