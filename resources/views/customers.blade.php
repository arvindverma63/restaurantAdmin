<!DOCTYPE html>
<html lang="en">
@include('partials.head')

<body class="app bg-light">
    @include('partials.header')

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                

                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body" style="padding: 20px;">
                                <div class="table-responsive">
                                    <table class="table app-table-hover table-bordered mb-0 text-left" id="stocks-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Social Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="customers-tbody">
                                            
                                            <!-- Display Data when fetched from the server -->
                                            @forelse ($data as $customer)
                                                <tr>
                                                    <td>{{ $customer['id'] }}</td>
                                                    <td>{{ $customer['name'] ?? 'N/A' }}</td>
                                                    <td>{{ $customer['email'] ?? 'N/A' }}</td>
                                                    <td>{{ $customer['phoneNumber'] ?? 'N/A' }}</td>
                                                    <td>
                                                        @if($customer['phoneNumber'] != null)
                                                            <a href="https://wa.me/+91{{ $customer['phoneNumber'] }}" target="_blank">
                                                                <i class="fa-brands fa-whatsapp"></i>
                                                            </a>
                                                        @endif
                                                        @if($customer['email'] != null)
                                                            <a href="mailto:{{ $customer['email'] }}">
                                                                <i class="fa-regular fa-envelope"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">No customers found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')

    

</body>
</html>
