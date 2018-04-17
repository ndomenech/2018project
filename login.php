
<?php
require 'config.php';

   session_start(); // Starting Session
   if(isset($_POST['submit'])) {
    $_SESSION['username'] = $_POST['username'];
    }


    // Define $username and $password
    $user=$_POST['username'];
    $pass=$_POST['password'];

    // To protect MySQL injection for Security purpose
    $user = stripslashes($user);
    $pass = stripslashes($pass);
    $user = mysql_real_escape_string($user);
    $pass = mysql_real_escape_string($pass);



   $query = mysqli_query($conn, "SELECT * FROM `Staff` WHERE `UserName` = '$user' AND `Password` = '$pass'") 
	or die (mysqli_error()); 

   if(!mysqli_num_rows($query))
	echo "No results found.";
   else {
    $_SESSION['login_user']=$username; // Initializing Session
	header("Location: home.htm");

   }    
   
   mysqli_close($conn);

?>