<?php

$host = "localhost:3308"; // Replace with your database host
$username = "root"; // Replace with your database username
$password = "root"; // Replace with your database password
$database = "nutribalance"; // Replace with your database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
