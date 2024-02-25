<?php

include("conn.php");

$UID = $_POST['UID'];
$fdcId = $_POST['fdcId'];
$servings = $_POST['servings'];
$portionsize = $_POST['portionsize'];
$meal_type = $_POST['meal_type'];
$date = $_POST['date'];


// Avoid SQL injection by using prepared statements
$query = "INSERT INTO meal (UID, fdcId, servings_value, portion_unit, meal_type, date) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);

if ($stmt) {
    // Bind parameters to the prepared statement
    $stmt->bind_param("iiddis", $UID, $fdcId, $servings, $portionsize, $meal_type, $date);

    // Execute the statement
    if ($stmt->execute()) {
        $response = array('status' => 'success', 'message' => 'Food entry added successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Error adding food entry: ' . $stmt->error);
    }

    // Close the statement
    $stmt->close();
} else {
    $response = array('status' => 'error', 'message' => 'Error preparing statement: ' . $conn->error);
}

// Close the database connection
$conn->close();

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>