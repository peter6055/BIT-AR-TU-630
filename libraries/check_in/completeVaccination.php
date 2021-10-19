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

// get appointment info
$data_dose = $mysqli->query("SELECT * FROM `appointments` JOIN accounts ON appointments.userID = accounts.userID WHERE accounts.phoneNumber = '" .$phoneNumber. "' AND `status` LIKE 'booked'");
$data_dose_fetch = $data_dose->fetch_assoc();

echo($data_dose_fetch['dose']);

// change dose record in user profile
if($data_dose_fetch['dose'] == 1){
    $mysqli->query("UPDATE accounts SET firstDoseCompleted = '1' WHERE accounts.phoneNumber = '" .$phoneNumber. "'");
} else {
    $mysqli->query("UPDATE accounts SET secondDoseCompleted = '1' WHERE accounts.phoneNumber = '" .$phoneNumber. "'");
}


// change appointment status
$mysqli->query("UPDATE appointments JOIN accounts ON appointments.userID = accounts.userID SET appointments.status = 'completed' WHERE accounts.phoneNumber = '" .$phoneNumber. "' AND appointments.status LIKE 'booked'");


// This system is use to insert follow up cron job queues into database.
$userID = $data_dose_fetch['userID'];


// Get today's date
$date = date( "Y-m-d H:i:s" );


// -------- Follow up Survey --------
// Insert to followu up queues - 24 hours after (86400 second)
$result = $mysqli->query( "INSERT INTO `prod_users`.`survey_followup_queues` (`userID`, `queueID`, `queueDate`, `completed`, `attempted`, `queueType`) VALUES ('".$userID."', NULL, '".date("Y-m-d H:i:s", time() + 86400)."', '0', '0', '1')");

// Insert to followu up queues - 72 hours after (259200 second)
$result = $mysqli->query( "INSERT INTO `prod_users`.`survey_followup_queues` (`userID`, `queueID`, `queueDate`, `completed`, `attempted`, `queueType`) VALUES ('".$userID."', NULL, '".date("Y-m-d H:i:s", time() + 259200)."', '0', '0', '3')");

// Insert to followu up queues - 168 hours after (604800 second)
$result = $mysqli->query( "INSERT INTO `prod_users`.`survey_followup_queues` (`userID`, `queueID`, `queueDate`, `completed`, `attempted`, `queueType`) VALUES ('".$userID."', NULL, '".date("Y-m-d H:i:s", time() + 604800)."', '0', '0', '7')");


// -------- Checkout Survey --------
// Insert to followu up queues - 60sec after (60 second)
$result = $mysqli->query( "INSERT INTO `prod_users`.`survey_checkout_queues` (`userID`, `queueID`, `queueDate`, `completed`, `attempted`) VALUES ('".$userID."', NULL, '".date("Y-m-d H:i:s", time() + 60)."', '0', '0')");
