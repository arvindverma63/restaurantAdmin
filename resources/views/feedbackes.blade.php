<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="app">
    @include('partials.header')

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row">
                    <!-- Feedback Details -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Customer Feedback</h5>
                                <button class="btn btn-sm btn-secondary" onclick="location.reload()">Refresh</button>
                            </div>
                            <div class="card-body feedback-details">
                                <!-- Feedback Items -->
                                @foreach ($data as $feedback)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="https://via.placeholder.com/60" class="rounded-circle me-3" alt="User">
                                            <div>
                                                <h6 class="mb-0">{{ $feedback['customerName'] }}</h6>
                                                <p class="mb-0 text-muted">
                                                    {{ $feedback['phoneNumber'] }}
                                                    @if($feedback['email']) | {{ $feedback['email'] }} @endif
                                                </p>
                                            </div>
                                        </div>
                                        <h6>Feedback</h6>
                                        <p class="bg-light p-2 rounded">{{ $feedback['feedback'] }}</p>
                                        @if($feedback['short'])
                                        <p class="bg-light p-2 rounded">{{ $feedback['short'] }}</p>
                                        @endif
                                        <small class="text-muted">
                                            Date: {{ \Carbon\Carbon::parse($feedback['date'])->format('Y-m-d H:i A') }}
                                        </small>
                                    </div>
                                </div>
                                @endforeach
                                <!-- End Feedback Items -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
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

@include('partials.footer')
</html>
