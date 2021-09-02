<?php

// Connect to mysql database and change this entry expiry date
$mysqli = new mysqli( "localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "prod_users" );

  $result = $mysqli->query( "DELETE FROM `prod_users`.`accounts` WHERE `accounts`.`userID` = 999999999 )" );

  $result = $mysqli->query( "DELETE FROM `prod_users`.`accounts` WHERE `accounts`.`userID` = 999999998 )" );

  $result = $mysqli->query( "DELETE FROM `prod_users`.`accounts` WHERE `accounts`.`userID` = 999999997 )" );
	
  $result = $mysqli->query( "DELETE FROM `prod_users`.`accounts` WHERE `accounts`.`userID` = 999999996 )" );
	
  $result = $mysqli->query( "DELETE FROM `prod_users`.`accounts` WHERE `accounts`.`userID` = 999999995 )" );
	
  $result = $mysqli->query( "DELETE FROM `prod_users`.`accounts` WHERE `accounts`.`userID` = 999999994 )" );
	
  $result = $mysqli->query( "DELETE FROM `prod_users`.`accounts` WHERE `accounts`.`userID` = 999999993 )" );
