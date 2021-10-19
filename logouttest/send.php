<?php 
    ini_set( "display_errors", 1 );
    error_reporting( E_ALL );
    $address=$_POST['address'];
    $time=$_POST['time'];
    $date=$_POST['date'];
    $userid=$_POST['userid'];




        $mysqli = new mysqli( "localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "prod_users" );
        
   
    
        
        
        
       $mysqli->query("INSERT INTO `appointments`(`userID`, `placeAddress`, `date`, `time`) VALUES ('$userid','$address','$date','$time')");
            
       

    ?>