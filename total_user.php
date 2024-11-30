<?php
// Start the session
include("main_connection.php");

// Check if connection exists
if (!isset($conn)) {
    die("Database connection not found.");
}

// SQL query to fetch the latest (highest) ID
$latest_id_sql = "SELECT id FROM survey ORDER BY id DESC LIMIT 1";
$latest_id_result = $conn->query($latest_id_sql);

// Check if query was successful and if there's a result
if ($latest_id_result && $latest_id_result->num_rows > 0) {
    $latest_id_row = $latest_id_result->fetch_assoc();
    $latest_id = $latest_id_row['id'];
} else {
    // If no results or query fails, set a fallback message
    $latest_id = "No locations Added";
}

?>