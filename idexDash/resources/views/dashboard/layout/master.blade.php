<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="images/fevicon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/color_2.css') }}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.css') }}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/perfect-scrollbar.css') }}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="dashboard dashboard_2">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->


            <!--Topbar -->


            <!--Sidebar-->
            @include('dashboard.layout.side')
            <!-- End Sidebar-->




            <!--Content Start-->
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                @include('dashboard.layout.nav')


                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    @yield('content')

                    <!-- footer -->
                    <div class="container-fluid">
                        <div class="footer">
                            <p>Copyright © 2018 Designed by html.design. All rights reserved.<br><br>
                                Distributed By: <a href="https://themewagon.com/">ThemeWagon</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!-- wow animation -->
    <script src="{{ asset('frontend/js/animate.js') }}"></script>
    <!-- select country -->
    <script src="{{ asset('frontend/js/bootstrap-select.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>
    <!-- chart js -->
    <script src="{{ asset('frontend/js/Chart.min.js') }}"></script>
    <script src="{{ asset('frontend/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/utils.js') }}"></script>
    <script src="{{ asset('frontend/js/analyser.js') }}"></script>
    <!-- nice scrollbar -->
    <script src="{{ asset('frontend/js/perfect-scrollbar.min.js') }}"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/chart_custom_style1.js') }}"></script>
</body>

</html>