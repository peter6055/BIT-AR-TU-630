<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);


$response = (array) null;

if (!isset($_GET['phoneNumber']) || empty($_GET['phoneNumber'])){
    echo json_encode($response);
    exit();
}


$phoneNumber = $_GET['phoneNumber'];


// Initial connection
$mysqli = new mysqli("localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "prod_users");

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    echo json_encode($response);
    exit();
}


$data_count = $mysqli->query("SELECT count(*) as count FROM `appointments` JOIN accounts ON appointments.userID = accounts.userID WHERE accounts.phoneNumber = '" .$phoneNumber."' AND `status` LIKE 'booked'");
$data_count_fetch = $data_count->fetch_assoc();


if($data_count_fetch['count'] === 0){
    echo json_encode($response);
    exit();

} else {
    $data = $mysqli->query("SELECT * FROM `appointments` JOIN accounts ON appointments.userID = accounts.userID WHERE accounts.phoneNumber = '" .$phoneNumber."' AND `status` LIKE 'booked'");

    while ($data_fetch = $data->fetch_assoc()) {
        // return with array format
        $response = array_values($data_fetch);
    }

    // encode it with json and send it back
    echo json_encode($response);
}



