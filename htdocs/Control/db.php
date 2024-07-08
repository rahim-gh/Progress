<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "Progress";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select the database
$conn->select_db($database);

// Execute the SQL file
$sqlFile = __DIR__ . '/Progress.sql';
if (file_exists($sqlFile)) {
    $sqlLines = file($sqlFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($sqlLines as $line) {
        if (substr($line, 0, 2) != '--' && $line != '') {
            if ($conn->query($line) === FALSE) {
                echo "Error executing SQL: " . $line . " - " . $conn->error . "<br>";
            }
        }
    }

    echo "Database setup complete.<br>";
} else {
    echo "SQL file not found: " . $sqlFile . "<br>";
}

$conn->close();
?>
