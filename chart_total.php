<?php
include("main_connection.php");

// Check if connection exists
if (!isset($conn)) {
    die("Database connection not found.");
}

// SQL query to fetch data
$sql = "SELECT satisfaction, COUNT(*) as count FROM feedback GROUP BY satisfaction";
$result = $conn->query($sql);

$data = array();

// Predefine satisfaction levels to ensure consistent order
$satisfactionLevels = ['Very Dissatisfied', 'Dissatisfied', 'Neutral', 'Satisfied', 'Very Satisfied'];
$satisfactionData = array_fill(0, count($satisfactionLevels), 0);

if ($result->num_rows > 0) {
    // Fetch each row and map it to the predefined satisfaction levels
    while($row = $result->fetch_assoc()) {
        $level = $row['satisfaction'];
        $index = array_search($level, $satisfactionLevels);
        if ($index !== false) {
            $satisfactionData[$index] = (int)$row['count'];
        }
    }
}

// Return the data as JSON with satisfaction levels and their corresponding counts
$response = [
    'labels' => $satisfactionLevels,
    'data' => $satisfactionData
];

echo json_encode($response);

$conn->close();
?>
