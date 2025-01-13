<?php
include_once('Admin.php');
use admin\Admin;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin = new Admin();
    $connection = $admin->getConnection();
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

    $stmt = $connection->prepare("SELECT * FROM adminlogin WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['loggedin'] = true;
        header("location: index.php");
    } else {
        echo "<script language='javascript'>";
        echo "alert('Wrong username/password');";
        echo "window.location.href = 'login.php';";
        echo "</script>";
        die();
    }
}
?>
