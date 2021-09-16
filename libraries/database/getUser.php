<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

// Get user count
function getUserCount(){
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

    return $userCount['sum'];

}





// Get user
// @parse int $startRow: represent the start data inquiries, start from one (1)
// @parse int $endRow: represent the end data inquiries only
function getUserDetail($startRow, $endRow){
    // Initial connection
    $mysqli = new mysqli( "localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "prod_users" );

    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' .$mysqli->connect_error);
    }

    // Query
    $result = $mysqli->query('SELECT * FROM accounts LIMIT ' .($startRow-1). ', ' .($endRow-($startRow-1))) or die($mysqli->error);


    // ------ Debug display -------
//    echo "<table border='1'>";
//    echo "<tr> <th>userID</th> <th>givenName</th> <th>surName</th> <th>gender</th> <th>DOB</th> <th>email</th> <th>idNum</th> <th>firstDoseCompleted</th> <th>secondDoseCompleted</th> <th>userTokenFirebase</th></tr>";
//
//    while($row = $result->fetch_assoc()) {
//        // Print out the contents of each row into a table
//        echo "<tr><td>";
//        echo $row['userID'];
//        echo "</td><td>";
//        echo $row['givenName'];
//        echo "</td><td>";
//        echo $row['surName'];
//        echo "</td><td>";
//        echo $row['gender'];
//        echo "</td><td>";
//        echo $row['DOB'];
//        echo "</td><td>";
//        echo $row['email'];
//        echo "</td><td>";
//        echo $row['idNum'];
//        echo "</td><td>";
//        echo $row['firstDoseCompleted'];
//        echo "</td><td>";
//        echo $row['secondDoseCompleted'];
//        echo "</td><td>";
//        echo $row['userTokenFirebase'];
//        echo "</td></tr>";
//    }
    // ------ Debug display -------


    // Decompose result from array
    $user = $result->fetch_assoc();
    return $user;
}
