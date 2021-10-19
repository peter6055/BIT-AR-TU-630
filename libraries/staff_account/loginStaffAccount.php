<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

// response code
// 1: not enter require fields
// 2: correct credential
// 3: incorrect credential


require_once "../../includes/staff/user.php";

if (!isset($_GET['empid']) || !isset($_GET['pswd']) ){
    echo 1;
    exit();
}

$empid = $_GET['empid'];
$pswd = $_GET['pswd'];

if (empty($pswd) || empty($pswd)){
    echo 1;
    exit();
}


// Initial connection
$mysqli = new mysqli("localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "prod_staff");

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}


// Query
$data = $mysqli->query("SELECT * FROM accounts WHERE EMPID='" . $empid . "'");


// decode data
while ($data_fetched = $data->fetch_assoc()) {

    // if there are no error, continue login process
    if ($empid == $data_fetched['EMPID'] && $pswd == $data_fetched['password']) {
        $_SESSION[USER_SESSION_KEY] = $data_fetched;
        echo 2;
        exit();
    }

}



$errors['warning'] = 'Email and password is not match our record. Please try again.';
echo 3;
exit();