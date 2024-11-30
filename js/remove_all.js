document.getElementById('removeall-btn').addEventListener('click', function() {
    document.getElementById('remove-form').style.display = 'flex'; // Show the section
});
//X-MARK
document.getElementById('deletemark').addEventListener('click', function() {
    document.getElementById('remove-form').style.display = 'none';
});
//cancel
document.getElementById('CancelFile').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default form submission
    document.getElementById('remove-form').style.display = 'none';
});
