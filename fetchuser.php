<?php

include 'conn.php';

if (isset($_POST['UID'])) {
    $UID = $_POST['UID'];
    $userData = fetchDataFromDatabase($UID);

    header('Content-Type: application/json');
    echo json_encode($userData);
} else {
    echo json_encode(['error' => 'UID not provided']);
}

function fetchDataFromDatabase($UID)
{
    global $conn; // Assuming $conn is your database connection variable in conn.php
    $query = "SELECT * FROM user WHERE UID = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param('i', $UID);
    $statement->execute();
    $result = $statement->get_result();
    $userData = $result->fetch_assoc();

    return $userData;
}
?>