// JavaScript
document.getElementById('logout').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default link behavior

    // Create a form element
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'logout.php'; // Your logout script

    // Append the form to the body and submit it
    document.body.appendChild(form);
    form.submit();
});
