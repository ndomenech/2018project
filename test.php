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



$sql = "SELECT id, time, average  FROM `overall_average`";
$result = $conn->query($sql);

$overall = array();

echo 'Overall data input  <br>';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " time: " . $row["time"] . " Average: " . $row["average"].  "<br>";
        $overall[] = $row["average"];
    }
} else {
    echo "0 results";
}

foreach($overall as $value)
echo $value . '<br>' ; 


$sql = "SELECT id, time, average  FROM `concourse_average`";
$result = $conn->query($sql);

$concourse = array();

echo 'concourse data input  <br>';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " time: " . $row["time"] . " Average: " . $row["average"].  "<br>";
        $concourse[] = $row["average"];
    }
} else {
    echo "0 results";
}


$sql = "SELECT id, time, average  FROM `ground_floor_average`";
$result = $conn->query($sql);

$ground = array();

echo 'Ground data input  <br>';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " time: " . $row["time"] . " Average: " . $row["average"].  "<br>";
        $ground[] = $row["average"];
    }
} else {
    echo "0 results";
}

$sql = "SELECT id, time, average  FROM `main_average`";
$result = $conn->query($sql);

$main = array();

echo 'Main data input  <br>';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " time: " . $row["time"] . " Average: " . $row["average"].  "<br>";
        $main[] = $row["average"];
    }
} else {
    echo "0 results";
}





$conn->close();

?>

</body>
</html>

