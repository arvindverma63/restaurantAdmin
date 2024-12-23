let chartData = {}; // Variable to store pre-fetched data

var year = currentTime.getFullYear();
                    document.getElementById('filterButton').addEventListener('click', () => {
                        const reportType = document.getElementById('filterType').value;
                        year = document.getElementById("filterYear").value;
                        const weekRange = document.getElementById('weekRange').value.split('-').map(
                        Number); // Get week range as an array
                        filterDataAndRenderCharts(reportType, weekRange);
                    });



                    function fetchDataOnce(restaurantId, year) {

                        fetch(`https://rest.dicui.org/api/dashboard/weekly-chart-data?year=${year}&restaurantId=${restaurantId}`)
                            .then(response => response.json())
                            .then(data => {
                                chartData = data; // Store the full dataset for later filtering
                                filterDataAndRenderCharts('weekly', [1, 10]); // Render the default view (Week 1-10)
                            })
                            .catch(error => {
                                console.error('Error fetching the chart data:', error);
                            });
                    }

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
                            filteredLabels = ['Month 1', 'Month 2', 'Month 3', 'Month 4', 'Month 5', 'Month 6', 'Month 7', 'Month 8',
                                'Month 9', 'Month 10', 'Month 11', 'Month 12'
                            ];
                            filteredDatasets = chartData.datasets.map(dataset => {
                                const monthlyData = Array(12).fill(0);
                                dataset.data.forEach((value, index) => {
                                    const monthIndex = Math.floor(index / 4); // Group every 4 weeks into a month
                                    if (monthIndex < 12) monthlyData[monthIndex] += parseFloat(value) || 0;
                                });
                                return {
                                    ...dataset,
                                    data: monthlyData
                                };
                            });
                        }

                        renderCharts(filteredLabels, filteredDatasets, reportType);
                    }

                    function renderCharts(labels, datasets, reportType) {
                        const brightColors = [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ];
                        const brightBackgroundColors = brightColors.map(color => color.replace('1)', '0.2)'));

                        const ctxBar = document.getElementById('myChart').getContext('2d');
                        if (window.myBarChart) {
                            window.myBarChart.destroy();
                        }
                        window.myBarChart = new Chart(ctxBar, {
                            type: 'bar',
                            data: {
                                labels,
                                datasets
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top'
                                    },
                                    title: {
                                        display: true,
                                        text: `${reportType.charAt(0).toUpperCase() + reportType.slice(1)} Data Overview`
                                    }
                                },
                                scales: {
                                    x: {
                                        title: {
                                            display: true,
                                            text: reportType === 'weekly' ? 'Week' : 'Month'
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
                    }


