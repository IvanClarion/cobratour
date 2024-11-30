<?php
// Include your database connection file
include("main_connection.php");

// Check if the form is submitted via POST
$conn->query("SET GLOBAL max_allowed_packet=20971520"); // 20MB in bytes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Truncate the table
    $sql = "TRUNCATE TABLE map"; // Replace 'map' with your actual table name if different

    if ($conn->query($sql) === TRUE) {
        echo ' <section style="display:flex; justify-content:center; align-items:center; position:relative; top:33%;">
        <video autoplay muted>
                <source src="animation/travel2.webm" type="video/webm">
              </video></section>'
              ;
        header("refresh:2;url=map.php"); // Redirect after 2 seconds
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
