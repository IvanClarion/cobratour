<?php
// Start session to keep track of the logged-in user
session_start();
include "connection.php";

// Check if the form is submitted (if the Save button was clicked)
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Get the new username and password from the form
    $newUsername = $conn->real_escape_string($_POST['newUsername']);
    $newPassword = $conn->real_escape_string($_POST['newPassword']);

    // Make sure the user is logged in (we have their username in the session

        // Prepare an SQL statement to update the username and password
        $sql = "UPDATE credit SET username = ?, password = ?";
        $stmt = $conn->prepare($sql);

        // Bind the new username, new password, and current username to the SQL query
        $stmt->bind_param("ss", $newUsername, $newPassword);

        // Execute the update query
        if ($stmt->execute()) {
            // Update successful, show a success message
            echo "<script>
                alert('Account details updated successfully!')
            </script>";
            // Update the session to reflect the new username
            $_SESSION['username'] = $newUsername;
        } else {
            // Show an error message if the update fails
            echo "Error updating account details!";
        }

        // Close the prepared statement
        $stmt->close();
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/input copy.css">
</head>
<body>
    <section>
        <nav>
            <label>COBRA TOUR</label>
            <ul>
                <li><a href="dashboard.html">Dashboard</a></li>
                <li><a href="#">Data</a></li>
                <li><a href="account.php">Account</a></li>
            </ul>
        </nav>
    </section>

    <section>
        <div class="account-container">
            <img src="logo/SWU_LOGO.png" alt="Error" class="dash-img">
            <div class="acc-btn">
                <label class="account-label">COBRA TOUR</label>
                <a href="index.php">
                    <button class="acc-btn1">Logout</button>
                </a>
            </div>
        </div>

        <div class="account-details">
            <label class="account-label">Account Credentials:</label>
            <br>
            <?php
// Database connection details
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "login_system";

// Create a connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Simple query to fetch username and password from the '' table
$sql = "SELECT username, password FROM credit";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Username: " . $row["username"] . "<br>";
        echo "Password: " . $row["password"] . "<br><br>";
    }
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>
            <button id="viewButton1" class="acc-butt">Change</button>
        </div>

        <div class="account-details" id="dashCap" style="display: none;">
            <label class="account-label">Change Account Details:</label>
            <form class="account-form" action="" method="POST">
                <label class="account-label">Username:</label>
                <input type="text" name="newUsername" placeholder="Username" required> <br>
                <label class="account-label">Password:</label>
                <input type="password" name="newPassword" placeholder="Password" required>
                <input type="submit" name="save" value="Save" class="account-save">
            </form>
        </div>
    </section>
    <script src="js/account.js"></script>
</body>
</html>
