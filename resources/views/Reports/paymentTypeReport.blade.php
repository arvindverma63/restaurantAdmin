<!DOCTYPE html>
<html lang="en">
@include('partials.head')

<body class="app">
    @include('partials.header')

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container card">
                <div class="table-responsive p-4">
                    <table class="table app-table-hover table-bordered mb-0 text-left" id="stocks-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Total Earn</th>
                                <th>Payment Type</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody id="customers-tbody">
                            @foreach ($data as $index => $d)
                            <tr>
                                <td>{{ $index + 1 }}</td> <!-- Display count directly from loop -->
                                <td>{{ $d['total'] ?? 'N/A' }}</td>
                                <td>{{ $d['payment_type'] ?? 'N/A' }}</td>
                                <td>{{ $d['day'] ?? 'N/A' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')

</body>
</html>
