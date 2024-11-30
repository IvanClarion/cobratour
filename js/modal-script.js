document.getElementById('profile-btn').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default form submission behavior
    document.getElementById('main_profile').click(); // Trigger file input click
});