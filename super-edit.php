<?php
// Start the session at the top of the script to use $_SESSION variables
session_start();

// Include the database connection
include("main_connection.php");

// Initialize error variable
$error = '';

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the input values from the form
    $new_name = $conn->real_escape_string($_POST['s-newname']);
    $new_username = $conn->real_escape_string($_POST['s-newusername']);
    $new_password = $_POST['s-newpassword']; // Don't sanitize passwords this way

    // Retrieve the user ID to be updated from the form
    $id = isset($_POST['id']) ? $conn->real_escape_string($_POST['id']) : null;

    if ($id) { // Check if id is not null
        // Start building the SQL query
        $sql = "UPDATE credit SET name = ?, username = ?";

        // If a new password is provided, hash it and add it to the query
        if (!empty($new_password)) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT); // Hash the new password
            $sql .= ", password = ?"; // Add password to the SQL query
        }

        $sql .= " WHERE id = ?"; // Complete the SQL query

        // Prepare and bind the statement
        $stmt = $conn->prepare($sql);

        // Determine the binding parameters based on whether a new password is provided
        if (!empty($new_password)) {
            $stmt->bind_param("sssi", $new_name, $new_username, $hashed_password, $id); // Include hashed password
        } else {
            $stmt->bind_param("ssi", $new_name, $new_username, $id); // Exclude password
        }

        // Execute the query
        if ($stmt->execute()) {
            echo '<section style="display:flex; justify-content:center; align-items:center; position:relative; top:33%;">
            <video autoplay muted>
                <source src="animation/travel2.webm" type="video/webm">
            </video></section>';
    header("refresh:2;url=super.php"); // Redirect after 2 seconds
    exit;
        } else {
            echo "Error updating account: " . $conn->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Handle the case where id is not provided in the form
        echo "Error: User ID is not provided for updating.";
    }
}

// Close the connection
$conn->close();
?>
