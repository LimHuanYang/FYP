<?php
// Include the conn.php file for database connection
include("conn.php");

// Get the username and password from the AJAX request
$email = $_POST['email'];
$password = $_POST['password'];

// Avoid SQL injection by using prepared statements
$query = "SELECT email,password FROM user WHERE email ='$email'AND password='$password'";
$result = mysqli_query($conn,$query);

$response = array();

if ($result->num_rows > 0) {
    $response['status'] = 'success';
  } else {
    $response['status'] = 'error';
    $response['message'] = "Wrong Password or Email. ".$conn->error;
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
