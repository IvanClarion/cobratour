<?php
include("main_connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['floor-save'])) {
    // Check if a file was uploaded
    if (isset($_FILES['floorMap']) && $_FILES['floorMap']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['floorMap']['tmp_name'];
        $fileName = $_FILES['floorMap']['name'];
        $fileSize = $_FILES['floorMap']['size'];
        $fileType = $_FILES['floorMap']['type'];
        
        // Validate file type (optional)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif']; // Add allowed types
        if (!in_array($fileType, $allowedTypes)) {
            die("Error: Please upload a valid image file.");
        }

        // Define the upload path
        $uploadPath = 'uploads/' . basename($fileName); // Ensure this directory is writable

        // Move the file to the uploads directory
        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
            // Insert the file path into the database
            $stmt = $conn->prepare("INSERT INTO floor_map (floor_img, main_content_id) VALUES (?, ?)");
            $stmt->bind_param("si", $uploadPath, $_POST['id']);
            if ($stmt->execute()) {
                echo '<section style="display:flex; justify-content:center; align-items:center; position:relative; top:33%;">';
                echo '<video autoplay muted>';
                echo '<source src="animation/travel2.webm" type="video/webm">';
                echo '</video>';
                echo '</section>';
        
                // Redirect after 1 second
                header("refresh:1;url=content.php");
                exit;
            } else {
                echo "Error: Unable to save file path to the database.";
            }
            $stmt->close();
        } else {
            echo "Error: There was an issue moving the uploaded file.";
        }
    } else {
        echo "Error: No file uploaded or there was an upload error.";
    }
}

// Close the database connection
$conn->close();
?>
