document.addEventListener('DOMContentLoaded', function () {
    // Hardcoded data (replacing the PHP fetch part)
    const data = {
        labels: ['Very Bad', 'Bad', 'Neutral', 'Good', 'Very Good'],
        data: [120, 90, 30, 10, 5] // Replace with your actual data
    };

    const ctxTotalUser = document.getElementById('total_rating').getContext('2d');

    const configTotalUser = {
        type: 'bar',
        data: {
            labels: data.labels, // Use hardcoded labels
            datasets: [{
                label: "Building Rating",
                data: data.data, // Use hardcoded data
                backgroundColor: [
                    'rgb(255, 99, 132)',   // Solid red
                    'rgb(54, 162, 235)',   // Solid blue
                    'rgb(255, 206, 86)',   // Solid yellow
                    'rgb(75, 192, 192)',   // Solid green
                    'rgb(153, 102, 255)',  // Solid purple
                    'rgb(255, 159, 64)'    // Solid orange
                ],
                borderColor: [
                    'rgb(255, 99, 132)',   // Solid red
                    'rgb(54, 162, 235)',   // Solid blue
                    'rgb(255, 206, 86)',   // Solid yellow
                    'rgb(75, 192, 192)',   // Solid green
                    'rgb(153, 102, 255)',  // Solid purple
                    'rgb(255, 159, 64)'    // Solid orange
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Building Rating', // Add the title here
                    font: {
                        size: 20 // Customize the font size if needed
                    }
                }
            }
        }
    };

    new Chart(ctxTotalUser, configTotalUser);
});
