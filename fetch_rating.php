<?php
// Start the session
include("main_connection.php");

// Check if connection exists
if (!isset($conn)) {
    die("Database connection not found.");
}

// SQL query to fetch all feedback
$sql = "SELECT id, rate, feedback, building FROM rate"; // Ensure 'rate' is the correct table name
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    echo "Error executing query: " . $conn->error; 
    exit; // Stop further execution
}

// Initialize an empty array to hold the rows
$rows = [];

// Check if there are results
if ($result->num_rows > 0) {
    // Start the table
    echo "<table class='data-table2' id='table-body'>
            <tr>
                <th>#</th>
                <th>Building</th>
                <th>Satisfaction</th>
                <th>Feedback</th>
            </tr>";

    // Loop through each row of results and store them in an array
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row; // Store the entire row
    }

    // Generate table rows with IDs
    foreach ($rows as $index => $row) {
        echo "<tr class='data-row' id='row-$index' style='display: " . ($index < 5 ? "table-row" : "none") . ";'>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['building']) . "</td>
                <td>" . htmlspecialchars($row['rate']) . "</td>
                <td>" . htmlspecialchars($row['feedback']) . "</td>
              </tr>";
    }

    // Close the table
    echo "</table>";
    echo "<section class='tbl-btn'>
            <button id='prev-btn'>Prev</button>
            <button id='next-btn'>Next</button> 
          </section>"; 
} else {
    echo "<p>No feedback available.</p>"; 
}

// Close the connection
$conn->close();
?>
<script>
    let currentPage = 0; // Initialize current page
    const rowsPerPage = 5; // Number of rows to display per page
    const rows = document.querySelectorAll('.data-row'); // Select all rows

    function showRows() {
        // Hide all rows
        rows.forEach((row, index) => {
            row.style.display = (index >= currentPage * rowsPerPage && index < (currentPage + 1) * rowsPerPage) ? 'table-row' : 'none';
        });
    }

    document.getElementById('next-btn').addEventListener('click', () => {
        if ((currentPage + 1) * rowsPerPage < rows.length) {
            currentPage++; // Move to the next page
            showRows(); // Update displayed rows
        }
    });

    document.getElementById('prev-btn').addEventListener('click', () => {
        if (currentPage > 0) {
            currentPage--; // Move to the previous page
            showRows(); // Update displayed rows
        }
    });

    // Initial display of rows
    showRows();
</script>
<style>
    .tbl-btn{
        display:flex;
        align-items:center;
        gap:5px;
        margin:3px;
    }
</style>