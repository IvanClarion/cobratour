<?php
// Start the session
include("main_connection.php");

// Check if connection exists
if (!isset($conn)) {
    die("Database connection not found.");
}

// SQL query to fetch all feedback
$sql = "SELECT id, satisfaction, feed_back FROM feedback"; // Ensure 'feed_back' is the correct column name
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    // If the query fails, display the error with more detail
    echo "Error executing query: " . $conn->error; 
    exit; // Stop further execution
}

// Check if there are results
if ($result->num_rows > 0) {
    // Start the table
    echo "<table class='data-table2' id='table-body''>
            <tr>
                <th>#</th>
                <th>Satisfaction</th>
                <th>Feedback</th>
            </tr>";

    // Loop through each row of results
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['satisfaction']) . "</td>
                <td>" . htmlspecialchars($row['feed_back']) . "</td>
              </tr>"; // Display feedback data
    }

    // Close the table
    echo "</table>";
    echo "<section class='tbl-btn'>
            <button id='prev-btn2'>Prev</button>
            <button id='next-btn2'>Next</button> 
          </section>"; 
} else {
    // If no rows were returned, display a different message
    echo "<p>No feedback available.</p>"; // More user-friendly message
}

// Close the connection
$conn->close();
?>
<script>
    // Pagination for survey table
    let currentSurveyPage = 0; // Initialize current page for survey
    const surveyRowsPerPage = 5; // Number of rows to display per page
    const surveyRows = document.querySelectorAll('.survey-row'); // Select all survey rows

    function showSurveyRows() {
        // Hide all survey rows
        surveyRows.forEach((row, index) => {
            row.style.display = (index >= currentSurveyPage * surveyRowsPerPage && index < (currentSurveyPage + 1) * surveyRowsPerPage) ? 'table-row' : 'none';
        });
    }

    document.getElementById('next-btn2').addEventListener('click', () => {
        if ((currentSurveyPage + 1) * surveyRowsPerPage < surveyRows.length) {
            currentSurveyPage++; // Move to the next page
            showSurveyRows(); // Update displayed rows
        }
    });

    document.getElementById('prev-btn2').addEventListener('click', () => {
        if (currentSurveyPage > 0) {
            currentSurveyPage--; // Move to the previous page
            showSurveyRows(); // Update displayed rows
        }
    });

    // Initial display of rows
    showSurveyRows();
</script>
