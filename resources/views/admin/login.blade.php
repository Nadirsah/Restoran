<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{asset('admin')}}/global_assets\css\icons\icomoon\styles.css" rel="stylesheet" type="text/css">
    <link href="{{asset('admin')}}/assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('admin')}}/assets\css\core.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('admin')}}/assets\css\components.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('admin')}}/assets\css\colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('admin')}}/global_assets\js\plugins\loaders\pace.min.js"></script>
    <script src="{{asset('admin')}}/global_assets\js\core\libraries\jquery.min.js"></script>
    <script src="{{asset('admin')}}/global_assets\js\core\libraries\bootstrap.min.js"></script>
    <script src="{{asset('admin')}}/global_assets\js\plugins\loaders\blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('admin')}}/global_assets\js\plugins\forms\styling\uniform.min.js"></script>

    <script src="{{asset('admin')}}/assets\js\app.js"></script>
    <script src="{{asset('admin')}}/global_assets\js\demo_pages\login.js"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container">

    <!-- Main navbar -->

    <!-- /main navbar -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">

                    <!-- Advanced login -->
                    <form action="{{route('auth')}}" method="post">
                        @csrf
                        <div class="panel panel-body login-form">
                            @include('layouts.admin.alert')
                            <div class="text-center">
                                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i>
                                </div>
                                <h5 class="content-group">Hesabınıza daxil olun!</h5>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" name="email" class="form-control" placeholder="E-poçt">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" name="password" class="form-control" placeholder="Sifre">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn bg-blue btn-block">Daxil ol <i
                                        class="icon-arrow-right14 position-right"></i></button>
                            </div>


                        </div>
                    </form>
                    <!-- /advanced login -->


                    <!-- Footer -->

                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

</body>

</html>