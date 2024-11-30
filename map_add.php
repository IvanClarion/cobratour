<?php
// Include your database connection file
include("main_connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save-map'])) {
    $mapName = $conn->real_escape_string($_POST['map-name']);
    
    // Handle image upload
    if (isset($_FILES['map_img']) && $_FILES['map_img']['error'] === UPLOAD_ERR_OK) {
        $dest_path = './uploaded_maps/' . basename($_FILES['map_img']['name']); // Store the image with its original name

        // Move the uploaded file
        if (move_uploaded_file($_FILES['map_img']['tmp_name'], $dest_path)) {
            // Insert into the database
            $sql = "INSERT INTO map (map_name, map_img) VALUES ('$mapName', '$dest_path')";
            if ($conn->query($sql) === TRUE) {
                echo '<section style="display:flex; justify-content:center; align-items:center; position:relative; top:33%;">
            <video autoplay muted>
                <source src="animation/travel2.webm" type="video/webm">
            </video></section>';
    header("refresh:2;url=map.php");
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "No image uploaded or there was an upload error.";
    }
}

// Close the database connection
$conn->close();
?>
