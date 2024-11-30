$(document).ready(function() {
    $('#addprofile').on('click', function() {
        $('#file-input').click(); // Simulate click on the file input
    });

    $('#file-input').on('change', function(event) {
        var file = event.target.files[0]; // Get the selected file
        if (file) {
            var reader = new FileReader(); // Create a FileReader to read the file
            reader.onload = function(e) {
                var newImageSrc = e.target.result; // Get the file data as a data URL
                $('#selected-image').attr('src', newImageSrc); // Replace the placeholder image with the new image
            };
            reader.readAsDataURL(file); // Read the file as a data URL
        }
    });
});