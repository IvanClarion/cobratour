<?php
// Database connection
include("main_connection.php");

// Check for a successful connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted to remove a map
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['RemoveMap'])) {
    $id = intval($_POST['id']); // Get the ID from the hidden input

    // Prepare and execute the delete statement
    // Prepare and execute the delete statement for main_content
$stmt = $conn->prepare("DELETE FROM main_content WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        // Display video and redirect
        echo '<section style="display:flex; justify-content:center; align-items:center; position:relative; top:33%;">';
        echo '<video autoplay muted>';
        echo '<source src="animation/travel2.webm" type="video/webm">';
        echo '</video>';
        echo '</section>';

        // Redirect after 1 second
        header("refresh:1;url=home.php");
        exit;
    } else {
        echo "No record found with ID: " . $id; // No rows affected
    }
} else {
    echo "Error deleting record: " . $stmt->error; // Error message
}


    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
