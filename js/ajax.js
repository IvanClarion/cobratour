$(document).ready(function() {
    // Show the form when the "Add" button is clicked
    $('#add-btn').on('click', function() {
        var addSec = $('#add-section');
        if (addSec.css('display') === 'none' || addSec.css('display') === '') {
            addSec.css('display', 'flex'); // Ensure the section is shown as flex
        } else {
            addSec.css('display', 'none'); // Hide the section
        }
    });

    // Close the form when the 'x-mark' image is clicked
    $('#escape').on('click', function() {
        $('#add-section').hide(); // Hide the add section
    });

    // Handle image preview
    $('#main_profile').on('change', function(event) {
        var file = event.target.files[0]; // Get the selected file
        if (file) {
            var reader = new FileReader(); // Create a FileReader to read the file
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result); // Update the image preview
            };
            reader.readAsDataURL(file); // Read the file as a data URL
        }
    });

    // Handle form submission
    // Handle form submission
$('#add-dis').on('submit', function(event) {
    event.preventDefault(); // Prevent default form submission
    var formData = new FormData(this); // Create a FormData object

    $.ajax({
        url: 'main_contents.php', // URL to handle the form submission
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            $('#add-section').hide(); // Hide the add section after submission
            $('#add-dis')[0].reset(); // Reset the form
            $('#image-preview').attr('src', 'icons/map.png'); // Reset to default image
            
            // Automatically refresh the page after successful form submission
            location.reload(); // This will reload the page and refresh all data
            
        },
        error: function(xhr, status, error) {
            console.log("An error occurred: " + error);
        }
    });
});

    // Fetch table data on page load
    fetchTable(); // Load table data on page load
});

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
