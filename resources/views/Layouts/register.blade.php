<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UJIKOM</title>
    <!-- Favicon -->
    {{-- <link rel="shortcut icon" href="images/logo_2.png" /> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/bootstrap.min.css">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/typography.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/responsive.css">
</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
            <div class="loader">
                <div class="cube">
                    <div class="sides">
                        <div class="top"></div>
                        <div class="right"></div>
                        <div class="bottom"></div>
                        <div class="left"></div>
                        <div class="front"></div>
                        <div class="back"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- loader END -->
    @yield('content')
    <!-- Optional JavaScript -->
    @include('layouts.dashboard._foot')
</body>

</html>
