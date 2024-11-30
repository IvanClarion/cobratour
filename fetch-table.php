<?php
// Start the session
session_start();

// Include the database connection file
include("main_connection.php");

// Check if connection exists
if (!isset($conn)) {
    die("Database connection not found.");
}

// Set sorting order (ASC or DESC)
$order = isset($_GET['order']) && in_array($_GET['order'], ['ASC', 'DESC']) ? $_GET['order'] : 'ASC';

// SQL query to fetch all records from the main_content table, sorting by building_name
$sql = "SELECT id, building_name, building_classification, main_profile, building_description FROM main_content ORDER BY building_name $order";

$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    echo "Error executing query: " . $conn->error; 
    exit; // Stop further execution
}

// Check if there are results
if ($result->num_rows > 0) {
    
    // Start the table
    echo "<table class='data-table2' id='table-body'>
            <tr>
                <th>Building Name</th>
                <th>Building Department</th>
                <th>Image</th>
                <th>Action</th>
            </tr>";

    // Initialize a counter for the row numbers
    while ($row = $result->fetch_assoc()) {
        $id = htmlspecialchars($row['id']);
        $bldgname = htmlspecialchars($row['building_name']);
        $mainprofile = htmlspecialchars($row['main_profile']);
        $building_classification = htmlspecialchars($row['building_classification']);
        $building_description = isset($row['building_description']) ? htmlspecialchars($row['building_description']) : '';
    
        echo "<tr class='survey-row'>
                <td>$bldgname</td>
                <td>$building_classification</td>";
                
        // Check if main_profile exists and is not empty
        if (!empty($mainprofile)) {
            echo "<td>
                    <a href='data:image/jpeg;base64," . base64_encode(file_get_contents($mainprofile)) . "' target='_blank'>
                        <img src='data:image/jpeg;base64," . base64_encode(file_get_contents($mainprofile)) . "' width='50' height='50' alt='Profile Image'>
                    </a>
                </td>";
            echo "<td style='display:flex; justify-content:center; gap:5px;'>
                    <a href='content.php?id=$id#main-view-$id'>
                        <button class='edit-btn'>Edit</button>
                    </a>
                    <button id='delete-form1-" . $id . "' class='delete-btn' data-id='" . $id . "'>Delete</button>
                </td>";
        } else {
            echo "<td>No image available</td>";
        }

        echo "</tr>"; // Close the table row
    }

    // Close the table
    echo "</table>";

    // Delete modal (hidden by default)
    echo "<section class='delete-sec1' id='delete-display'>
        <div class='delete-container1'>
            <img src='icons/delete_all.png' alt='Delete Icon' class='add-img2'><br>
            <h1>Are you sure you want to delete this content?</h1><br>
            <form action='remove-table.php' method='POST' style='font-size:10px; display:block;'>
                <input type='hidden' name='id' id='delete-id' value=''> <!-- This hidden input will be updated with the ID -->
                <span style='display:flex; align-items:center; justify-content:center;'>
                    <button type='button' id='cancel-btn' class='button123'>Cancel</button>
                    <input type='submit' name='RemoveMap' value='Delete' style='border-radius:10px;'>
                </span>
            </form>
        </div>
    </section>";

    // Pagination buttons
    echo "<section class='tbl-btn'>
            <button id='prev-btn2'>Prev</button>
            <button id='next-btn2'>Next</button> 
          </section>"; 
} else {
    // If no rows were returned, display a different message
    echo "<p>No records available.</p>"; // More user-friendly message
}

// Close the connection
$conn->close();
?>

<script>
    // Handle pagination for the main content table
    let currentSurveyPage = 0;
    const surveyRowsPerPage = 5;
    const surveyRows = document.querySelectorAll('.survey-row');

    function showSurveyRows() {
        surveyRows.forEach((row, index) => {
            row.style.display = (index >= currentSurveyPage * surveyRowsPerPage && index < (currentSurveyPage + 1) * surveyRowsPerPage) ? 'table-row' : 'none';
        });
    }

    document.getElementById('next-btn2').addEventListener('click', () => {
        if ((currentSurveyPage + 1) * surveyRowsPerPage < surveyRows.length) {
            currentSurveyPage++;
            showSurveyRows();
        }
    });

    document.getElementById('prev-btn2').addEventListener('click', () => {
        if (currentSurveyPage > 0) {
            currentSurveyPage--;
            showSurveyRows();
        }
    });

    showSurveyRows(); // Initial display

    // Handle edit button clicks to show the edit modal
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;
            const modal = document.getElementById('edit-modal-' + id);
            modal.style.display = 'flex'; // Show the edit modal
        });
    });

    // Handle delete button clicks to show the delete modal
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;
            document.getElementById('delete-id').value = id; // Set the ID in the hidden input
            const modal = document.getElementById('delete-display');
            modal.style.display = 'flex'; // Show the delete modal
        });
    });

    // Handle cancel button inside the delete modal to close it
    document.getElementById('cancel-btn').addEventListener('click', function () {
        const modal = document.getElementById('delete-display');
        modal.style.display = 'none'; // Hide the delete modal
    });

    // Handle cancel button inside the edit modal to close it
    document.querySelectorAll('.cancel-btn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.id.split('-')[2]; // Get the ID from the button's ID (e.g., cancel-btn-1)
            const modal = document.getElementById('edit-modal-' + id);
            modal.style.display = 'none'; // Hide the edit modal
        });
    });

    window.onload = function() {
        // Check if there is a fragment identifier in the URL
        if (window.location.hash) {
            const section = document.querySelector(window.location.hash);
            if (section) {
                section.scrollIntoView({ behavior: 'smooth' });
            }
        }
    };
</script>

<style>
    .tbl-btn {
        display: flex;
        align-items: center;
        gap: 5px;
        margin: 3px;
    }

    /* Full-screen overlay for the edit modal */
    .edit-sec {
        display: none;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 100;
    }

    .add-container {
        background-color: whitesmoke;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        text-align: center;
    }

    /* Show the modal when triggered */
    .edit-sec.show {
        display: flex;
        opacity: 1;
    }
    .delete-sec1 {
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
    .delete-container1{
    display:block;
    background-color: whitesmoke;
    padding: 20px;
    margin: 0px;
    text-align:center;
    align-content:center;
    border-radius: 20px;
    justify-content: center;
    align-items: center;
    box-shadow: 0px 0px 3px var(--dark);
    position: fixed;
    }
</style>
