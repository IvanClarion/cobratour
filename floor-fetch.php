<?php
// Include the database connection file
include("main_connection.php");

// Check if connection exists
if (!isset($conn)) {
    die("Database connection not found.");
}

// Get the sorting order (ASC or DESC) from the URL
$order = isset($_GET['order']) && in_array($_GET['order'], ['ASC', 'DESC']) ? $_GET['order'] : 'ASC';

// Fetch sorted records from the main_content table
$sql = "SELECT id, building_name, building_classification, main_profile, building_description FROM main_content ORDER BY building_name $order";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Safely escape output data
        $id = htmlspecialchars($row['id']);
        $bldgname = htmlspecialchars($row['building_name']);
        $mainprofile = htmlspecialchars($row['main_profile']);
        $building_classification = $conn->real_escape_string($row['building_classification']);
        $building_description = $conn->real_escape_string($row['building_description']);
        
        // Fetch the floor image from the floor_map table
        $floor_sql = "SELECT floor_img FROM floor_map WHERE main_content_id = ?";
        $floor_stmt = $conn->prepare($floor_sql);
        $floor_stmt->bind_param("i", $id);
        $floor_stmt->execute();
        $floor_result = $floor_stmt->get_result();
        $floor_img = ($floor_result->num_rows > 0) ? $floor_result->fetch_assoc()['floor_img'] : '';

        // Render the main view and form
        //floor upload
        echo '
        <section class="main-view-sec" id="main-view-'.$id.'">
            <div class="main-view-container">
                <img src="'.$mainprofile.'" class="logo" alt="Profile Image">
                <h1 class="section-title">' . $bldgname . '</h1> <!-- Added class here -->
                <button class="mainv-btn" id="main-floor-'.$id.'">
                    <img src="icons/other.png" alt="View Button" class="icon-button">
                </button>
            </div>
        </section>
    
        <section class="main-view-sec1" id="main-view2-'.$id.'" style="display:none;">
            <div class="main-view-container1">
                <h1>' . $bldgname . '</h1>
                <p>'.$building_classification.'</p>
                <span style="display:flex; justify-content:flex-start; gap:3px;">
                    <h4>Description: </h4>
                    <p>'.$building_description.'</p>
                </span>
                <form action="floor-upload.php" method="POST" enctype="multipart/form-data" style="display:flex; justify-content:flex-start; gap:3px;">
                    <h4>Floor Map:</h4>
                    <input type="hidden" name="id" value="'.$id.'"> <!-- Hidden input for primary ID -->
                    <input type="hidden" name="action" value="'.$id.'">
                    <button style="padding:8px; gap:3px; align-items:center;" type="button" id="upload-button-'.$id.'" onclick="triggerFileInput(\''.$id.'\')">
                        <img src="icons/upload.svg" alt="Error" style="width:20px;">
                    </button>
                    <input type="file" name="floorMap" id="floor-map-'.$id.'" required hidden>
                    <button style="padding:8px; gap:3px; align-items:center;" type="button" id="change-button-'.$id.'" onclick="triggerFileInput(\''.$id.'\')">
                        <img src="icons/edit.svg" alt="Error" style="width:20px;">
                    </button>
                    <input type="submit" name="floor-save" id="floor-saved-'.$id.'" value="Save" style="border-radius:10px;"><br>
                </form>
                <div class="distination-container" id="distination-container-'.$id.'">
                    <div class="distination-display" id="sliders-'.$id.'">
                    ';
    
                    
        // Display the uploaded floor image if it exists
        if ($floor_img) {
            echo '<img src="'.$floor_img.'" alt="Floor Map" class="over-img" style="width:100%;">';
        } else {
            echo '<p>No floor map uploaded.</p>';
        }

        echo ' 
                    </div>
                </div>
                
                <div style="display:flex; align-items:center; justify-content:flex-end;">
                    <button style="padding:8px; align-items:center; gap:2px;" id="edit-content-'.$id.'">
                        <img src="icons/edit.svg" alt="Error" style="width:20px;">Edit
                    </button>
                    <form action="remove-table.php" method="POST">
                        <input type="hidden" name="id" value="'.$id.'"> <!-- Map ID hidden input -->
                        <input type="submit" name="RemoveMap" value="Delete" style="border-radius:10px;">
                    </form>
                </div>
            </div>
        </section>';

        // Hidden Edit Form Section
        echo '
        <section id="edit-form-'.$id.'" class="edit-sec" style="display:none;">
            <div class="add-container">
                <form class="add-form" action="edit_main.php" method="POST" id="remove-dis"  enctype="multipart/form-data">
                    <h4 class="add-label">Edit '.$bldgname.'?</h4><br>
                    <div style="text-align: center;">
                    <img src="'.$mainprofile.'" alt="Error" class="add-img2"><br>
                    <span class="new-gen2">
                        <button id="profile-btn-'.$id.'"type="button">Change Image</button>
                         <input type="hidden" name="id" value="'.$id.'">
                        <input type="file" name="update_profile" id="main_profile-'.$id.'" accept="image/*" hidden> <br>
                    </span>
                    <div style="text-align:justify; justify-content:center;">
                        <label class="add-label">Building/Facility:</label>
                        <input type="text" name="building_name" placeholder="Building Name" class="add-style" value="'.$bldgname.'"><br>
                        <label class="add-label">Building Department:</label>
                        <input type="text" name="building_classification" placeholder="Ex: I.T Department" value="'.$building_classification.'"><br>
                        <label class="add-label">Building Description:</label>
                        <input type="text" name="building_description" placeholder="Description" value="'.$building_description.'"><br>
                         <span class="delete-span">
                        <input type="submit" name="save-edit" value="Save Changes" id="Edit" class="br-submit"><br>
                        <button type="button" id="CancelFile-'.$id.'" class="cancel-btn br-submit">Cancel</button> 
                        </span>
                        </div>     
                    </div>
                </form>        
            </div>
        </section>'; 
        $floor_stmt->close();
    }
} else {
    echo "<p>No results found.</p>";
}

