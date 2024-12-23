<!DOCTYPE html>
<html lang="en">
@include('partials.head')

<body class="app">
    @include('partials.header')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Overview</h1>

                <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                    <div class="inner">
                        <div class="app-card-body p-3 p-lg-4">
                            <h3 class="mb-3">Welcome, DQ!</h3>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div><!--//app-card-body-->

                    </div><!--//inner-->
                </div><!--//app-card-->

                <div class="row g-4 mb-4">
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Sales</h4>
                                <div class="stats-figure" id="todayCollection">₹0</div>
                                <div class="stats-meta text-success">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Invoices</h4>
                                <div class="stats-figure" id="totalInvoiceToday">0</div>
                                <div class="stats-meta">New</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Completed Orders</h4>
                                <div class="stats-figure" id="totalCompleteOrder">0</div>
                                <div class="stats-meta">Completed</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Rejected Orders</h4>
                                <div class="stats-figure" id="totalRejectOrder">0</div>
                                <div class="stats-meta">Rejected</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- weekly report -->
                <div class="row g-4 mb-4">
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Weekly Sales</h4>
                                <div class="stats-figure" id="weeklyCollection">₹0</div>
                                <div class="stats-meta text-success">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Weekly Invoices</h4>
                                <div class="stats-figure" id="weeklyInvoice">0</div>
                                <div class="stats-meta">New</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Weekly Completed Orders</h4>
                                <div class="stats-figure" id="weeklyComplete">0</div>
                                <div class="stats-meta">Completed</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Weekly Rejected Orders</h4>
                                <div class="stats-figure" id="weeklyReject">0</div>
                                <div class="stats-meta">Rejected</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- monthly report -->
                <div class="row g-4 mb-4">
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Monthly Sales</h4>
                                <div class="stats-figure" id="monthlyCollection">₹0</div>
                                <div class="stats-meta text-success">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Monthly Invoices</h4>
                                <div class="stats-figure" id="monthlyInvoice">0</div>
                                <div class="stats-meta">New</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Monthly Complete Orders</h4>
                                <div class="stats-figure" id="monthlyComplete">0</div>
                                <div class="stats-meta">Completed</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Monthly Rejected Orders</h4>
                                <div class="stats-figure" id="monthlyReject">0</div>
                                <div class="stats-meta">Rejected</div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="{{ asset('assets/js/reports/stats.js') }}?v={{ time() }}"></script>
                <div class="row g-4 mb-4">
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                            <canvas id="myChart" style="width:100%;max-width:700px;padding:10px;"></canvas>
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                            <canvas id="myDoughnutChart" style="width:100%;max-width:700px;padding:10px;"></canvas>
                        </div><!--//app-card-->
                    </div><!--//col-->
                </div><!--//row-->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex align-items-center">
                            <div class="form-group me-3">
                                <label for="filterYear">Year:</label>
                                <select id="filterYear" class="form-control">
                                    <option value="2023">2023</option>
                                    <option value="2024" selected>2024</option>
                                </select>
                            </div>
                            <div class="form-group me-3">
                                <label for="filterRestaurant">Restaurant:</label>
                                <input id="filterRestaurant" type="text" class="form-control"
                                    placeholder="Enter Restaurant ID" value="R1732246184" />
                            </div>
                            <div class="form-group me-3">
                                <label for="filterType">Report Type:</label>
                                <select id="filterType" class="form-control">
                                    <option value="weekly" selected>Weekly</option>
                                    <option value="monthly">Monthly</option>
                                </select>
                            </div>
                            <button id="filterButton" class="btn btn-primary mt-2">Apply Filters</button>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                            <canvas id="myChart" style="width:100%;max-width:700px;padding:10px;"></canvas>
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                            <canvas id="myDoughnutChart" style="width:100%;max-width:700px;padding:10px;"></canvas>
                        </div><!--//app-card-->
                    </div><!--//col-->
                </div>


                <script>
                    let chartData = {}; // Variable to store pre-fetched data

                    document.getElementById('filterButton').addEventListener('click', () => {
                        const reportType = document.getElementById('filterType').value;
                        filterDataAndRenderCharts(reportType);
                    });

                    function fetchDataOnce(restaurantId, year) {
                        fetch(`https://rest.dicui.org/api/dashboard/weekly-chart-data?year=${year}&restaurantId=${restaurantId}`)
                            .then(response => response.json())
                            .then(data => {
                                chartData = data; // Store the full dataset for later filtering
                                filterDataAndRenderCharts('weekly'); // Render the default view (weekly)
                            })
                            .catch(error => {
                                console.error('Error fetching the chart data:', error);
                            });
                    }

                    function filterDataAndRenderCharts(reportType) {
                        if (!chartData.labels || !chartData.datasets) {
                            console.error('No data available for filtering.');
                            return;
                        }

                        let filteredLabels = [];
                        let filteredDatasets = [];

                        if (reportType === 'weekly') {
                            filteredLabels = chartData.labels; // Weekly labels (e.g., "Week 1", "Week 2", ...)
                            filteredDatasets = chartData.datasets.map(dataset => ({
                                ...dataset,
                                data: dataset.data // Use the full weekly data
                            }));
                        } else if (reportType === 'monthly') {
                            // Group data into months by summing every 4 weeks
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

                        const doughnutCtx = document.getElementById('myDoughnutChart').getContext('2d');
                        if (window.myDoughnutChart) {
                            window.myDoughnutChart.destroy();
                        }
                        const doughnutData = {
                            labels,
                            datasets: [{
                                label: `${reportType.charAt(0).toUpperCase() + reportType.slice(1)} Breakdown`,
                                data: datasets[0].data,
                                backgroundColor: brightColors
                            }]
                        };
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
                                        text: `Doughnut Chart - ${reportType.charAt(0).toUpperCase() + reportType.slice(1)} Data`
                                    }
                                }
                            }
                        });
                    }

                    // Fetch data once and initialize charts
                    fetchDataOnce('R1732246184', '2024');
                </script>


            </div><!--//container-fluid-->
        </div><!--//app-content-->


        <script type="text/javascript" src="{{ asset('assets/js/index-charts.js') }}?v={{ time() }}"></script>

    </div><!--//app-wrapper-->
    @include('partials.footer')
</body>

</html>
