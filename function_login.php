<?php
require_once('user.php');
ini_set( "display_errors", 1 );
error_reporting( E_ALL );


$data2 = json_decode(file_get_contents('php://input'), true);


$mysqli = new mysqli( "localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "prod_users" );

$check_query = $mysqli->query( " SELECT * FROM `accounts` WHERE `phoneNumber` = '" .$data2["Phonenumber"]. "'");
$result=$check_query->fetch_assoc();
if($result["phoneNumber"]==$data2["Phonenumber"]){
	$_SESSION[USER_SESSION_KEY]=$result;
	
	echo "The mobile number is correct! Welcome to login!";
	
	
	
	
	}else{
	

	echo "Sorry, you need to register an account first!";}