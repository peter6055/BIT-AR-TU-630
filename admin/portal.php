<!-- Insert in all the page after login-->
<?php require_once "../includes/staff/authorise.php"; ?>

<!-- Sample of print out user detail -->
<?php
echo "<pre>Hello, ";
echo $_SESSION[USER_SESSION_KEY]['surName'];
echo "\n</pre>";

?>


<head>
    <!-- Insert in all the page-->
    <?php require_once "../includes/resources.php"; ?>
</head>

<body>
<!-- User system trigger-->
<!--<button onclick="window.location.replace('https://covid-vaccine.tech/admin/manage.html')">User System</button>-->

<!-- Check-in system trigger-->
<button onclick="window.location.replace('https://covid-vaccine.tech/admin/check-in/check-in.php')">Check-in</button>

<!-- Survey system trigger-->
<button onclick="window.location.replace('https://covid-vaccine.tech/app/followup/index.php?r=surveyAdministration/view&iSurveyID=781693')">Check-out Survey Editor</button>

<!-- Survey system trigger-->
<button onclick="window.location.replace('https://covid-vaccine.tech/app/followup/index.php?r=admin/statistics/sa/simpleStatistics/surveyid/781693')">Check-out Survey Statistic</button>

<!-- Survey system trigger-->
<button onclick="window.location.replace('https://covid-vaccine.tech/app/followup/index.php?r=surveyAdministration/rendersidemenulink/subaction/generalsettings/surveyid/595476')">Follow-up Survey Editor</button>

<!-- Survey system trigger-->
<button onclick="window.location.replace('https://covid-vaccine.tech/app/followup/index.php?r=admin/statistics/sa/simpleStatistics/surveyid/595476')">Follow-up Survey Statistic</button>



<!-- Logout trigger-->
<button onclick="logout()">Logout</button>

<!-- Logout code-->
<script>
    function logout() {
        // save the data to database
        $.ajax({
            url: 'https://covid-vaccine.tech/includes/staff/logUserOut.php',

            // ---------------- if successful insert to the page -------------------
            success: function (response) {
                alert("GOOD BYE")
                window.location.replace("https://covid-vaccine.tech/admin/");
            },
            error: function (request, error) {
                alert("System Error! Please try again");
            }
        });
    }
</script>
</body>

