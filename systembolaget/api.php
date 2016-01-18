<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//set up the connection variables
$hostname = "localhost";
$db_name = "systembolaget";
$username = "root";
$password = "";

// connect to the database
$conn = mysqli_connect($hostname, $username, $password, $db_name);

//a query get all the records from the database
$sql= "SELECT Namn, Namn2, nr, Forpackning FROM sortiment";

$result = $conn->query($sql);

$output = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)){
    if($output != ""){$output .= ",";}
        $output .= '{"Namn":"' . $rs["Namn"] . '",';
        $output .= '"Namn2":"' . $rs["Namn2"] . '",';
        $output .= '"nr":"' . $rs["nr"] . '",';
        $output .= '"Forpackning":"' . $rs["Forpackning"] . '",';
    }
$output = '{"records":['.$output.']}';
$conn->close();

echo($output);
?>