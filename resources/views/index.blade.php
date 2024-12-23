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
                            <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                            <canvas id="myDoughnutChart" style="width:100%;max-width:700px"></canvas>
                        </div><!--//app-card-->
                    </div><!--//col-->
                </div><!--//row-->

            </div><!--//container-fluid-->
        </div><!--//app-content-->


        <script type="text/javascript" src="{{asset('assets/js/index-charts.js')}}?v={{time()}}"></script>

    </div><!--//app-wrapper-->
    @include('partials.footer')
</body>

</html>
