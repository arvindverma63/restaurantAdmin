<!DOCTYPE html>
<html lang="en">
@include('partials.head')

<body class="app">
    @include('partials.header')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">

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
