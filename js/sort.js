document.getElementById('sort-first').addEventListener('click', function() {
    // Call the function to fetch the sorted table with order set to ASC
    fetchSortedTable('ASC');
});

document.getElementById('sort-last').addEventListener('click', function() {
    // Call the function to fetch the sorted table with order set to DESC
    fetchSortedTable('DESC');
});


function fetchSortedTable(order) {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Use AJAX to send request to the server
    xhr.open('GET', 'fetch-table.php?order=' + order, true);
    
    // Define what happens on successful data submission
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('contents').innerHTML = xhr.responseText; // Update table with the sorted data
        }
    };

    // Send the request
    xhr.send();
}
