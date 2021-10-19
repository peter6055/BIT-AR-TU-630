<?php 
    
    $address=$_POST['address'];
    $time=$_POST['time'];
    $date=$_POST['date'];
    $userid=$_POST['userid'];
    $addressname="";
    $mysqli = new mysqli( "localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "prod_users" );
    $check_query = $mysqli->query( " SELECT * FROM `appointments` WHERE `userID` = '$userid'");
    $result=$check_query->fetch_assoc();
    $goodtime=date('Y-m-d',strtotime("+30 day",strtotime($result["date"])));
    if ($address=="300 Grattan St, Parkville VIC 3050") {
        $addressname="Parkville";
    }elseif ($address=="41 Victoria Parade, Fitzroy VIC 3065") {
        $addressname="Fitzroy";
    }elseif($address=="135 David St, Dandenong VIC 3175"){
        $addressname="Dandenong";
    }elseif($address=="8 Arnold St, Box Hill VIC 3128"){
        $addressname="Box Hill";
     };
    


        
        
   
    
        
    
    if ($result["dose"]==1&&strtotime($date)>strtotime($goodtime)&&$result["status"]=='completed') {
        $mysqli->query("INSERT INTO `appointments`(`userID`,`placeName`,`placeAddress`, `date`, `time`, `dose`, `status`) VALUES ('$userid','$addressname','$address','$date','$time','2','booked')");
        echo "Congratulations on your successful second vaccination appointment!";
        }elseif($result["dose"]==1&&strtotime($date)<strtotime($goodtime)) {
            echo "The time between two vaccinations needs to be greater than or equal to 30 days!";
        }elseif ($result["dose"]==1&&strtotime($date)>strtotime($goodtime)&&$result["status"]=='booked') {
            echo "You need to complete your first vaccination first!";
        }
        elseif($result["dose"]==2){
            echo "You have completed your vaccination!";
        }else{
            $mysqli->query("INSERT INTO `appointments`(`userID`,`placeName`,`placeAddress`, `date`, `time`, `dose`, `status`) VALUES ('$userid','$addressname','$address','$date','$time','1','booked')");
            echo "Congratulations on your successful first vaccination appointment!";
            }
       

       
       

    ?>