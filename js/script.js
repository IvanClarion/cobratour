
document.getElementById('edit-view').addEventListener('click', function() {
    const mapSection = document.getElementById('contents');
    if (mapSection.style.display === 'none') {
        mapSection.style.display = 'block';  // Hide the section
    } else {
        mapSection.style.display = 'none'; // Show the section
    }
});