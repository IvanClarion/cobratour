<?php 
// Start session
session_start();
include('main_connection.php');

// Initialize error variable

$error = '';


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from form
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // Prepare the SQL query to prevent SQL injection
    $query = "SELECT id, password FROM credit WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc(); // Fetch the user data

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Login success: set session variable
            $_SESSION['id'] = $row['id']; // Store the user's ID in the session
            $_SESSION['username'] = $username; // Store the username in the session
            
            // Redirect or display success message
            echo '<section style="display:flex; justify-content:center; align-items:center; position:relative; top:33%;">
                    <video autoplay muted>
                        <source src="animation/travel2.webm" type="video/webm">
                    </video>
                  </section>';
            header("refresh:2;url=dashboard.php");
            exit;
        } else {
            // Password is incorrect
            $error = "Invalid Username or Password.";
        }
    } else {
        // Username not found
        $error = "Invalid Username or Password.";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <section id="form" class="login">
        <div class="login-container">
            <img src="login/login-hall.jpg" alt="Error" class="hall-img">
            <span class="span-img">
                <form action="" method="post" id="loginForm">
                    <img src="logo/SWU_LOGO.png" alt="Error" class="l-img">
                    <h1>COBRATOUR <br>ADMIN</h1>
                    <input type="text" id="username" name="Username" placeholder="Username" required>         
                    <input type="password" id="password" name="Password" placeholder="Password" required>
                    <input type="submit" id="btn" value="Login" name="submit" class="button"> 
                    <?php
                    // Display error message if login fails
                    if (!empty($error)) {
                        echo '<p id="error-message" style="color:red; font-size:13px;">' . htmlspecialchars($error) . '</p>'; 
                    }
                    ?>
                </form>   
                <a href="super-login.php">Control Admin</a>
            </span>
        </div>
    </section>
</body>
</html>
