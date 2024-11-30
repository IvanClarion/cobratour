<?php
include("main_connection.php"); // Include your database connection file

// Check if the form is submitted via POST and the Delete button was clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['DeletFile'])) {
    
    // Disable foreign key checks
    $conn->query("SET FOREIGN_KEY_CHECKS=0;");
    
    // SQL queries to truncate the tables
    $sql1 = "TRUNCATE TABLE floor_map"; // Truncate the child table first
    $sql2 = "TRUNCATE TABLE main_content"; // Then truncate the parent table

    // Execute the first query for floor_map
    if ($conn->query($sql1) === TRUE) {
    } else {
        echo "Error truncating floor_map table: " . $conn->error . "<br>";
    }
    
    // Execute the second query for main_content
    if ($conn->query($sql2) === TRUE) {
        
        // Redirect or show success message
        echo '<section style="display:flex; justify-content:center; align-items:center; position:relative; top:33%;">
                <video autoplay muted>
                    <source src="animation/travel2.webm" type="video/webm">
                </video></section>';
        header("refresh:2;url=home.php"); // Redirect after 2 seconds
        exit;
    } else {
        echo "Error truncating main_content table: " . $conn->error . "<br>";
    }

    // Re-enable foreign key checks
    $conn->query("SET FOREIGN_KEY_CHECKS=1;");
}

// Close the database connection
$conn->close();
?>
