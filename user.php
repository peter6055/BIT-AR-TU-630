<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

// set a default session key
const USER_SESSION_KEY = 'user';

// start the session
session_start();
function isUserLoggedIn()
{
	return isset($_SESSION[USER_SESSION_KEY]);
}
function redirect($location)
{
    header("Location: $location");
    exit();
}