<?php
require '../Control/db.php';

$username = $_POST['username'];
$password = $_POST['password'];
$retype_password = $_POST['retype-password'];
$email = $_POST['email'];

if (strlen($password) < 8) {
    header('Location: register.html?error=must be more than 8 characters');
    exit;
}

if ($password != $retype_password) {
    header('Location: register.html?error=Passwords do not match.');
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// query to insert user into database
$sql = "INSERT INTO users (name, familyname, email, password) VALUES ('$name', '$familyname', '$email', '$hashedPassword')";

if (mysqli_query($con, $sql)) {
    header('Location: login.html');
    exit;
} else {
    header('Location: register.html?error=Error registering user.');
    exit;
}