// Close the connection
$conn->close();
?>

<script>
    function triggerFileInput(id) {
    const fileInput = document.getElementById('floor-map-' + id);
    if (fileInput) {
        console.log('Triggering file input for:', fileInput.id);
        fileInput.click();
    } else {
        console.error('File input not found for ID:', id);
    }
}

    
    // JavaScript for toggling view and edit sections
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('[id^="main-floor-"]'); // View buttons
    const editButtons = document.querySelectorAll('[id^="edit-content-"]'); // Edit buttons
    const profileButtons = document.querySelectorAll('[id^="profile-btn-"]'); // Change Image buttons

    // Toggle visibility of view section
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.id.split('-')[2]; // Extract the unique ID part from the button's ID
            const section = document.getElementById('main-view2-' + id); // Get the corresponding section to show/hide
            section.style.display = (section.style.display === 'none' || section.style.display === '') ? 'block' : 'none';
        });
    });

    // Toggle visibility of edit form
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.id.split('-')[2]; // Extract the unique ID part from the button's ID
            const editForm = document.getElementById('edit-form-' + id); // Get the corresponding edit form
            editForm.style.display = (editForm.style.display === 'none' || editForm.style.display === '') ? 'flex' : 'none';
        });
    });

    // Cancel button to hide edit form
    const cancelButtons = document.querySelectorAll('[id^="CancelFile-"]');
    cancelButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.id.split('-')[1]; // Extract the unique ID part from the button's ID
            document.getElementById('edit-form-' + id).style.display = 'none'; // Hide the form
        });
    });

    // Handle Change Image button click and trigger file input
    profileButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default action
            const id = this.id.split('-')[2]; // Extract the unique ID part from the button's ID
            document.getElementById('main_profile-' + id).click(); // Trigger the hidden file input
        });
    });
});
// Function to highlight the section title
function highlightSection() {
        const sections = document.querySelectorAll('.main-view-sec');
        
        sections.forEach(section => {
            const rect = section.getBoundingClientRect();
            const sectionTitle = section.querySelector('.section-title');

            // Check if the section is in the viewport
            if (rect.top >= 0 && rect.bottom <= window.innerHeight) {
                sectionTitle.classList.add('highlight'); // Add highlight class
            } else {
                sectionTitle.classList.remove('highlight'); // Remove highlight class
            }
        });
    }

    // Function to highlight the specific section based on its ID
    function highlightSectionById(sectionId) {
        // Remove highlight from all sections
        const sections = document.querySelectorAll('.main-view-sec');
        sections.forEach(section => {
            const sectionTitle = section.querySelector('.section-title');
            sectionTitle.classList.remove('highlight'); // Remove highlight class
        });

        // Highlight the specific section
        const sectionToHighlight = document.querySelector(sectionId);
        if (sectionToHighlight) {
            const sectionTitle = sectionToHighlight.querySelector('.section-title');
            sectionTitle.classList.add('highlight'); // Add highlight class
        }
    }

    // Smooth scroll to section if there's a hash in the URL
    window.onload = function() {
        if (window.location.hash) {
            const section = document.querySelector(window.location.hash);
            if (section) {
                section.scrollIntoView({ behavior: 'smooth' });
                highlightSectionById(window.location.hash); // Highlight the section after scrolling
            }
        }
    };

    // Function to handle button clicks
    function handleButtonClick(sectionId) {
        // Smooth scroll to the section
        const section = document.querySelector(sectionId);
        if (section) {
            section.scrollIntoView({ behavior: 'smooth' });
            highlightSectionById(sectionId); // Highlight the section after scrolling
        }
    }
    </script>
<style>
    .highlight {
    background-color: yellow; /* Change this to your preferred highlight color */
    transition: background-color 0.5s; /* Smooth transition */
}

.edit-sec{
    display: none;
    text-align:justify;
    justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 100;
        transition: opacity 0.3s ease;
}
.add-container{
    background-color: whitesmoke;
    padding: 20px;
    margin: 0px;
    text-align:center;
    align-content:center;
    border-radius: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0px 0px 3px var(--dark);
    position: fixed;
}

</style>