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

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.css',env('IS_SECURE'))}}">
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
            @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Terjadi kesalahan!</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('gagal'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Terjadi kesalahan!</h4>
                    <strong>
                        {{ session('gagal') }}
                    </strong>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info-circle"></i> Sukses!</h4>
                    {{ session('status') }}
                </div>
            @endif
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

<!-- Modal -->
<div class="modal fade" id="TambahSiswa" tabindex="-1" role="dialog" aria-labelledby="TambahSiswa">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Siswa</h4>
                <small>Form untuk menambah data siswa</small>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <form method="POST" id="addDataSiswa" action="{{url('/dataSiswa','',env('IS_SECURE'))}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                <div class="col-md-6" style="margin-bottom: 10px;">
                                    <label for="form-field-username">NIS</label>
                                    <input type="text" name="nis" class="form-control" value="{{old('nis')}}">
                                </div>
                                <div class="col-md-6" style="margin-bottom: 10px;">
                                    <label for="form-field-username">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{old('nama')}}">
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;margin-bottom: 10px;">
                                <div class="col-md-6 date" style="margin-bottom: 10px;">
                                    <label for="form-field-username">Tanggal Lahir</label>
                                    <input type="text" name="tgl_lahir" class="form-control" id="tgl_lahir" value="{{old('tgl_lahir')}}">
                                </div>
                                <div class="col-md-6" style="margin-bottom: 10px;">
                                    <label for="form-field-username">Jenis Kelamin</label>
                                    <select name="j_kel" class="form-control">
                                        <option disabled selected>Pilih</option>
                                        <option value="L">Laki laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="form-field-username">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3">{{old('alamat')}}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="simpan" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@yield('footer_before_jquery')
        <!-- jQuery 2.1.4 -->
<script src="{{asset('assets/js/jquery-1.12.2.min.js',env('IS_SECURE'))}}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('assets/js/bootstrap.min.js',env('IS_SECURE'))}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/app.min.js',env('IS_SECURE'))}}"></script>
<script src="{{asset('assets/js/moment.js',env('IS_SECURE'))}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js',env('IS_SECURE'))}}"></script>
@yield('footer_after_jquery')
<script>
    $(function () {
        $('#tgl_lahir').datetimepicker({
            viewMode: 'years',
            format: 'YYYY/MM/DD'
        });
    });
    $('#simpan').click(function(e){
        e.preventDefault();
        $('#addDataSiswa').submit();
    })
</script>
</body>
</html>
