<?php

require_once('user.php');
require_once('isUserLoggedIn.php');

// if there are no exit session, redirect back to login page
if(!currentSession()) {
    header('Location: https://covid-vaccine.tech/admin/');

}
