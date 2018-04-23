<!DOCTYPE html>
<html>
<body>

<p>HTML Hello</p>

<?php
    require 'config.php';


    $result = mysqli_query($conn, "SELECT * FROM `staffTest`") 
    or die (mysqli_error()); 


    $overall = array();
   
    $access = array(); 


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  " Access: " . $row["access"]. " User: " . $row["username"]. " pass: " . $row["password"]. "<br>";
        
    }
} else {
    echo "0 results";
}

    echo 'hello <br>' ;

    // Define $username and $password
    $user="staff";
    $pass="a";

    // To protect MySQL injection for Security purpose
    $user = stripslashes($user);
    $pass = stripslashes($pass);
    $user = mysql_real_escape_string($user);
    $pass = mysql_real_escape_string($pass);



    
   $query = mysqli_query($conn, "SELECT * FROM `staffTest` WHERE `username` = '$user' AND `password` = '$pass'") 
   or die (mysqli_error()); 

echo ($query->num_rows > 0) ;

   if ($query->num_rows > 0) {
    // output data of each row
    while($row = $query->fetch_assoc()) {
        echo  " Access: " . $row["access"]. " User: " . $row["username"]. "pass" . $row["password"]. "<br>";
        $access[] = $row["access"];
        echo $row["access"] . "<br>";
    }
} else {
    echo "0 results";
}

echo "access[0] is " . $access[0] . "<br>";   
   

  if(!mysqli_num_rows($query))
   echo "Invalid user login. ";
   else {
   
        if($access[0] == 0){
            $_SESSION['login_user']=$username; // Initializing Session
           echo "Location: admin.php <br>" .$access[0] ; }
        else
        {
            $_SESSION['login_user']=$username; // Initializing Session
            echo "Location: staff.php <br> " .$access[0] ;  
        }

    }

    ?>
<body>
</html>
