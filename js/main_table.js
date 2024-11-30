$(document).ready(function() {
    // Function to fetch table data
    function fetchTable() {
        $.ajax({
            url: 'fetch-table.php',
            type: 'GET',
            success: function(data) {
                $('#contents').html(data); // Update the HTML of the #contents section
            },
            error: function(xhr, status, error) {
                console.log("An error occurred: " + error);
            }
        });
    }

    // Fetch data when the document is ready
    fetchTable(); // Load table data on page load

    // Handle form submission
    $('#add-dis').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Create FormData object to send the file and other form data
        var formData = new FormData(this);

        $.ajax({
            url: 'main_contents.php',  // URL to handle the form submission
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Hide the entire section after successful submission
                $('#add-section').hide();
                // Reset the form
                $('#add-dis')[0].reset();
                // Refresh the table after adding a new record
                fetchTable(); 
            },
            error: function(xhr, status, error) {
                console.log("An error occurred: " + error);
            }
        });
    });
});
 