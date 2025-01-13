<?php
session_start();

define('SESSION_EXPIRATION_TIME', 60); //in seconds

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time'] > SESSION_EXPIRATION_TIME)) {
    // If the session has expired, destroy it and redirect to the login page
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
} else {
    // Update the login time to extend the session expiration time
    $_SESSION['login_time'] = time();
}
?>
