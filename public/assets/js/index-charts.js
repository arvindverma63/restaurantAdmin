let restaurantId;

const ctx = document.getElementById('myChart').getContext('2d');

fetch('/getAuth')
.then(response=>response.json())
.then(data=>{
    console.log(data);
    restaurantId = data.restaurantId;
});

// Define a set of bright colors explicitly
const brightColors = [
    'rgba(255, 99, 132, 1)', // Bright Pink
    'rgba(54, 162, 235, 1)', // Bright Blue
    'rgba(255, 206, 86, 1)', // Bright Yellow
    'rgba(75, 192, 192, 1)', // Bright Teal
    'rgba(153, 102, 255, 1)', // Bright Purple
    'rgba(255, 159, 64, 1)' // Bright Orange
];

const brightBackgroundColors = [
    'rgba(255, 99, 132, 0.5)', // Transparent Bright Pink
    'rgba(54, 162, 235, 0.5)', // Transparent Bright Blue
    'rgba(255, 206, 86, 0.5)', // Transparent Bright Yellow
    'rgba(75, 192, 192, 0.5)', // Transparent Bright Teal
    'rgba(153, 102, 255, 0.5)', // Transparent Bright Purple
    'rgba(255, 159, 64, 0.5)' // Transparent Bright Orange
];

// Fetch data from the API
fetch('https://rest.dicui.org/api/dashboard/chart-data?year=2024&restaurantId='+restaurantId)
    .then(response => response.json())
    .then(data => {
        // Ensure data.labels and data.datasets exist
        if (!data.labels || !data.datasets) {
            console.error('Invalid data format:', data);
            return;
        }

        const chartData = {
            labels: data.labels,
            datasets: data.datasets.map((dataset, index) => ({
                label: dataset.label,
                data: dataset.data.map(value => parseFloat(value) || 0),
                borderColor: brightColors[index % brightColors.length], // Bright border color
                backgroundColor: brightBackgroundColors[index % brightBackgroundColors
                .length], // Bright fill color
                fill: dataset.fill
            }))
        };

        // Create a bar chart
        const myBarChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Monthly Data Overview'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Values'
                        }
                    }
                }
            }
        });

        // Create a doughnut chart
        const doughnutCtx = document.getElementById('myDoughnutChart').getContext('2d');
        const doughnutData = {
            labels: data.labels,
            datasets: [{
                label: 'Doughnut Data',
                data: data.datasets[0].data.map(value => parseFloat(value) || 0),
                backgroundColor: brightColors // Use bright colors for doughnut segments
            }]
        };

        const myDoughnutChart = new Chart(doughnutCtx, {
            type: 'doughnut',
            data: doughnutData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Doughnut Chart Example'
                    }
                }
            }
        });
    })
    .catch(error => {
        console.error('Error fetching the chart data:', error);
    });
