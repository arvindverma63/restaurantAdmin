<!DOCTYPE html>
<html lang="en">
@include('partials.head')

<body class="app">
    @include('partials.header')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container">
                <div class="row">
                    <!-- Feedback Details -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Customer Feedback</h5>
                                <button class="btn btn-sm btn-secondary">Refresh</button>
                            </div>
                            <div class="card-body feedback-details">
                                <!-- Feedback Item -->
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="https://via.placeholder.com/60" class="rounded-circle me-3" alt="User">
                                            <div>
                                                <h6 class="mb-0">John Doe</h6>
                                                <p class="mb-0 text-muted">1234567890 | john.doe@example.com</p>
                                            </div>
                                        </div>
                                        <h6>Feedback</h6>
                                        <p class="bg-light p-2 rounded">Great service and food quality!</p>
                                        <small class="text-muted">Date: 2024-12-01 10:15 AM</small>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="https://via.placeholder.com/60" class="rounded-circle me-3" alt="User">
                                            <div>
                                                <h6 class="mb-0">Jane Smith</h6>
                                                <p class="mb-0 text-muted">9876543210 | jane.smith@example.com</p>
                                            </div>
                                        </div>
                                        <h6>Feedback</h6>
                                        <p class="bg-light p-2 rounded">Loved the ambiance!</p>
                                        <small class="text-muted">Date: 2024-12-02 02:25 PM</small>
                                    </div>
                                </div>
                                <!-- Add more feedback items here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')

    <!-- Add custom styles -->
    <style>
        .feedback-details {
            height: auto;
            overflow-y: auto;
            background-color: #f8f9fa;
            padding: 10px;
        }
        .card-body img {
            width: 60px;
            height: 60px;
        }
        .card-body {
            padding: 1.5rem;
            background: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</body>
</html>
