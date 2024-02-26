<?php
// Include your database connection file here
include 'conn.php'; // Replace with your actual database connection file

// Check if the UID and date are set in the POST request
if (isset($_POST['UID']) && isset($_POST['date'])) {
    // Get UID and date from the POST request
    $UID = $_POST['UID'];
    $date = $_POST['date'];

    // Fetch meal entries from the database for the given date
    $mealEntries = fetchMealEntries($conn, $UID, $date);

    // // Initialize an array to store the final meal data
    $mealData = array();

    //Iterate through each meal entry
    foreach ($mealEntries as $entry) {
        // Get FDCID from the meal entry
        $fdcId = $entry['fdcId'];

        // Fetch food information from the external API using FDCID
        $foodInfo = fetchFoodInfo($fdcId);

        $mealData[] = array_merge($entry, $foodInfo);
    }

    // Convert the data to JSON and send it to the frontend
    echo json_encode($mealData);
} else {
    // If UID or date is not set, return an error response
    echo json_encode(array('error' => 'Invalid parameters'));
}

// Function to fetch meal entries from the database
function fetchMealEntries($conn, $UID, $date)
{
    $query = "SELECT * FROM meal WHERE UID ='$UID'AND date='$date'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        // Initialize an empty array to store the results
        $data = array();

        // Fetch each row as an associative array
        while ($row = mysqli_fetch_assoc($result)) {
            // Add the row to the array
            $data[] = $row;
        }

        // Free the result set
        mysqli_free_result($result);

        // Now, $data is an array containing the fetched rows
        
    } else {
        // Handle the case where the query was not successful
        echo "Error: " . mysqli_error($conn);
    }

    return $data;
}

// Function to fetch food information from the external API using FDCID
function fetchFoodInfo($fdcId)
{
    $apiEndpoint = "https://api.nal.usda.gov/fdc/v1/food/$fdcId?nutrients=203&nutrients=204&nutrients=205&nutrients=208&api_key=1dJRcH1R7YBVltK01zYDymKgMHWVAMhLb6A0JwHt";

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // You may want to set this to true in production

    // Execute cURL session and fetch response
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
        return false; // Return false to indicate an error
    }

    // Close cURL session
    curl_close($ch);

    // Decode the JSON response
    $foodInfo = json_decode($response, true);

    return $foodInfo;
}
?>