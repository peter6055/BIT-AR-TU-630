<?php

ini_set( "display_errors", 1 );
error_reporting( E_ALL );

include_once 'limesurvey/createParticipateToken.php';
include_once 'twilio/sendSMS.php';
include_once 'dynamiclinks/createLink.php';


// Setup db connection
$mysqli = new mysqli( "localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "prod_users" );

if ($mysqli->connect_error) { 
	die('Connect Error (' . $mysqli->connect_errno . ') ' .$mysqli->connect_error); 
}



// Select the today's queue and join with user's info
$result = $mysqli->query("SELECT * FROM survey_followup_queues
INNER JOIN accounts ON survey_followup_queues.userID = accounts.userID WHERE `queueDate` LIKE '%".date("Y-m-d")."%' AND `completed` = 0");

// ------ Debug displayer -------
//echo "<table border='1'>";
//echo "<tr> <th>userID</th> <th>queueID</th> <th>queueDate</th> <th>completed</th> <th>attempted</th> <th>queueType</th> <th>givenName</th> <th>surName</th> <th>phoneNumber</th></tr>";

// keeps getting the next row until there are no more to get
//while( $row = $result->fetch_assoc() ) {
//	// Print out the contents of each row into a table
//	echo "<tr><td>";
//	echo $row['userID'];
//	echo "</td><td>";
//	echo $row['queueID'];
//	echo "</td><td>";
//	echo $row['queueDate'];
//	echo "</td><td>";
//	echo $row['completed'];
//	echo "</td><td>";
//	echo $row['attempted'];
//	echo "</td><td>";
//	echo $row['queueType'];
//	echo "</td><td>";
//	echo $row['givenName'];
//	echo "</td><td>";
//	echo $row['surName'];
//	echo "</td><td>";
//	echo $row['phoneNumber'];
//	echo "</td></tr>";
//}
// ------ Debug displayer -------


// Calculate expiry date +48 hours
$participateExpiry = date("Y-m-d H:i:s", time() + 172800);

while( $row = $result->fetch_assoc() ) {
	$participateEmaill = $row['email'];
	$participateLastName = $row['surName'];
	$participateFirstName = $row['givenName'];
    $participatePhone = $row['phoneNumber'];
    $queueType = $row['queueType'];
	$queueID = $row['queueID'];
	$queueAttempted = intval($row['attempted']);

		
	// Create participate survey link with token
	// @param string $participateEmaill Participate's email address
	// @param string $participateLastName Participate's lastname
	// @param string $participateFirstName Participate's firstname
	// @param string $participateExpiry Survey expire date
	// @param string $surveyID The survey ID we are requesting

	$participateURL = createLink(createParticipateToken($participateEmaill, $participateLastName, $participateFirstName, $participateExpiry, "595476"));
	
	
	//Generate message
	$msg = "Hi ".$participateFirstName.", thank you for getting your COVID-19 vaccination.\r\n\r\nPlease complete the Victorian Department of Health COVID-19 vaccine ".$queueType." day(s) follow up survey. You can provide feedback on how you felt after receiving the vaccine.\r\n\r\n" .$participateURL. "\r\n\r\nPlease note, if you report a reaction and seek care or advice from a doctor, Aboriginal healthcare worker or hospital, you may be contacted by your doctor or Victorian Department of Health for more details.\r\n\r\nThis link will expire on " .$participateExpiry;
	
	
	// Send SMS
	// @param string $participateURL Unique link for participate from createParticipateToken()
	// @param string $participatePhone Participate's phone no. from DB polling.
	// @param string $participateExpiry Participate's survey expiry date
	// disable to ensure not wasting cedit while testing.
	$smsSuccess = sendSMS($msg, $participatePhone);
	
	if ($smsSuccess == true or $queueAttempted == 2) {
		$mysqli->query( "UPDATE prod_users.survey_followup_queues SET completed = '1' WHERE survey_followup_queues.queueID = '" .$queueID. "'" );
	} else {
		$queueAttempted += 1;
		$mysqli->query( "UPDATE prod_users.survey_followup_queues SET attempted = '".$queueAttempted."' WHERE survey_followup_queues.queueID = '" .$queueID. "'" );
	}

}
?>