<?php

ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$data = json_decode(file_get_contents('php://input'), true);
//print_r($data);


// This system is use to insert follow up cron job queues into database.
// Call this function once vaccine completed

// @param string $userID: User's ID that need to be register to followup queues.
if(isset($data["userid"])){
    $userID = $data["userid"];

    // Connect to mysql database and change this entry expiry date
    $mysqli = new mysqli( "localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "prod_users" );

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
    // Insert to followu up queues - 168 hours after (604800 second)
    $result = $mysqli->query( "INSERT INTO `prod_users`.`survey_checkout_queues` (`userID`, `queueID`, `queueDate`, `completed`, `attempted`) VALUES ('".$userID."', NULL, '".date("Y-m-d H:i:s", time() + 1800)."', '0', '0')");

    echo "Successful";
} else {

    echo "Error, no user id. Please note: the UserID attributes is the userid in the database. Not Firebase UID. Pass in firebase UID will cause error.";
}
