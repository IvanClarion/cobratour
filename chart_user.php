<?php
include("main_connection.php");

// Check if connection exists
if (!isset($conn)) {
    die("Database connection not found.");
}

// SQL query to fetch data
$sql = "SELECT classification, COUNT(*) as count FROM survey GROUP BY classification";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Fetch each row as an associative array and store it in $data
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Return the data as JSON
echo json_encode($data);

$conn->close();
?>
