<!DOCTYPE html>
<html>
<body>

<p>HTML Hello</p>

<?php
$servername = "localhost";
$username = "p_f17_3";
$password = "45trzb";
$dbname = "test";




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo'failer';
} 


date_default_timezone_set('UTC');
$date = date('Y-m-d');

echo $date . "<br>" ;

$main = array();
$time = array();

                $sql = "SELECT SUM(count) FROM main_floor where dateTime between '$date 00:00:00' and '$date 23:59:00' ";
                $main_floor_result = $conn->query($sql);
                $main_row = $main_floor_result->fetch_array();

                $sql = "SELECT SUM(count) FROM concourse where dateTime between '$date 00:00:00' and '$date 23:59:00' ";
                $concourse_result = $conn->query($sql);
                $concourse_row = $concourse_result->fetch_array();

                $sql = "SELECT SUM(count) FROM ground_floor where dateTime between '$date 00:00:00' and '$date 23:59:00' ";
                $ground_floor_result = $conn->query($sql);
                $ground_row = $ground_floor_result->fetch_array();

                $atestrow = $main_floor_result->fetch_array();
                $atestrow = $concourse_result->fetch_array();
                $atestrow = $ground_floor_result->fetch_array();

                $testrow = array($main_row[0], $concourse_row[0], $ground_row[0] );


echo $main_row[0] . '<br>' ;

echo "MainFloor" . "<br>" ;

if ($main_floor_result->num_rows > 0) {
    // output data of each row
    while($row = $main_floor_result->fetch_assoc()) {
        echo "count: " . $row["count"] . " dateTime: " . $row["dateTime"] .  "<br>";
        $main[] = $row["count"];
        $time[] = $row["dateTime"];
    }
} else {
    echo "0 results";
}



$sql = "SELECT * FROM concourse where dateTime between '$date 00:00:00' and '$date 23:59:00' ";
$concourse_result = $conn->query($sql);

echo "Concourse" . "<br>" ;

if ($concourse_result->num_rows > 0) {
    // output data of each row
    while($row = $concourse_result->fetch_assoc()) {
        echo "count: " . $row["count"] . " dateTime: " . $row["dateTime"] .  "<br>";
        
    }
} else {
    echo "0 results";
}

$sql = "SELECT * FROM ground_floor where dateTime between '$date 00:00:00' and '$date 23:59:00' ";
$ground_floor_result = $conn->query($sql);

echo "Ground Floor" . "<br>" ;

if ($ground_floor_result->num_rows > 0) {
    // output data of each row
    while($row = $ground_floor_result->fetch_assoc()) {
        echo "count: " . $row["count"] . " dateTime: " . $row["dateTime"] .  "<br>";
        
    }
} else {
    echo "0 results";
}







?>

var totals = <?php echo json_encode($testrow) ?>;
var totalls = <?php echo json_encode($atestrow) ?>;

</body>
</html>
