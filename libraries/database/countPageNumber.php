<?php

// Count how many page need to be present
// @parse int $rowPerPage: set how many row per page

$data = json_decode(file_get_contents('php://input'), true);
//print_r($data);


if (isset($data["rowPerPage"])) {

    $rowPerPage = $data["rowPerPage"];


    // Initial connection
    $mysqli = new mysqli( "localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "prod_users" );

    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' .$mysqli->connect_error);
    }

    // Query
    $result = $mysqli->query("SELECT count(*) AS sum FROM accounts");

    // Decompose result from array
    $userCount = $result->fetch_assoc();

    // ------ Debug display -------
    // echo "Total Counts: " .$userCount['sum'];
    // ------ Debug display -------

    $getUserCount = $userCount['sum'];



    echo ceil($getUserCount / $rowPerPage);

} else {

    echo "Error, missing attributes.";
}


