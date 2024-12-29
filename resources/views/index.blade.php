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
                            <canvas id="myChart-year" style="width:100%;max-width:700px;padding:10px;"></canvas>
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                            <canvas id="myDoughnutChart-year"
                                style="width:100%;max-width:700px;padding:10px;"></canvas>
                        </div><!--//app-card-->
                    </div><!--//col-->
                </div><!--//row-->


                <div class="row g-4 mb-4" style="margin: 20px 0; gap: 20px;">

                    <div class="app-card app-card-basic align-items-start shadow-sm"
                        style="border: 1px solid #ddd; border-radius: 8px; padding: 20px; background-color: #f9f9f9;">
                        <div class="row mb-4 p-4"
                            style="display: flex; flex-direction: row; align-items: center; gap: 15px; padding: 0;">
                            <div class="form-group me-3"
                                style="display: flex; flex-direction: column; min-width: 150px;">
                                <label for="filterYear" style="font-weight: bold; margin-bottom: 5px;">Year:</label>
                                <select id="filterYear" class="form-control"
                                    style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                                    <option value="2023">2023</option>
                                    <option value="2024" selected>2024</option>
                                </select>
                            </div>
                            <div class="form-group me-3"
                                style="display: flex; flex-direction: column; min-width: 150px;">
                                <label for="filterType" style="font-weight: bold; margin-bottom: 5px;">Report
                                    Type:</label>
                                <select id="filterType" class="form-control"
                                    style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                                    <option value="weekly" selected>Weekly</option>
                                    <option value="monthly">Monthly</option>
                                </select>
                            </div>
                            <div class="form-group me-3"
                                style="display: flex; flex-direction: column; min-width: 150px;">
                                <label for="weekRange" style="font-weight: bold; margin-bottom: 5px;">Week
                                    Range:</label>
                                <select id="weekRange" class="form-control"
                                    style="border: 1px solid #ccc; border-radius: 4px; padding: 5px;">
                                    <option value="1-10">Week 1-10</option>
                                    <option value="11-20">Week 11-20</option>
                                    <option value="21-30">Week 21-30</option>
                                    <option value="31-40">Week 31-40</option>
                                    <option value="41-52">Week 41-52</option>
                                </select>
                            </div>
                            <button id="filterButton" class="btn btn-primary mt-2 text-white"
                                style="padding: 8px 15px; background-color: #007bff; border: none; border-radius: 4px; cursor: pointer;">Apply
                                Filters</button>
                        </div>
                        <canvas id="myChart"
                            style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px; background-color: #fff;"></canvas>
                    </div><!--//app-card-->

                </div>

                <div class="card-container p-4 card">
                    <div class="card-head mb-4">
                        <div class="row">
                            <!-- Start Date Picker -->
                            <div class="col-md-4">
                                <label for="startDate" class="form-label">Start Date</label>
                                <input type="date" id="startDate" class="form-control datepicker" placeholder="Select start date">
                            </div>

                            <!-- End Date Picker -->
                            <div class="col-md-4">
                                <label for="endDate" class="form-label">End Date</label>
                                <input type="date" id="endDate" class="form-control datepicker" placeholder="Select end date">
                            </div>

                            <!-- Fetch Report Button -->
                            <div class="col-md-4 d-flex align-items-end">
                                <button class="btn btn-primary w-100 text-white" onclick="fetchDataAndRenderChart()">Fetch Report</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <canvas id="paymentTypeChart" width="400" height="200"></canvas>
                    </div>
                </div>

                <script>
                    // Initialize Flatpickr Date Pickers with Default Dates
                    const today = new Date();
                    const oneWeekAgo = new Date();
                    oneWeekAgo.setDate(today.getDate() - 7);

                    flatpickr('#startDate', {
                        dateFormat: 'Y-m-d', // Format: YYYY-MM-DD
                        defaultDate: oneWeekAgo, // Set default date to 1 week ago
                        allowInput: true,
                    });

                    flatpickr('#endDate', {
                        dateFormat: 'Y-m-d', // Format: YYYY-MM-DD
                        defaultDate: today, // Set default date to today
                        allowInput: true,
                    });

                    async function fetchDataAndRenderChart() {
                        const apiUrl = 'https://rest.dicui.org/api/getReportPaymentType';

                        // Get selected dates
                        const startDate = document.getElementById('startDate').value;
                        const endDate = document.getElementById('endDate').value;

                        // Ensure dates are provided
                        if (!startDate || !endDate) {
                            alert('Please select both start and end dates.');
                            return;
                        }

                        // Example payload for the POST request
                        const requestData = {
                            startDate: startDate,
                            endDate: endDate,
                            restaurantId: "R1732246184" // Replace with dynamic restaurantId if needed
                        };

                        try {
                            // Fetch data from the API
                            const response = await fetch(apiUrl, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify(requestData)
                            });

                            const data = await response.json();
                            if (data.status === 'success') {
                                const chartData = data.data;

                                // Extract labels and values for the chart
                                const labels = chartData.map(item => item.payment_type);
                                const totalCounts = chartData.map(item => item.total_count);
                                const totalAmounts = chartData.map(item => item.total_amount);

                                // Render the chart
                                const ctx = document.getElementById('paymentTypeChart').getContext('2d');
                                new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: labels,
                                        datasets: [
                                            {
                                                label: 'Total Transactions',
                                                data: totalCounts,
                                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                borderColor: 'rgba(75, 192, 192, 1)',
                                                borderWidth: 1
                                            },
                                            {
                                                label: 'Total Amount (₹)',
                                                data: totalAmounts,
                                                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                                borderColor: 'rgba(153, 102, 255, 1)',
                                                borderWidth: 1
                                            }
                                        ]
                                    },
                                    options: {
                                        responsive: true,
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            } else {
                                console.error('Failed to fetch data:', data);
                            }
                        } catch (error) {
                            console.error('Error fetching data:', error);
                        }
                    }
                </script>








            </div><!--//container-fluid-->
        </div><!--//app-content-->


        <script type="text/javascript" src="{{ asset('assets/js/index-charts.js') }}?v={{ time() }}"></script>
        <script src="{{ asset('assets/js/index-chart-2.js') }}?v={{ time() }}"></script>
    </div><!--//app-wrapper-->
    @include('partials.footer')
</body>

</html>
