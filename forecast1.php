<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"  content="width=device-width, initial-scale=1">
        <title>Forecaster</title>


        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        
</head>

<body>

<?php
$servername = "localhost";
$username = "p_f17_3";
$password = "45trzb";
$dbname = "test";

//seat capacity of the floors
$overallSeat = 679;
$mainSeat = 299;
$concourseSeat = 200;
$groundSeat = 180;



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

//echo 'Overall data input  <br>';

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
//echo "id: " . $row["id"] . " time: " . $row["time"] . " Average: " . $row["average"].  "<br>";
$overall[] = $row["average"];
}
} else {
echo "0 results";
}




$sql = "SELECT id, time, average  FROM `concourse_average`";
$result = $conn->query($sql);

$concourse = array();

//echo 'concourse data input  <br>';

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
//echo "id: " . $row["id"] . " time: " . $row["time"] . " Average: " . $row["average"].  "<br>";
$concourse[] = $row["average"];
}
} else {
echo "0 results";
}


$sql = "SELECT id, time, average  FROM `ground_floor_average`";
$result = $conn->query($sql);

$ground = array();

//echo 'Ground data input  <br>';

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
//echo "id: " . $row["id"] . " time: " . $row["time"] . " Average: " . $row["average"].  "<br>";
$ground[] = $row["average"];
}
} else {
echo "0 results";
}

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





?>



<!-- Top content -->
<div class="top-content">
    
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1>Forecaster</h1>
        <h3>Sojourner Truth Library - SUNY New Paltz</h3>
                </div>
            </div>

            <div class="hidden-xs justify-content-cente col-sm-2 col-sm-offset-5 schedule-legend">
                    <div class="row justify-content-center">
                        <div class="success-color text-white">Avalible</div>
                        <div class="alert-warning text-dark">Busy</div>
                        <div class="alert-danger text-white">Very Busy</div>
                        
                        <div class="alert-dark text-white">Past</div>                 
                     
                        
                    </div>
                </div>

            <div style="position:relative;">
                    <table class="reservations" border="1" cellpadding="0" width="100%">
                        <thead>
                            <tr class="today"> 
                                    <td class="resdate"> Today's <?php echo "date: " . date(' d/m/Y'); ?> </td>
                                        <td class="reslabel " colspan="1">8:00 AM</td>

                                        <td class="reslabel" colspan="1">9:00 AM</td>
                                        
                                        <td class="reslabel" colspan="1">10:00 AM</td>
                                        
                                        <td class="reslabel" colspan="1">11:00 AM</td>
                                        
                                        <td class="reslabel" colspan="1">12:00 PM</td>
                                        
                                        <td class="reslabel" colspan="1">1:00 PM</td>
                                        
                                        <td class="reslabel" colspan="1">2:00 PM</td>
                                        
                                        <td class="reslabel" colspan="1">3:00 PM</td>
                                       
                                        <td class="reslabel" colspan="1">4:00 PM</td>
                                        
                                        <td class="reslabel" colspan="1">5:00 PM</td>
                                        
                                        <td class="reslabel" colspan="1">6:00 PM</td>
                                        
                                        <td class="reslabel" colspan="1">7:00 PM</td>
                                        
                                        <td class="reslabel" colspan="1">8:00 PM</td>
                                        
                                        <td class="reslabel" colspan="1">9:00 PM</td>
                                        
                                        <td class="reslabel" colspan="1">10:00 PM</td>
                                        
                                        <td class="reslabel" colspan="1">11:00 PM</td>
                                        
    
                                </tr>
                             </thead>
                    <tbody>
                                                                                                                                                        <tr class="slots">
                                <td class="resourcename">


                                
                            </tr>
            <tr class="slots">
                    <td class="resourcename">
                            <a href="" resourceid="3" class="resourceNameSelector" resource-details-bound="1">Overall</a>
                                                                        </td>
                            <?php          
                             for ($i = 0; $i < 16; $i++) {
                                    
                                if($overall[$i] < ($overallSeat /4)  ){
                                    echo '<td colspan="1" class="alert-success text-white" ></td>' ;
                                }elseif ($overall[$i] < ($overallSeat /2) ) {
                                    echo '<td colspan="1" class="alert-warning text-dark" ></td>';
                                }else{
                                    echo '<td colspan="1" class="alert-danger text-white" ></td>';
                                }

                            }
                            ?>
                          


                            </tr>
                
            </tr>


                
            </tr>
                                                                                                                                        <tr class="slots">
                <td class="resourcename">
                             <a href="" resourceid="3" class="resourceNameSelector" resource-details-bound="1">Main: Top Floor</a>
                                                                        </td>
                                                                        <?php          
                             for ($i = 0; $i < 16; $i++) {
                                    
                                if($main[$i] < ($mainSeat /4)  ){
                                    echo '<td colspan="1" class="alert-success text-white" ></td>' ;
                                }elseif ($main[$i] < ($mainSeat /2) ) {
                                    echo '<td colspan="1" class="alert-warning text-dark" ></td>';
                                }else{
                                    echo '<td colspan="1" class="alert-danger text-white" ></td>';
                                }

                            }
                            ?>

                            </tr>
                
            </tr>
                                                                                                                                        <tr class="slots">
                <td class="resourcename">
                        <a href="" resourceid="3" class="resourceNameSelector" resource-details-bound="1">Concourse: Mid Floor</a>
                </td>
                <?php          
                             for ($i = 0; $i < 16; $i++) {
                                    
                                if($concourse[$i] < ($concourseSeat /4)  ){
                                    echo '<td colspan="1" class="alert-success text-white" ></td>' ;
                                }elseif ($concourse[$i] < ($concourseSeat /2) ) {
                                    echo '<td colspan="1" class="alert-warning text-dark" ></td>';
                                }else{
                                    echo '<td colspan="1" class="alert-danger text-white" ></td>';
                                }

                            }
                            ?>
                        </tr>
            
                                                                                    </tr>
            
                
            

                            <tr class="slots">
                                    <td class="resourcename">
                                            <a href="" resourceid="3" class="resourceNameSelector" resource-details-bound="1">Ground: Bottom Floor</a>
                                                                                       </td>
                                                                                       <?php          
                             for ($i = 0; $i < 16; $i++) {
                                    
                                if($ground[$i] < ($groundSeat /4)  ){
                                    echo '<td colspan="1" class="alert-success text-white" ></td>' ;
                                }elseif ($ground[$i] < ($groundSeat /2) ) {
                                    echo '<td colspan="1" class="alert-warning text-dark" ></td>';
                                }else{
                                    echo '<td colspan="1" class="alert-danger text-white" ></td>';
                                }

                            }
                            ?>          
       
                                           </tr>
                               
                           </tr>
                                
                            
                                                                               
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>


<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/navagation.ts"></script>


<!--[if lt IE 10]>
    <script src="assets/js/placeholder.js"></script>
<![endif]-->

</body>

</html>