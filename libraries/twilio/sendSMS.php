<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

require_once 'vendor/autoload.php';
use Twilio\ Rest\ Client;

function sendSMS($msg, $participatePhone) {
  // A Twilio number you own with SMS capabilities
  $twilio_number = "+18647341386";


  $account_sid = "ACc15943a7f3d626865761818eadc1f15a";
  $auth_token = "0db7e7180c66137dd0c2341de63897a8";
	

  $client = new Client( $account_sid, $auth_token);
  
	
  try {
	  $client->messages->create(
		  // Where to send a text message (your cell phone?)
		  $participatePhone,
		  array(
			  'from' => $twilio_number,
			  'body' => $msg
		  )
	  );
	  return true;
	  
  } catch (TypeError $e) {
	  return false;
	  
  }
}
