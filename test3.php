<!DOCTYPE html>
<html>
<body>

<p>HTML Hello</p>

<?php
    require 'config.php';

    date_default_timezone_set('America/New_York');
                $date = date('Y-m-d');
                $currtime = date('h:i:s');
                $curhour = date('H');

                $sql = "SELECT id, time, average  FROM `main_average`";
                $result = $conn->query($sql);
    
                $main = array();
    
                //echo 'Main data input  <br>';
    
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        //echo "id: " . $row["id"] . " time: " . $row["time"] . " Average: " . $row["average"].  "<br>";
                        $main[] = $row["average"];
                    }
                } else {
                    echo "0 results";
                }
    


    $sql = "SELECT SUM(count) FROM main_floor where dateTime between '$date $curhour:00:00' and '$date $curhour:59:00' ";
    $main_floor_curr_hour = $conn->query($sql);
    $main_curr_hour = $main_floor_curr_hour->fetch_array();

    echo $curmain = $main_curr_hour[0];
    
    $limithour = $curhour - 8;

            $PercentDiffTotal = 0.0;
            $PercentDiffMain = 0.0;
            $PercentDiffCon = 0.0;
            $PercentDiffGrond = 0.0;

            $sumOverall = 0;
            $sumMain = 0;
            $sumConcourse = 0;
            $sumGround = 0;

            //user curhour to get the %diff from average

            //sum of average up till current hour
            

            if($curMain > 0){ // then get teh Percent diff
                $PercentDiffMain = $curMain - $main[$limithour];
            }


    ?>
<body>
</html>
