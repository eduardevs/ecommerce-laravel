<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @include('admin_layout.styles')
</head>

<body class="hold-transition fixed skin-blue sidebar-mini">
    <div class="wrapper">

        @include('admin_layout.header')
        @include('admin_layout.sidebar')
        {{-- start content --}}


        {{-- endcontent --}}
        @yield('content')
        <!-- end content -->
    </div>
    @include('admin_layout.scripts')
</body>

</html>
