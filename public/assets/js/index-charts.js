
const ctx = document.getElementById('myChart').getContext('2d');

fetch('/getAuth')
.then(response=>response.json())
.then(data=>{
    indexChart(data.restaurantId);
})

// Define a set of bright colors explicitly
const brightColors = [
    'rgb(255, 0, 55)', // Bright Pink
    'rgb(0, 153, 255)', // Bright Blue
    'rgb(255, 183, 0)', // Bright Yellow
    'rgb(0, 255, 255)', // Bright Teal
    'rgb(85, 0, 255)', // Bright Purple
    'rgb(255, 128, 0)',// Bright Orange
    'rgb(184, 5, 44)', // Bright Pink
    'rgb(0, 117, 196)', // Bright Blue
    'rgb(206, 147, 0)', // Bright Yellow
    'rgb(0, 255, 255)', // Bright Teal
    'rgb(85, 0, 255)', // Bright Purple
    'rgb(255, 128, 0)' // Bright Orange
];

const brightBackgroundColors = [
    'rgb(255, 0, 55)', // Bright Pink
    'rgb(0, 153, 255)', // Bright Blue
    'rgb(255, 183, 0)', // Bright Yellow
    'rgb(0, 255, 255)', // Bright Teal
    'rgb(85, 0, 255)', // Bright Purple
    'rgb(255, 128, 0)',// Bright Orange
    'rgb(184, 5, 44)', // Bright Pink
    'rgb(0, 117, 196)', // Bright Blue
    'rgb(206, 147, 0)', // Bright Yellow
    'rgb(0, 255, 255)', // Bright Teal
    'rgb(85, 0, 255)', // Bright Purple
    'rgb(255, 128, 0)' // Bright Orange
];

function indexChart(restaurantId){
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

}

indexChart();
