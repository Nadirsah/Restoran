<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.head')

</head>

<body>

    <!-- Main navbar -->
    @include('layouts.admin.navbar')
    <!-- /main navbar -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            @include('layouts.admin.sidebar')
            <!-- /main sidebar -->


            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                @include('layouts.admin.header')
                <!-- /page header -->


                <!-- Content area -->
                @yield('content')
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

</body>

</html>