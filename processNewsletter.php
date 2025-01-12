<?php
include_once "classes/Newsletter.php";
use classes\Newsletter;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    ob_start();
    $newsletter = new Newsletter($email);
    $output = ob_get_clean();
    echo "<script type='text/javascript'> alert('$output'); window.location.href = 'index.php'; // Redirect to main page </script>";
}
