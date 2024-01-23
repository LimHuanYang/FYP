<?php
// Include the conn.php file for database connection
include("conn.php");

// Get the username and password from the AJAX request
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = ? AND password = ?";
$stmt = $conn->prepare($query);

// Bind parameters
$stmt->bind_param("ss", $email, $password);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Login successful!";
} else {
    echo "Invalid username or password.";
}

// Close the prepared statement and the database connection
$stmt->close();
$conn->close();
?>