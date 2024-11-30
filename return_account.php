<?php
// fetch_credentials.php

// Database connection
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "login_system";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch account credentials
$query = "SELECT Username, Password FROM credit WHERE id = 1"; // Adjust the WHERE clause as needed
$result = $conn->query($query);

// Prepare response array
$response = array();
if ($result->num_rows > 0) {
    // Fetch the result row
    $row = $result->fetch_assoc();
    $response['username'] = $row['Username'];
    $response['password'] = $row['Password'];
} else {
    $response['error'] = "No results found.";
}

// Close the connection
$conn->close();

// Return response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
