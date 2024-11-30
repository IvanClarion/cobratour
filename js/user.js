const ctx = document.getElementById('Users').getContext('2d');

// Fetch the data from the PHP endpoint
fetch('chart_user.php') // Replace with the actual path to your PHP file
    .then(response => response.json())
    .then(data => {
        // Extract labels and convert counts to numbers from the JSON response
        const labels = data.map(item => item.classification);
        const counts = data.map(item => parseInt(item.count, 10)); // Convert count to integer

        // Create the chart
        const chartData = {
            labels: labels,
            datasets: [{
                label: 'Users',
                data: counts,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 10
            }]
        };

        const config = {
            type: 'doughnut',
            data: chartData,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'User Classifications', // The title you want to display
                        font: {
                            size: 18 // Adjust the size as needed
                        }
                    }
                }
            }
        };

        new Chart(ctx, config);
    })
    .catch(error => console.error('Error fetching the data:', error));
