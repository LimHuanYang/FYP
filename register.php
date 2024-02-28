<?php
include("conn.php");
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$date = $_POST['date'];
$gender = $_POST['gender'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$query = "SELECT email,password FROM user WHERE email ='$email'";
$insertsql = "INSERT INTO user (username, password, email, dob, gender, height, weight) VALUES ('$username', '$password', '$email','$date','$gender', $height, $weight)";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        echo json_encode(array("status" => "exist", "message" => "Account already exist"));
    } else {
        if ($conn->query($insertsql) === TRUE) {
            echo json_encode(array("status" => "success", "message" => "Registration successful!"));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error during registration: " . $conn->error));
        }
    }
    
    
    $conn->close();
}
?>