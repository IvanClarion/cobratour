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
    $stmt = $conn->prepare("DELETE FROM map WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo ' <section style="display:flex; justify-content:center; align-items:center; position:relative; top:33%;">
            <video autoplay muted>
                    <source src="animation/travel2.webm" type="video/webm">
                  </video></section>'
                  ;
            header("refresh:1;url=map.php"); // Redirect after 2 seconds
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
