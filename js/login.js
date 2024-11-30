document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const formData = new FormData(this);
    
    fetch('index.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // Parse JSON response
    .then(data => {
        if (data.success) {
            // Redirect to the dashboard
            window.location.href = 'dashboard.html';
        } else {
            // Show error message
            const errorMessage = document.getElementById('error-message');
            errorMessage.textContent = data.message;
            errorMessage.style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error); // Catch and log errors from fetch request
    });
});
