document.addEventListener('DOMContentLoaded', function() {
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('main_profile');
    const imagePreview = document.getElementById('image-preview');
    let droppedFile = null; // Variable to store the dropped file

    // Prevent default behavior for drag-and-drop
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    // Highlight drop area when file is being dragged over
    dropArea.addEventListener('dragenter', () => dropArea.classList.add('dragover'));
    dropArea.addEventListener('dragleave', () => dropArea.classList.remove('dragover'));
    dropArea.addEventListener('dragover', () => dropArea.classList.add('dragover'));
    dropArea.addEventListener('drop', () => dropArea.classList.remove('dragover'));

    // Handle dropped files
    dropArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        droppedFile = files[0];  // Store the dropped file for later submission
        previewFile(droppedFile);  // Show a preview of the image
    }

    // Preview the image
    function previewFile(file) {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = () => {
            imagePreview.src = reader.result; // Display the image preview
        };
    }

    // Before submitting the form, manually append the dropped file to the input
    document.querySelector('form').addEventListener('submit', function(event) {
        if (droppedFile) {
            // Create a DataTransfer object to mimic user selection
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(droppedFile); // Add the dropped file

            // Assign the file to the file input
            fileInput.files = dataTransfer.files;
        }
    });
});
