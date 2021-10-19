<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Staff Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">

    <!-- Insert in all the page-->
    <?php require_once "../includes/resources.php"; ?>


</head>

<body class="text-center" data-new-gr-c-s-check-loaded="14.1029.0" data-gr-ext-installed="">
<form class="form-signin" onsubmit="return false">
    <div id="login-content">
        <img class="mb-4" src="images/login.svg"  height="300px">
        <h1 class="h3 mb-3 font-weight-normal">Sign in to Covid Vaccine</h1>
        <input type="input" id="inputEmpID" class="form-control" placeholder="Employee ID" required="" autofocus="">
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
    </div>
    <button class="btn btn-warning" type="submit" onclick="login()">Sign in</button>
</form>

<script>
    function login() {
        var empid = $('#inputEmpID').val().trim();
        var pswd = $('#inputPassword').val();

        $('#warning').remove();

        // save the data to database
        $.ajax({
            url: 'https://covid-vaccine.tech/libraries/staff_account/loginStaffAccount.php',
            data: {
                empid: empid,
                pswd: pswd
            },

            // ---------------- if successful insert to the page -------------------
            success: function (response) {
                if (response == 1) {
                    $('#login-content').append('<div div class="alert alert-warning" id="warning" role="alert">Please enter your employee ID and password.</div>');

                } else if (response == 2){
                    window.location.replace("https://covid-vaccine.tech/admin/portal.php");

                } else if (response == 3) {
                    $('#login-content').append('<div div class="alert alert-warning" id="warning"  role="alert">Employee ID or password is not match our record. Please try again.</div>');

                } else {
                    $('#login-content').append('<div div class="alert alert-warning" id="warning"  role="alert">System Error! Please try again</div>');
                }

            },
            error: function (request, error) {
                $('#login-content').append('<div div class="alert alert-warning" id="warning"  role="alert">System Error! Please try again</div>');

            }
        });
    }
</script>
</body>