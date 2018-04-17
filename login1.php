<?php
require 'config.php';
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$user=$_POST['username'];
$pass=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$user = stripslashes($user);
$pass = stripslashes($pass);
$user = mysql_real_escape_string($user);
$pass = mysql_real_escape_string($pass);
// Selecting Database

// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($conn, "SELECT * FROM `Staff` WHERE `UserName` = '$user' AND `Password` = '$pass'") 
	or die (mysqli_error()); 
$rows = mysql_num_rows($query);
if(!mysqli_num_rows($query)) {
    $error = "Username or Password is invalid";
} else {
    $_SESSION['login_user']=$user; // Initializing Session
    header("location: home.php"); // Redirecting To Other Page

}
mysql_close($conn); // Closing Connection
}
}
?>