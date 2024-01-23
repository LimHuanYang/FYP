<?php

$host = "localhost"; // Replace with your database host
$username = "root"; // Replace with your database username
$password = "root"; // Replace with your database password
$database = "nutribalance"; // Replace with your database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally, you can set the character set if needed
$conn->set_charset("utf8");

?>
