// Toggle the form when "Add" button is clicked
document.getElementById('add-btn').addEventListener('click', function() {
  var addSec = document.querySelector('.add-sec');
  var addContainer = document.querySelector('.add-container');
  var body = document.body;

  // Check the display status of the section
  if (addSec.style.display === 'none' || addSec.style.display === '') {
      addSec.style.display = 'flex';   // Show the section
      addContainer.style.display = 'block'; // Ensure the container is visible
      body.classList.add('active');
  } else {
      addSec.style.display = 'none';   // Hide the section
      body.classList.remove('active');
  }
});

// Hide the form when the "X" mark is clicked
document.getElementById('escape').addEventListener('click', function() {
  var addContainer = document.querySelector('.add-container');
  var addSec = document.querySelector('.add-sec');

  // Hide the entire section and container
  addSec.style.display = 'none';
  addContainer.style.display = 'none';
});

// Handle file selection
document.getElementById('file-input').addEventListener('change', function(event) {
  var file = event.target.files[0]; // Get the selected file
  if (file) {
      var reader = new FileReader(); // Create a FileReader to read the file
      reader.onload = function(e) {
          var newImageSrc = e.target.result; // Get the file data as a data URL
          document.querySelector('.add-img2').src = newImageSrc; // Replace the first image
      };
      reader.readAsDataURL(file); // Read the file as a data URL
  }
});


