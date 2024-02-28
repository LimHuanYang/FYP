<?php
include("conn.php");
$UID = $_POST['UID'];
$fdcId = $_POST['fdcId'];
$servings = $_POST['servings'];
$portionsize = $_POST['portionsize'];
$meal_type = $_POST['meal_type'];
$date = $_POST['date'];
$query = "INSERT INTO meal (UID, fdcId, servings_value, portion_unit, meal_type, date) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
if ($stmt) {
    
    $stmt->bind_param("iiddis", $UID, $fdcId, $servings, $portionsize, $meal_type, $date);
    
    if ($stmt->execute()) {
        $response = array('status' => 'success', 'message' => 'Food entry added successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Error adding food entry: ' . $stmt->error);
    }
    
    $stmt->close();
} else {
    $response = array('status' => 'error', 'message' => 'Error preparing statement: ' . $conn->error);
}
$conn->close();
header('Content-Type: application/json');
echo json_encode($response);
?>