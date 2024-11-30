<?php
include("main_connection.php");

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error); // Log the error
    echo json_encode(['success' => false, 'message' => "Connection failed."]);
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input (sanitize the input)
    $building_name = $conn->real_escape_string($_POST['building_name']);
    $building_classification = $conn->real_escape_string($_POST['building_classification']);
    $building_description = $conn->real_escape_string($_POST['building_description']);

    // Check if the file has been uploaded
    if (isset($_FILES['main_profile']) && $_FILES['main_profile']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['main_profile']['tmp_name'];
        $fileName = basename($_FILES['main_profile']['name']);
        $uploadDir = 'uploads/';

        // Generate a unique file name to avoid overwriting
        $uniqueFileName = time() . '_' . uniqid() . '_' . $fileName;
        $destPath = $uploadDir . $uniqueFileName;

        // Move the uploaded file to the destination
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // Insert building data and file path into the database
            $sql = "INSERT INTO main_content (building_name, building_classification, building_description, main_profile) 
                    VALUES ('$building_name', '$building_classification', '$building_description', '$destPath')";

            if ($conn->query($sql) === TRUE) {
                echo json_encode(['success' => true, 'id_display' => $conn->insert_id]);
            } else {
                error_log("Database Error: " . $conn->error); // Log the SQL error
                echo json_encode(['success' => false, 'message' => "Error saving data."]);
            }
        } else {
            error_log("File upload error."); // Log the file upload error
            echo json_encode(['success' => false, 'message' => "Failed to move uploaded file."]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => "Please upload an image."]);
    }
    exit();
}

// Fetch existing records when the page loads
$result = $conn->query("SELECT * FROM main_content");
$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'building_name' => $row['building_name'],
            'building_classification' => $row['building_classification'],
            'building_description' => $row['building_description'],
            'main_profile' => base64_encode(file_get_contents($row['main_profile'])),
            'id_display' => $row['id']
        ];
    }
}
echo json_encode(['success' => true, 'data' => $data]);

$conn->close();
?>
