<?php

ini_set( "display_errors", 1 );
error_reporting( E_ALL );

// Connect to mysql database and change this entry expiry date
$mysqli = new mysqli( "localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "sandbox" );

// Check connection
if ( $mysqli->connect_error ) {
  die( "Connection failed: " . $mysqli->connect_error );
}

$date = date( "Y-m-d H:i:s", time() );

$result = $mysqli->query( "INSERT INTO `sandbox`.`test_cron_job` (`id`, `today`) VALUES (NULL, '" . $date . "');" );

echo ("ver1.1");

//INSERT INTO `sandbox`.`test_cron_job` (`id`, `today`) VALUES (NULL, '2021-09-02 00:00:00');