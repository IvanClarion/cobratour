<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "login_system";

// Create a connection to the database
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check if the connection works
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>