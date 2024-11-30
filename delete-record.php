<?php
// Assuming your connection is already set up
session_start();
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "content"; // Your actual database name

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $connection->connect_error]));
}

// Check if the ID is received from AJAX request
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Delete the record from the database
    $sql = "DELETE FROM main_content WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id); // "i" stands for integer

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Record deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error deleting record: ' . $stmt->error]);
    }

    $stmt->close();
}

$connection->close();
?>
