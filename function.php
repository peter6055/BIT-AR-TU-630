<?php


$data = json_decode(file_get_contents('php://input'), true);


$mysqli = new mysqli( "localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "prod_users" );

$check_query = $mysqli->query( " SELECT * FROM `accounts` WHERE `phoneNumber` = '" .$data["Phonenumber"]. "'");
$result=$check_query->fetch_assoc();
if($result["userTokenFirebase"]==$data["userid"]){
	echo "You have already completed your registration, please login directly!";
	}else{
	$mysqli->query( " INSERT INTO `prod_users`.`accounts` (`givenName`,`surName`,`gender`,`DOB`,`email`,`idNum`,`phoneNumber`,`address`,`userTokenFirebase`) VALUES 
		('" .$data["givenname"]. "','" .$data["Surname"]. "','" .$data["Gender"]. "','" .$data["Birthday"]. "','" .$data["email"]. "','" .$data["ID"]. "','" .$data["Phonenumber"]. "','" .$data["location"]. "','" .$data["userid"]. "') ");

	echo "Registration complete!";}
