<?php
include_once('Admin.php');
use admin\Admin;

function test_input($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$admin = new Admin();
    $connection = $admin->getConnection();
	$username = test_input($_POST["username"]);
	$password = test_input($_POST["password"]);
	$stmt = $connection->prepare("SELECT * FROM adminlogin");
	$stmt->execute();
	$users = $stmt->fetchAll();
	
	foreach($users as $user) {
		
		if(($user['username'] == $username) && 
			($user['password'] == $password)) {
				header("location: index.php");
		}
		else {
			echo "<script language='javascript'>";
			echo "alert('wrong name/password');";
            echo "window.location.href = 'login.php';";
			echo "</script>";
			die();
		}
	}
}

?>
