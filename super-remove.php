<?php
// Include your database connection file
include("main_connection.php");

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the ID from the form input
    $id = isset($_POST['id']) ? $conn->real_escape_string($_POST['id']) : null;

    if ($id) {
        // Prepare the SQL delete statement
        $sql = "DELETE FROM credit WHERE id = ?";
        // Prepare and bind the statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id); // Assuming ID is an integer

        // Execute the query
        if ($stmt->execute()) {
            echo '<section style="display:flex; justify-content:center; align-items:center; position:relative; top:33%;">
        <video autoplay muted>
            <source src="animation/travel2.webm" type="video/webm">
        </video></section>';
header("refresh:2;url=super.php"); // Redirect after 2 seconds
exit;
        } else {
            echo "Error deleting account: " . $conn->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: User ID is not provided.";
    }
}

// Close the database connection
$conn->close();
?>
