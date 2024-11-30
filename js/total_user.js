document.addEventListener('DOMContentLoaded', function () {
    // Fetch the satisfaction data from the PHP script
    fetch('chart_total.php')
        .then(response => response.json())
        .then(data => {
            const ctxTotalUser = document.getElementById('total_user').getContext('2d');
            
            const configTotalUser = {
                type: 'bar',
                data: {
                    labels: data.labels, // Use labels from the PHP data
                    datasets: [{
                        label: "Feedback",
                        data: data.data, // Use the data from the PHP script
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
                            text: 'User Feedback', // Add your custom title here
                            font: {
                                size: 18 // You can adjust the title font size as needed
                            }
                        }
                    }
                }
            };
            new Chart(ctxTotalUser, configTotalUser);
        })
        .catch(error => console.error('Error fetching the data:', error));
  });
  