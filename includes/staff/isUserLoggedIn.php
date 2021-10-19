<?php

// Check is there any session exist
function currentSession() {
    return isset($_SESSION[USER_SESSION_KEY]);
}