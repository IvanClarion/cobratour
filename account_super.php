<?php
session_start(); // Start the session to access session variables

include("main_connection.php"); // Ensure this file sets up the MySQLi connection

if (!isset($_SESSION['username'])) {
    // Redirect if the user is not logged in
    header("Location: super-login.php");
    exit();
}

$username = $_SESSION['username']; // Current username from the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handling username change
    if (isset($_POST['saveUsername'])) {
        $newUsername = $_POST['newUsername']; // Get the new username from the form
        
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("UPDATE super SET username = ? WHERE username = ?");
        $stmt->bind_param("ss", $newUsername, $username); // Bind the new and current username
        
        if ($stmt->execute()) {
            $_SESSION['username'] = $newUsername; // Update session variable
            echo '<section style="display:flex; justify-content:center; align-items:center; position:relative; top:33%;">
                    <video autoplay muted>
                        <source src="animation/travel2.webm" type="video/webm">
                    </video>
                  </section>';
            header("refresh:2;url=account.php"); 
            exit();
        } else {
            echo "Error updating username: " . $stmt->error; // Display error message
        }
        $stmt->close();
    }

    // Handling password change
    if (isset($_POST['savePassword'])) {
        $newPassword = $_POST['newPassword']; // Get the new password from the form
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); // Hash the new password
        
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("UPDATE super SET password = ? WHERE username = ?");
        $stmt->bind_param("ss", $hashedPassword, $username); // Bind the hashed password and current username
        
        if ($stmt->execute()) {
            echo '<section style="display:flex; justify-content:center; align-items:center; position:relative; top:33%;">
                    <video autoplay muted>
                        <source src="animation/travel2.webm" type="video/webm">
                    </video>
                  </section>';
            header("refresh:2;url=account.php"); 
            exit();
        } else {
            echo "Error updating password: " . $stmt->error; // Display error message
        }
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>
