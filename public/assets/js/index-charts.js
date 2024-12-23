
const ctx = document.getElementById('myChart').getContext('2d');

fetch('/getAuth')
.then(response=>response.json())
.then(data=>{
    indexChart(data.restaurantId);
    indexChartWeek(data.restaurantId);
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

function indexChartWeek(restaurantId) {
    // Ensure `restaurantId` is provided
    if (!restaurantId) {
        console.error('Restaurant ID is required.');
        return;
    }

    // Define bright colors for charts
    const brightColors = [
        'rgba(255, 99, 132, 1)',  // Bright Pink
        'rgba(54, 162, 235, 1)',  // Bright Blue
        'rgba(255, 206, 86, 1)',  // Bright Yellow
        'rgba(75, 192, 192, 1)',  // Bright Teal
        'rgba(153, 102, 255, 1)', // Bright Purple
        'rgba(255, 159, 64, 1)'   // Bright Orange
    ];
    const brightBackgroundColors = brightColors.map(color => color.replace('1)', '0.2)')); // Transparent versions

    // Fetch data from the API
    fetch(`https://rest.dicui.org/api/dashboard/weekly-chart-data?year=2024&restaurantId=${restaurantId}`)
        .then(response => response.json())
        .then(data => {
            // Ensure data.labels and data.datasets exist
            if (!data.labels || !data.datasets) {
                console.error('Invalid data format:', data);
                return;
            }

            // Prepare the chart data
            const chartData = {
                labels: data.labels, // Weekly labels (e.g., "Week 1", "Week 2", ...)
                datasets: data.datasets.map((dataset, index) => ({
                    label: dataset.label,
                    data: dataset.data.map(value => parseFloat(value) || 0), // Convert data to numbers
                    borderColor: brightColors[index % brightColors.length], // Bright border color
                    backgroundColor: brightBackgroundColors[index % brightBackgroundColors.length], // Bright fill color
                    fill: false // Ensure no area fill for line charts
                }))
            };

            // Bar Chart Context
            const ctx2 = document.getElementById('myBarChart-week').getContext('2d');

            // Destroy existing chart if it exists (to avoid overlay issues)
            if (window.myBarChart) {
                window.myBarChart.destroy();
            }

            // Create a bar chart
            window.myBarChart = new Chart(ctx2, {
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
                            text: 'Weekly Data Overview'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Week'
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

            // Doughnut Chart Context
            const doughnutCtx = document.getElementById('myDoughnutChart-week').getContext('2d');

            // Destroy existing doughnut chart if it exists
            if (window.myDoughnutChart) {
                window.myDoughnutChart.destroy();
            }

            // Prepare Doughnut Chart Data (use first dataset for simplicity)
            const doughnutData = {
                labels: data.labels, // Weekly labels
                datasets: [{
                    label: 'Weekly Breakdown',
                    data: data.datasets[0].data.map(value => parseFloat(value) || 0), // First dataset for simplicity
                    backgroundColor: brightColors // Bright colors for segments
                }]
            };

            // Create a doughnut chart
            window.myDoughnutChart = new Chart(doughnutCtx, {
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
                            text: 'Doughnut Chart - Weekly Data'
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error fetching the chart data:', error);
        });
}
