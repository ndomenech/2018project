<?php
$servername = "localhost";
$username = "p_f17_3";
$password = "45trzb";
$dbname = "p_f17_3_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT dateTime, count  FROM total_average";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<p> <td colspan="1" class="p-3 mb-2 bg-success text-white">Avalable</td> </p>"
        echo "id: " . $row["id"]. " - DateTime: " . $row["dateTime"]. " - Count " . $row["count"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>