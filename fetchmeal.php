<?php
include 'conn.php'; 
if (isset($_POST['UID']) && isset($_POST['date'])) {
    
    $UID = $_POST['UID'];
    $date = $_POST['date'];
    
    $mealEntries = fetchMealEntries($conn, $UID, $date);
    
    $mealData = array();
    
    foreach ($mealEntries as $entry) {
        
        $fdcId = $entry['fdcId'];
        
        $foodInfo = fetchFoodInfo($fdcId);
        $mealData[] = array_merge($entry, $foodInfo);
    }
    
    echo json_encode($mealData);
} else {
    
    echo json_encode(array('error' => 'Invalid parameters'));
}
function fetchMealEntries($conn, $UID, $date)
{
    $query = "SELECT * FROM meal WHERE UID ='$UID'AND date='$date'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        
        $data = array();
        
        while ($row = mysqli_fetch_assoc($result)) {
            
            $data[] = $row;
        }
        
        mysqli_free_result($result);
        
        
    } else {
        
        echo "Error: " . mysqli_error($conn);
    }
    return $data;
}
function fetchFoodInfo($fdcId)
{
    $apiEndpoint = "https://api.nal.usda.gov/fdc/v1/food/$fdcId?nutrients=203&nutrients=204&nutrients=205&nutrients=208&api_key=1dJRcH1R7YBVltK01zYDymKgMHWVAMhLb6A0JwHt";
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    
    $response = curl_exec($ch);
    
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
        return false; 
    }
    
    curl_close($ch);
    
    $foodInfo = json_decode($response, true);
    return $foodInfo;
}
?>