<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ $title or "Selamat Datang" }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css',env('IS_SECURE'))}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css',env('IS_SECURE'))}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/css/AdminLTE.min.css',env('IS_SECURE'))}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('assets/css/skins/_all-skins.min.css',env('IS_SECURE'))}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('master.header')
    @include('master.sidebar-left')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $title or null }}
                <small>{{ $description or null }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">{{ $current or null }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Your Page Content Here -->
            @yield('content')

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Agus</b> Prasetiyo
        </div>
        Aplikasi data siswa
    </footer>
</div><!-- ./wrapper -->

@yield('footer_before_jquery')
<!-- jQuery 2.1.4 -->
<script src="{{asset('assets/plugins/jQuery/jQuery-2.1.4.min.js',env('IS_SECURE'))}}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('assets/js/bootstrap.min.js',env('IS_SECURE'))}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/app.min.js',env('IS_SECURE'))}}"></script>
@yield('footer_after_jquery')
</body>
</html>
