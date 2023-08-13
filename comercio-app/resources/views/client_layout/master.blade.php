<!-- This is main configuration File -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/uploads/favicon.png') }}">
    <!-- Stylesheets -->
    @include('client_layout.style')
    <title>@yield('title')</title>
    <meta name="keywords" content="online fashion store, garments shop, online garments">
    <meta name="description" content="ecommerce php project with mysql database">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script type="text/javascript"
        src="//platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons">
    </script>
</head>

<body>

    {{-- start header --}}
    @include('client_layout.header')
    {{-- end header --}}

    {{-- start content --}}

    @yield('content')

    {{-- end content --}}

    <!-- start footer -->
    @include('client_layout.footer')
    <!-- end footer -->

    <a href="#" class="scrollup">
        <i class="fa fa-angle-up"></i>
    </a>
    @include('client_layout.scripts')
</body>

</html>
