<?php

$servername = "localhost";
$username = "root";
$password = "hello";
$dbname = "Students";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];
$retype_password = $_POST['retype-password'];
$email = $_POST['email'];

if ($password != $retype_password) {
    header('Location: register.html?error=Passwords do not match.');
    exit;
}

if (strlen($password) < 8) {
    header('Location: register.html?error=must be more than 8 characters');
    exit;
}

// query to insert user into database
$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

if (mysqli_query($con, $sql)) {
    header('Location: login.html');
    exit;
} else {
    header('Location: register.html?error=Error registering user.');
    exit;
}
?>