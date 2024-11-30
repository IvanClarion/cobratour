<?php
session_start();
include("connection.php"); // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch the user data
    $sql = "SELECT * FROM credit WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Check if the password matches
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['username'] = $row['username'];

            // Output the video
            echo '<section style="display:flex; justify-content:center; align-items:center; position:relative; top:33%;">
                <video autoplay muted>
                    <source src="animation/travel2.webm" type="video/webm">
                </video>
            </section>';
            
            // Redirect after a short delay
            header("refresh:2;url=dashboard.php");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}
?>
