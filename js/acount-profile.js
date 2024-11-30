document.getElementById('edit-profile').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent form submission
    document.getElementById('file-input').click();
});

// Trigger form submission when a file is selected
document.getElementById('file-input').addEventListener('change', function() {
    // Show the selected file as the new profile picture immediately
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profile-picture').src = e.target.result; // Update the profile picture immediately
        }
        reader.readAsDataURL(file);
    }
    document.getElementById('profileForm').submit();
});
