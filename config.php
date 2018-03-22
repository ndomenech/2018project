<?php
   define('servername', 'localhost');
   define('username', 'p_f17_3');
   define('password', '45trzb');
   define('dbname', 'p_f17_3_db');

   $conn = mysqli_connect(servername, username, password, dbname)
  or die('Error connecting to MySQL server.');


?>