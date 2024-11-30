<?php
// Include your database connection file
include("main_connection.php");

// SQL query to fetch username, password, name, and id from the 'credit' table
$sql = "SELECT id, username, password, name FROM credit"; 

// Execute the query
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    echo '<section class="map-sec">'; // Start the map section
    
    // Start the table and table header
    echo '<table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>'; // Start tbody for the rows

    while ($row = $result->fetch_assoc()) {
        $id = htmlspecialchars($row['id']); // Get the user ID
        $name = htmlspecialchars($row['name']);
        $username = htmlspecialchars($row['username']);
        $password = htmlspecialchars($row['password']); // Escape special characters for HTML

        // Display the fetched information in table rows
        echo '<tr>
                <td>' . $name . '</td>
                <td>' . $username . '</td>
                <td style="display:flex; justify-content:center; align-items:center;">
                    <form action="super-remove.php" method="POST" style="margin-right: 10px;">
                        <input type="hidden" name="id" value="' . $id . '">
                        <input type="submit" name="remove-acc" value="Remove" class="s-remove">
                    </form>
                    <img type="button" src="icons/edit.svg" alt="Error" class="s-edit21" onclick="openModal(\'modal-' . $id . '\')">
                </td>
              </tr>';

        // Add the modal for editing account details, initially hidden
        echo '<section class="form-s" id="modal-' . $id . '" style="display:none;">
                <div class="form-s-container">
                
                    <form action="super-edit.php" method="POST">
                        <span class="form-s-span">
                            <img src="icons/x-mark.png" alt="Error" class="s-xmark close-modal">
                            <img src="icons/editing.png" alt="Error" class="account-icon">
                            <h1>EDIT ACCOUNT</h1><br>
                            <input type="hidden" name="id" value="' . $id . '"> <!-- Hidden ID field -->
                            <input type="text" placeholder="Name" name="s-newname" class="new-user" value="' . $name . '"><br>
                            <input type="text" placeholder="Username" name="s-newusername" class="new-user" value="' . $username . '"><br>
                            <input type="hidden" name="current-username" value="' . $username . '">
                            <input type="password" placeholder="Password" name="s-newpassword" value="Password"><br>
                            <input type="submit" value="Save" class="s-save">
                        </span>
                    </form>
                </div>
              </section>';
    }

    echo '</tbody></table>'; // Close tbody and table
    echo '</section>'; // Close the map section
} else {
    echo 'No Credentials Found'; // Display a message if no results are found
}

// Close the database connection
$conn->close();
?>

<script>
// Function to toggle modal visibility
// Function to toggle modal visibility
// Function to open modal
function openModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal.style.display === "none" || modal.style.display === "") {
        modal.style.display = "flex"; // Show the modal
    }
}

// Event listener to close modal when any element with class 'close-modal' is clicked
document.addEventListener("click", function(event) {
    if (event.target.classList.contains("close-modal")) {
        var modal = event.target.closest(".form-s"); // Find the closest modal container
        modal.style.display = "none"; // Hide the modal
    }
});


</script>

<style>
/* Modal CSS */
.form-s {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    position: fixed;
    background-color: rgba(0, 0, 0, 0.5);
    overflow: hidden;
    z-index: 1;
    top: 0;
    left: 0;
}

.form-s-container {
    display: flex;
    background-color: white;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-s-span {
    display: block;
}

.new-user {
    margin: 10px 0;
    padding: 8px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.s-save {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.s-save:hover {
    background-color: #45a049;
}
</style>
