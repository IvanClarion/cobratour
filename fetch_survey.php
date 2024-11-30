<?php
include("main_connection.php");

// Check if connection exists
if (!isset($conn)) {
    die("Database connection not found.");
}

// SQL query to fetch survey data
$sql = "SELECT id, classification, survey FROM survey";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start the table
    echo "<table class='data-table2' id='survey-table'>
            <tr>
                <th>#</th>
                <th>Classification</th>
                <th>Survey</th>
            </tr>";

    // Initialize an empty array to hold the rows
    $rows = [];

    // Loop through the results and store each row in an array
    while($row = $result->fetch_assoc()) {
        $rows[] = $row; // Store the entire row
    }

    // Generate table rows with IDs
    foreach ($rows as $index => $row) {
        echo "<tr class='survey-row' id='survey-row-$index' style='display: " . ($index < 5 ? "table-row" : "none") . ";'>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["classification"]) . "</td>
                <td>" . htmlspecialchars($row["survey"]) . "</td>
              </tr>";
    }

    // Close the table
    echo "</table>";
    
    // Pagination buttons
    echo "<section class='tbl-btn'>
            <button id='prev-btn1'>Prev</button>
            <button id='next-btn1'>Next</button> 
          </section>"; 
} else {
    echo "<table class='data-table2' id='survey-table'>
            <tr><td colspan='3'>No data found</td></tr>
          </table>";
}

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

    document.getElementById('next-btn1').addEventListener('click', () => {
        if ((currentSurveyPage + 1) * surveyRowsPerPage < surveyRows.length) {
            currentSurveyPage++; // Move to the next page
            showSurveyRows(); // Update displayed rows
        }
    });

    document.getElementById('prev-btn1').addEventListener('click', () => {
        if (currentSurveyPage > 0) {
            currentSurveyPage--; // Move to the previous page
            showSurveyRows(); // Update displayed rows
        }
    });

    // Initial display of rows
    showSurveyRows();
</script>
