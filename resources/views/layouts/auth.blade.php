<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
     <style>
        .page-bg{
            background-image: url({{url('/admin/img/login-page-bg.jpg')}});
            background-size: cover;
            background-repeat: no-repeat;
        }
        .card{background-color:#000000c7}
        .form-control{background-color: #54515194;}
        .form-control{color: #e6e7ef;}
        .form-control:focus{color: #192269;}
    </style>
    @yield('ps_styles')
</head>

<body class="page-bg">
    <div class="container">
        <div class="row justify-content-center">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
    @yield('ps_scripts')
</body>

</html>