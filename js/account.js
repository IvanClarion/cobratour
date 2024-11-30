document.getElementById('viewButton1').addEventListener('click', function() {
    var form = document.getElementById('newUsername');
    // Toggle the form's display style
    if (form.style.display === "none" || form.style.display === "") {
        form.style.display = "block"; // Show the form
    } else {
        form.style.display = "none"; // Hide the form
    }
});

document.getElementById('viewButton2').addEventListener('click', function() {
    const passwordForm = document.getElementById('newPassword');
    const passwordDisplay = document.querySelector('.password-display');

    // Toggle the form visibility
    const isFormVisible = passwordForm.style.display === 'block';
    passwordForm.style.display = isFormVisible ? 'none' : 'block';
    passwordDisplay.style.display = isFormVisible ? 'block' : 'none';
});