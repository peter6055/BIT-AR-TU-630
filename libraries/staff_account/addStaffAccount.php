<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

// response code
// 1: not enter require fields
// 2: user exist in the system (based on emp id check)
// 3: successful


if (!isset($_GET['empid']) || !isset($_GET['pswd']) || !isset($_GET['surName']) || !isset($_GET['givenName']) || !isset($_GET['dob']) || !isset($_GET['phoneNumber'])){
    echo 1;
    exit();
}

$givenName = $_GET['givenName'];
$surName = $_GET['surName'];
$dob = $_GET['dob'];
$empid = $_GET['empid'];
$phoneNumber = $_GET['phoneNumber'];
$pswd = $_GET['pswd'];

// Initial connection
$mysqli = new mysqli("localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "prod_staff");

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Check is user exist via empid
// Query
$data = $mysqli->query("SELECT count(*) as count FROM accounts WHERE EMPID='" . $empid . "'");
$data_fetched = $data->fetch_assoc();

if($data_fetched['count'] > 0){
    echo "2";
} else {
    $mysqli->query("INSERT INTO `prod_staff`.`accounts` (`userID`, `givenName`, `surName`, `DOB`, `EMPID`, `phoneNumber`, `password`) VALUES (NULL, '" .$givenName. "', '" .$surName. "', '" .$dob. "', '" .$empid. "', '" .$phoneNumber. "', '" .$pswd. "')");
    echo "3";
}


