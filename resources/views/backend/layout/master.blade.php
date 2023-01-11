<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>@yield('title', 'default')</title>
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/backend/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/backend/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/backend/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/backend/style.min.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
        integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <style>
            .preloader {
                width: 100vw;
                height: 100vh;
                top: 0;
                left: 0;
                position: fixed;
                z-index: 99999;
                background: #fff;
            }
        </style>
    @yield('head')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- Topbar header - style you can find in pages.scss -->
        @include('backend.layout.header')
        @include('backend.layout.sidebar')
        <div class="page-wrapper">
            @include('backend.layout.preloader')
            @yield('content')
        </div>
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    {{--  <script src="../assets/libs/jquery/dist/jquery.min.js"></script> --}}
    <script src="{{ asset('assets/js/backend/popper.min.js') }}"></script>
    <{{-- script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script> --}}
     <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets/js/backend/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/backend/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/c3.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/js/backend/dashboard1.min.js') }}"></script>
    <script>
        $("#preloader").hide(500);
    </script>
    @yield('bottom')
</body>

</html>
