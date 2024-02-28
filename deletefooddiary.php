<?php
include("conn.php");
if (isset($_POST['meal_id'])) {
    $mealId = $_POST['meal_id'];
    
    $stmt = $conn->prepare("DELETE FROM meal WHERE meal_id = ?");
    $stmt->bind_param("i", $mealId);
    
    if ($stmt->execute()) {
        $response = array('status' => 'success', 'message' => 'Entry deleted successfully');
    } else {
        $response = array('status' => 'error', 'message' => 'Error deleting entry');
    }
    
    $stmt->close();
} else {
    $response = array('status' => 'error', 'message' => 'meal_id not provided');
}
header('Content-Type: application/json');
echo json_encode($response);
?>