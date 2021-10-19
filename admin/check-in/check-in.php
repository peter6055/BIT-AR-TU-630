<!DOCTYPE html>
<html lang="en" class="h-100">
<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
require_once "../../includes/staff/authorise.php";
?>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='check-in.css'>
    <script src='check-in.js'></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="d-flex h-100 text-center text-white bg-primary">
<div class="cover-container d-flex p-3 mx-auto flex-column w-100 h-100">
    <div class="px-3" id="enterPhone">
        <h1>Enter phone number to Check-In</h1>
        <form onkeydown="return event.key != 'Enter';">
            <input class="form-control form-control-lg" type="text" placeholder="Appointment phone number (+614XXXXXXXX)"
                   aria-label=".form-control-lg example" id="phoneNumber">
            <button type="button" class="btn btn-light" onclick="checkIn()" id="checkIn111" style="margin-top: 20px;">
                Check in
            </button>
        </form>

    </div>
    <div class="position-absolute top-50 start-50 translate-middle" id="ShowInformation"
         style="display: none;">
        <h1>Appointment Information</h1></br>
        <div id="list">
            <div class="list-group">
                <div class="list-group-item d-flex text-start">Given name:&nbsp;
                    <div id="gName" class="item"></div>
                </div>
                <div class="list-group-item d-flex text-start">Sur name:&nbsp;
                    <div id="sName" class="item"></div>
                </div>
                <div class="list-group-item d-flex text-start">Gender:&nbsp;
                    <div id="gender" class="item"></div>
                </div>
                <div class="list-group-item d-flex text-start">DOB:&nbsp;
                    <div id="dob" class="item"></div>
                </div>
                <div class="list-group-item d-flex text-start">Email:&nbsp;
                    <div id="email" class="item"></div>
                </div>
                <div class="list-group-item d-flex text-start">Address:&nbsp;
                    <div id="address" class="item"></div>
                </div>
                <div class="list-group-item d-flex text-start">ID:
                    <div id="ID" class="item"></div>
                </div>
                <div class="list-group-item d-flex text-start">Today is&nbsp;
                    <div id="NUM" class="item"></div> &nbsp;dose vaccination
                </div>
                <div class="list-group-item d-flex text-start">Place:&nbsp;
                    <div id="Place" class="item"></div>
                </div>
                <div class="list-group-item d-flex text-start">Date:&nbsp;
                    <div id="Date" class="item"></div>
                </div>
                <div class="list-group-item d-flex text-start">Time:&nbsp;
                    <div id="Time" class="item"></div>
                </div>
            </div>
        </div>
        <form>
            <button type="button" class="btn btn-light" onclick="goBack()" style="margin-top: 20px;">Cancel</button>
            <input type="submit" id="submitChecKIn" class="btn btn-light" value="Complete Vaccination"
                   style="margin-top: 20px;"
                   onclick="if(!this.form.checkbox.checked){alert('You must agree to the terms first.');return false;} goBack();"/>
        </form>
    </div>
</div>
<!--<script>-->
<!--    $("#checkIn111").click(function () {-->
<!---->
<!--    });-->
<!--</script>-->
<script>
    $("#submitChecKIn").click(function () {
        var phoneNum = $('#phoneNumber').val().trim();
        $.ajax({
            url: 'https://covid-vaccine.tech/libraries/check_in/completeVaccination.php',
            data: {
                phoneNumber: phoneNum
            },
            success: alert("submit successfully")
        });
    });
</script>
</body>

</html>