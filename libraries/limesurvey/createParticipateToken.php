<?php

ini_set( "display_errors", 1 );
error_reporting( E_ALL );

// without composer this line can be used
// require_once 'path/to/your/rpcclient/jsonRPCClient.php';
// with composer support just add the autoloader
include_once 'vendor/autoload.php';

function createParticipateToken($participateEmaill, $participateLastName, $participateFirstName, $participateExpiry, $surveyID) {
  // -------- Initialize -------- 
  // Make connection
  define( 'LS_BASEURL', 'https://covid-vaccine.tech/app/followup/' );
  define( 'LS_USER', 'admin' );
  define( 'LS_PASSWORD', 'ykhlFEYiWpohQd' );

  // Specify survey
//  $surveyID = 595476;
  $language = 'en';

  // Instantiate a new client
  $myJSONRPCClient = new\ org\ jsonrpcphp\ JsonRPCClient( LS_BASEURL . 'index.php?r=admin/remotecontrol' );

  // Get a session key
  $sessionKey = $myJSONRPCClient->get_session_key( LS_USER, LS_PASSWORD );


  // Define the token params
  $tokenParams = array( "email" => $participateEmaill, "lastname" => $participateLastName, "firstname" => $participateFirstName, "language" => $language );
  $participantData = array( $tokenParams );
  $createToken = true;


  // Create the tokens
  $newToken = $myJSONRPCClient->add_participants( $sessionKey, $surveyID, $participantData, $createToken);


  // -------- Result -------- 
  // Get the full link
  $surveyURLToken = 'https://covid-vaccine.tech/app/followup/index.php?r=survey/index&sid='.$surveyID.'&token=' . $newToken[ 0 ][ 'token' ];

  $surveyToken = $newToken[ 0 ][ 'token' ];

  // Print returned results for testing
  echo '<hr><br><h1>Limesurvey</h1><br>New token created in survey ' . $surveyID . ':'
  . '<ul>'
  . '<li>TID - ' . $surveyToken . '</li>'
  . '<li>Token - ' . $surveyToken . '</li>'
  . '<li>URL - ' . $surveyURLToken . '</li>'
  . '</ul>';

	
  // Connect to mysql database and change this entry expiry date
  $mysqli = new mysqli( "localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "prod_survey" );
	
  // If there are any changes of participate table please update "lime_tokens_xxxxxxxx"
  $result = $mysqli->query( "UPDATE prod_survey.lime_tokens_".$surveyID." SET validuntil = '".$participateExpiry."' WHERE lime_tokens_".$surveyID.".token = '" . $surveyToken . "'" );

	
  // release the session key
  $myJSONRPCClient->release_session_key( $sessionKey );

  return $surveyURLToken;
}