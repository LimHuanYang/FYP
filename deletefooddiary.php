<?php
include("conn.php");
if (isset($_POST['meal_id'])) {
    $mealId = $_POST['meal_id'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM meal WHERE meal_id = ?");
    $stmt->bind_param("i", $mealId);

    // Execute the statement
    if ($stmt->execute()) {
        $response = array('status' => 'success', 'message' => 'Entry deleted successfully');
    } else {
        $response = array('status' => 'error', 'message' => 'Error deleting entry');
    }

    // Close the statement
    $stmt->close();
} else {
    $response = array('status' => 'error', 'message' => 'meal_id not provided');
}

// Return a JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>