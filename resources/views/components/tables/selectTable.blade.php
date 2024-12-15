<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="app">
    @include('partials.header')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container">
                <center>
                    <h3>Select Table To Generate Bill <i class="fa-solid fa-qrcode"></i></h3>
                </center>
                <div class="row g-3 mt-3">
                    <!-- Loop to dynamically generate cards -->
                    @foreach ($data as $qr)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-2">
                            <div class="dropdown">
                                <a href="/till?tableNumber={{$qr['tableNumber']}}">

                                    <div class="card text-center" style="width: 100px; height: 100px; margin: auto;">
                                        <div class="card-body d-flex align-items-center justify-content-center">
                                            <h5 class="card-title">{{ $qr['tableNumber'] }}</h5>
                                        </div>
                                    </div>

                                </a>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2">
                        <div class="dropdown">
                            <a href="/till?tableNumber=0">

                                <div class="card text-center" style="width: 100px; height: 100px; margin: auto;">
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <h5 class="card-title">Take Away</h5>
                                    </div>
                                </div>

                            </a>
                        </div>
                    </div>
                </div>
            </div><!--//container-->
        </div><!--//app-content-->
    </div><!--//app-wrapper-->
    @include('partials.footer')

</body>

</html>
