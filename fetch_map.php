<?php
// Include your database connection file
include("main_connection.php");

// SQL query to fetch map names from the database
$sql = "SELECT map_name, id, map_img FROM map"; // Replace with your actual table name
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    echo '<section class="map-sec">'; // Start the map section
    while ($row = $result->fetch_assoc()) {
        $mapName = htmlspecialchars($row['map_name']);
        $mapId = htmlspecialchars($row['id']); // Escape special characters for HTML
        $mapImg = htmlspecialchars($row['map_img']);
        
        echo '<section class="map-sec">';
        echo '<div class="map-container">';
        echo '<span class="map-img-container">';
        echo '<img src="icons/3d-map.png" alt="Error" class="map-img">';
        echo '</span>';
        echo "<h1>$mapName</h1>"; // Dynamically display the map name from the database
        echo '<button class="map-button" id="view-map">View</button>';
        echo '</div>'; // End of map-container

        echo '<div class="map-container2" style="display: none;">'; // Fixed class attribute syntax
        echo '<span class="map-label">';
        echo "<h1>$mapName</h1>"; // Dynamically display the map name from the database
        echo "<h6>$mapId</h6>"; // Optionally use map ID if you need it
        echo '</span>';

        echo '<div class="map-align">';
        echo '<span class="span-icon"></span>';

        echo '<div class="map-area">';
        echo '<img src="' . $mapImg . '" class="final-map">'; // Your map image path
        echo '</div>';

        echo '<span class="icon-align">';
        // The form now wraps around the delete button
        echo '<form action="map-section.php" method="POST" class="remove-sub143">';
        echo '<input type="hidden" name="id" value="' . $mapId . '">'; // Pass the map ID
        echo '<button type="submit" name="RemoveMap" class="map-icon1">'; // Change to button type
        echo '<img src="icons/delete-final.png" alt="Error" class="map-icon">';
        echo 'Delete Section';
        echo '</button>';
        echo '</form>';
        echo '</span>'; // End of icon-align

        echo '</div>'; // End of map-align div
        echo '</div>'; // End of map-container2 div
        echo '</section>'; // End of inner map-sec
    }
    echo '</section>'; // End the outer map section
} else {
    echo '<p>No maps found.</p>'; // Message if no maps are found
}

// Close the database connection
$conn->close();
?>
