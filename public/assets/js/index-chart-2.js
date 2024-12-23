let chartData = {}; // Global variable to store pre-fetched data
const currentYear = new Date().getFullYear(); // Get current year
let year = currentYear;

// Event listener for the "Apply Filters" button
document.getElementById('filterButton').addEventListener('click', () => {
    const reportType = document.getElementById('filterType').value;
    year = document.getElementById("filterYear").value || currentYear;
    const weekRange = document.getElementById('weekRange').value.split('-').map(Number); // Parse week range
    filterDataAndRenderCharts(reportType, weekRange);
});

// Fetch data once and initialize default view
function fetchDataOnce(restaurantId, year) {
    fetch(`https://rest.dicui.org/api/dashboard/weekly-chart-data?year=${year}&restaurantId=${restaurantId}`)
        .then(response => response.json())
        .then(data => {
            if (!data.labels || !data.datasets) {
                console.error('Invalid data format from API.');
                return;
            }
            chartData = data; // Store the full dataset
            filterDataAndRenderCharts('weekly', [1, 10]); // Default view: Week 1-10
        })
        .catch(error => {
            console.error('Error fetching chart data:', error);
        });
}

// Filter and render the data
function filterDataAndRenderCharts(reportType, weekRange) {
    if (!chartData.labels || !chartData.datasets) {
        console.error('No data available for filtering.');
        return;
    }

    let filteredLabels = [];
    let filteredDatasets = [];

    if (reportType === 'weekly') {
        filteredLabels = chartData.labels.filter((label, index) => {
            const week = index + 1;
            return week >= weekRange[0] && week <= weekRange[1];
        });

        filteredDatasets = chartData.datasets.map(dataset => ({
            ...dataset,
            data: dataset.data.filter((_, index) => {
                const week = index + 1;
                return week >= weekRange[0] && week <= weekRange[1];
            })
        }));
    } else if (reportType === 'monthly') {
        filteredLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dev'];

        filteredDatasets = chartData.datasets.map(dataset => {
            const monthlyData = Array(12).fill(0);
            dataset.data.forEach((value, index) => {
                const monthIndex = Math.floor(index / 4); // Group every 4 weeks into a month
                if (monthIndex < 12) monthlyData[monthIndex] += parseFloat(value) || 0;
            });
            return { ...dataset, data: monthlyData };
        });
    }

    renderCharts(filteredLabels, filteredDatasets, reportType);
}

// Render charts using Chart.js
function renderCharts(labels, datasets, reportType) {
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
    const brightBackgroundColors = brightColors.map(color => color.replace('1)', '0.2)'));

    const ctxBar = document.getElementById('myChart').getContext('2d');
    if (window.myBarChart) {
        window.myBarChart.destroy();
    }
    window.myBarChart = new Chart(ctxBar, {
        type: 'bar',
        data: { labels, datasets },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: {
                    display: true,
                    text: `${reportType.charAt(0).toUpperCase() + reportType.slice(1)} Data Overview (${year})`
                }
            },
            scales: {
                x: {
                    title: { display: true, text: reportType === 'weekly' ? 'Week' : 'Month' }
                },
                y: {
                    title: { display: true, text: 'Values' }
                }
            }
        }
    });
}

