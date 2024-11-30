<?php
// Include the database connection
include("main_connection.php");

// Define the target directory for uploads (make sure this folder has the right permissions)
$target_dir = "uploads/";

// Check if the form was submitted
if (isset($_POST['save-edit1'])) {
    // Retrieve form data
    $main_content_id = $_POST['id'];  // ID of the main content being edited
    $building_name = $_POST['building_name'];
    $building_classification = $_POST['building_classification'];
    $building_description = $_POST['building_description'];

    // Prepare the SQL statement for the case without an image update
    $sql = "UPDATE main_content SET 
                building_name = ?, 
                building_classification = ?, 
                building_description = ? 
            WHERE id = ?";
    
    // Check if an image file was uploaded
    if (isset($_FILES['update_profile']) && $_FILES['update_profile']['error'] == 0) {
        $file_name = uniqid() . '-' . basename($_FILES["update_profile"]["name"]); // Generate a unique file name
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Allowed file types (jpg, jpeg, png)
        $allowed_types = ['jpg', 'jpeg', 'png'];
        if (in_array($file_type, $allowed_types)) {
            // Move the uploaded image to the target directory
            if (move_uploaded_file($_FILES["update_profile"]["tmp_name"], $target_file)) {
                // Add profile image to the SQL query if upload is successful
                $sql = "UPDATE main_content SET  
                            building_name = ?, 
                            main_profile = ?, 
                            building_classification = ?, 
                            building_description = ? 
                        WHERE id = ?";
            } else {
                echo "Error: There was an error uploading your file.";
                exit;
            }
        } else {
            echo "Error: Only JPG, JPEG, and PNG files are allowed.";
            exit;
        }
    }

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // If an image was uploaded, bind 5 parameters, otherwise bind 4
    if (isset($file_name)) {
        $stmt->bind_param("ssssi", $building_name, $target_file, $building_classification, $building_description, $main_content_id);
    } else {
        $stmt->bind_param("sssi", $building_name, $building_classification, $building_description, $main_content_id);
    }

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to the content page after a successful update with a video
        echo '<section style="display:flex; justify-content:center; align-items:center; position:relative; top:33%;">
                <video autoplay muted>
                    <source src="animation/travel2.webm" type="video/webm">
                </video>
              </section>';
        header("refresh:1;url=content.php");
    } else {
        echo "Error: Could not update the building information.";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
