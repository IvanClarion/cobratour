document.addEventListener('DOMContentLoaded', function() {
    // Get all buttons with the class 'map-button'
    const viewButtons = document.querySelectorAll('.map-button');
    
    // Loop through each button
    viewButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Find the corresponding container for this button
            const mapContainer = this.closest('.map-container').nextElementSibling;
            
            // Toggle display between 'block' and 'none'
            if (mapContainer.style.display === 'block') {
                mapContainer.style.display = 'none';  // Hide the section
            } else {
                mapContainer.style.display = 'block'; // Show the section
            }
        });
    });
});

document.getElementById('add-map').addEventListener('click', function() {
    const mapSection = document.getElementById('show-form1');
    if (mapSection.style.display === 'flex') {
        mapSection.style.display = 'none';  // Hide the section
    } else {
        mapSection.style.display = 'flex'; // Show the section
    }
});
document.getElementById('map-esc').addEventListener('click', function() {
    document.getElementById('show-form1').style.display = 'none';
});
document.getElementById('removeall-map').addEventListener('click', function() {
    document.getElementById('discard-map').style.display = 'flex';
});
document.getElementById('deletemark').addEventListener('click', function() {
    document.getElementById('discard-map').style.display = 'none';
});