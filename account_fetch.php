<?php
session_start(); // Start the session

// Include your database connection file
include("main_connection.php");

// Check if user is logged in
if (isset($_SESSION['id'])) { // Use 'id' to match the login session variable
    // Get the logged-in user's ID from the session
    $userId = $_SESSION['id'];

    // SQL query to fetch the user's account details based on the user ID
    $sql = "SELECT username, password, name FROM credit WHERE id = ?"; 

    // Prepare the statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId); // Bind the user ID to the statement
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();

    // Check if there are any results
    if ($result->num_rows > 0) {
        echo '<section class="map-sec">'; // Start the map section

        // Fetch the user details
        $row = $result->fetch_assoc();
        $username = htmlspecialchars($row['username']);
        $password = htmlspecialchars($row['password']);
        $name = htmlspecialchars($row['name']); // Escape special characters for HTML

        // Display the fetched information
        echo '
        <h1>ACCOUNT</h1>
        <section class="account-section">
            <div class="account-container">
                <span class="span-account">
                    <img src="logo/SWU_LOGO.png" alt="Error" class="dash-img" id="profile-picture">    
                    <label class="account-label">'.$name.'</label>
                </span>
                <form action="logout.php" method="POST" >
                    <input type="submit" value="Logout" style="border-radius:5px;">
                </form>
            </div>
        </section>
           
        <section>
                <div class="account-details">
                    <span class="account-span">
                        <label class="account-label">Username:</label>
                        <p class="username-display">' . $username . '</p>
                        <form id="newUsername" class="newuser-display" style="display: none;" action="account_change.php" method="POST">
                            <input type="text" name="newUsername" class="new-user" required>
                            <input type="submit" name="saveUsername" value="Save">
                        </form>
                    </span>
                    <button id="viewButton1" class="acc-butt">Change</button>
                </div>
                <div class="account-details">
                    <span class="account-span">
                        <label class="account-label">Password:</label>
                        <p class="password-display">' . str_repeat('*', strlen($password)) . '</p>
                        <form id="newPassword" class="newpass-display" style="display: none;" action="account_change.php" method="POST">
                            <input type="password" name="newPassword" required>
                            <input type="submit" name="savePassword" value="Save">
                        </form>
                    </span>
                    <button id="viewButton2" class="acc-butt">Change</button>
                </div>
              </section>';
    } else {
        echo 'No account found.';
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo 'You must be logged in to view account details.';
}

// Close the database connection
$conn->close();
?>
