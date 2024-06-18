<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "Progress_db";

// Create connection
$con = new mysqli($servername, $username, $password, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>