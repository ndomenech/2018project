<?php
require 'config.php';


date_default_timezone_set("America/New_York");
$date = date("Y-m-d H:i:s");

$a1 = $_POST['area1'];
$a2 = $_POST['area2'];
$a3 = $_POST['area3'];

//the data base table has the issue that the date time has an am/pm as the otheres do not.
$sql = "INSERT INTO main_floor(dateTime, count)
    VALUES('$date', '$a1')";

if (mysqli_query($conn, $sql)) {
    echo "";} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} 

$sql = "INSERT INTO concourse(dateTime, count)
    VALUES('$date', '$a2')";

if (mysqli_query($conn, $sql)) {
    echo "";} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} 

$sql = "INSERT INTO ground_floor(dateTime, count)
    VALUES('$date', '$a3')";


if (mysqli_query($conn, $sql)) {
    echo "<script>
window.location.href='success.htm';
</script>";} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} 

mysqli_close($conn);
?>