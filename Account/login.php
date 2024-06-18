<?php

$servername = "localhost";
$username = "root";
$password = "hello";
$dbname = "Students";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

// database connection
require_once 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (strlen($password) < 8) {
    $error = "Password must be at least 8 characters long";
    header('Location: login.html?error=' . urlencode($error));
    exit;
}

// query to select user from database
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['loggedin'] = true;
    header('Location: index.php');
    exit;
} else {
    header('Location: login.html?error=No User Found.');
    exit;
}
?>