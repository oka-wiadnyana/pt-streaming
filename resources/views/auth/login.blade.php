<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Si Putri</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('template_assets') }}/images/favicon.ico">

    <link href="{{ asset('template_assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('template_assets') }}/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('template_assets') }}/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

    <!-- Background -->
    <div class="account-pages"></div>
    <!-- Begin page -->
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">

                <h3 class="text-center m-0">
                    <a href="index.html" class="logo logo-admin"><img src="{{ asset('logo') }}/si-putri-text-black.png"
                            height="80" alt="logo"></a>
                </h3>

                <div class="p-3">
                    <h4 class="text-muted font-18 m-b-5 text-center">Selamat Datang</h4>
                    <p class="text-muted text-center">Sign in to continue to Si Putri</p>

                    <form class="form-horizontal m-t-30" action="{{ url('/attempt_login') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username"
                                name="username">
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="userpassword">Password</label>
                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password"
                                name="password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline"
                                        name="remember_me" value="Y">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log
                                    In</button>
                            </div>
                        </div>

                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20">

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>



    </div>

    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{ asset('template_assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('template_assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template_assets') }}/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('template_assets') }}/js/waves.min.js"></script>

    <script src="../plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('template_assets') }}/js/app.js"></script>

</body>

</html>
