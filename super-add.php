<?php
// Include the database connection
include("main_connection.php");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $name = $conn->real_escape_string($_POST['name']);
    $username = $conn->real_escape_string($_POST['s-username']);
    $password = $_POST['s-password']; // Get the password from form

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    // Insert the data into the database
    $sql = "INSERT INTO credit (name, username, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $username, $hashedPassword); // Use the hashed password

    // Execute the query
    if ($stmt->execute()) {
        echo '<section style="display:flex; justify-content:center; align-items:center; position:relative; top:33%;">
        <video autoplay muted>
            <source src="animation/travel2.webm" type="video/webm">
        </video></section>';
header("refresh:2;url=super.php"); // Redirect after 2 seconds
exit;
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
