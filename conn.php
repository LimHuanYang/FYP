<?php
$host = "localhost:3308"; 
$username = "root"; 
$password = "root"; 
$database = "nutribalance"; 
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
