<?php
// Get user
// @parse int $startRow: represent the start data inquiries, start from one (1)
// @parse int $endRow: represent the end data inquiries only

ini_set("display_errors", 1);
error_reporting(E_ALL);

$data = json_decode(file_get_contents('php://input'), true);
//print_r($data);

if($data["startRow"] < 1 || $data["endRow"] < 1) {
    echo "Index error, two parse in need to be larger than 0.";
    return false;

} else if ($data["startRow"] >  $data["endRow"]){
    echo "Index error, startRow cannot larger than endRow.";
    return false;
}


if (isset($data["startRow"]) && isset($data["endRow"])) {

    $startRow = $data["startRow"];
    $endRow = $data["endRow"];

    // Connect to mysql database
    $mysqli = new mysqli("localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "prod_users");

    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // Query
    $result = $mysqli->query('SELECT * FROM accounts LIMIT ' . ($startRow - 1) . ', ' . ($endRow - ($startRow - 1))) or die($mysqli->error);
//    $result = $mysqli->query('SELECT * FROM accounts LIMIT 2,4') or die($mysqli->error);


    // ------ Debug display -------
//        echo "<table border='1'>";
//        echo "<tr> <th>userID</th> <th>givenName</th> <th>surName</th> <th>gender</th> <th>DOB</th> <th>email</th> <th>idNum</th> <th>firstDoseCompleted</th> <th>secondDoseCompleted</th> <th>userTokenFirebase</th></tr>";
//
//        while($row = $result->fetch_assoc()) {
//            // Print out the contents of each row into a table
//            echo "<tr><td>";
//            echo $row['userID'];
//            echo "</td><td>";
//            echo $row['givenName'];
//            echo "</td><td>";
//            echo $row['surName'];
//            echo "</td><td>";
//            echo $row['gender'];
//            echo "</td><td>";
//            echo $row['DOB'];
//            echo "</td><td>";
//            echo $row['email'];
//            echo "</td><td>";
//            echo $row['idNum'];
//            echo "</td><td>";
//            echo $row['firstDoseCompleted'];
//            echo "</td><td>";
//            echo $row['secondDoseCompleted'];
//            echo "</td><td>";
//            echo $row['userTokenFirebase'];
//            echo "</td></tr>";
//        }
    // ------ Debug display -------


    // format the array for sending 2 dimensional array
    $json = array();
    while ($row = $result->fetch_assoc()) {
        // return with json format
//        $json[][] = $row;

        // return with array format
        $json[] = array_values($row);
    }

    // encode it with json and send it back
    echo json_encode($json);

} else {
    echo "Error, missing attributes.";

}











