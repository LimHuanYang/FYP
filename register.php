<?php
// Include the conn.php file for database connection
include("conn.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    // Validate inputs (you may want to add more validation)
    if (empty($username) || empty($password) || empty($email) || empty($date) || empty($gender) || empty($height) || empty($weight)) {
        echo json_encode(array("status" => "error", "message" => "All fields are required."));
    } else {
        // Hash the password (use a stronger hashing algorithm in production)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL query to insert the user into the database
        $query = "INSERT INTO users (username, password, email, date, gender, height, weight) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssss", $username, $hashedPassword, $email, $date, $gender, $height, $weight);

        if ($stmt->execute()) {
            echo json_encode(array("status" => "success", "message" => "Registration successful!"));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error during registration: " . $stmt->error));
        }

        // Close the prepared statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
}
?>
