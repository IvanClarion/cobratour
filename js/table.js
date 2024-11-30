// Get the button and section elements
const statisticsBtn = document.getElementById('statistics-btn');
const feedbackBtn = document.getElementById('feedback-btn');
const statisticsDisplay = document.querySelector('.statistics-display');
const feedbackDisplay = document.querySelector('.feedback-display');
const ratingDisplay = document.querySelector('.feedback-display1');
const ratingBtn = document.getElementById('rating-btn');

// Event listener for statistics button
statisticsBtn.addEventListener('click', () => {
    // Show statistics and hide feedback
    statisticsDisplay.style.display = 'block';
    feedbackDisplay.style.display = 'none';
    ratingDisplay.style.display = 'none';
});

// Event listener for feedback button
feedbackBtn.addEventListener('click', () => {
    // Show feedback and hide statistics
    feedbackDisplay.style.display = 'block';
    statisticsDisplay.style.display = 'none';
    ratingDisplay.style.display = 'none';
});
ratingBtn.addEventListener('click', () => {
    // Show feedback and hide statistics
    feedbackDisplay.style.display = 'none';
    statisticsDisplay.style.display = 'none';
    ratingDisplay.style.display = 'block'; 
});
