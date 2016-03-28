@extends('master.layout')
@section('head')
    <meta name="_token" content="{!! csrf_token() !!}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables/dataTables.bootstrap.css',env('IS_SECURE'))}}">
    <link href="{{ asset("assets/css/sweetalert.css",env('IS_SECURE')) }}" rel="stylesheet" type="text/css" />
@stop
@section('footer_after_jquery')
<!-- DataTables -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js',env('IS_SECURE'))}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap.min.js',env('IS_SECURE'))}}"></script>
<script src="{{ asset("assets/js/sweetalert.min.js",env('IS_SECURE')) }}"></script>
<script src="{{ asset("assets/js/custom/dataSiswa.js",env('IS_SECURE')) }}"></script>
{{--<script>
    var dataTabel;
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    $( document ).ready(function() {
        $('#tgl_lahir_edit').datetimepicker({
            viewMode: 'years',
            format: 'YYYY/MM/DD'
        });
    });
    $(function() {
        dataTabel = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('/getDataSiswa','',env('IS_SECURE')) }}',
            columns: [
                { data: 'nis', name: 'nis' },
                { data: 'nama', name: 'nama' },
                { data: 'j_kel', name: 'j_kel' },
                { data: 'tgl_lahir', name: 'tgl_lahir' },
                { data: 'alamat', name: 'alamat' },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });

    function hapusSiswa(nis){
        url="{{ url('deleteDataSiswa','',env('IS_SECURE')) }}";
        swal({
            title: "Hapus data siswa?",
            text: "Data yang sudah dihapus tidak dapat dikembalikan lagi.",
            type: "error",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Lanjtkan!",
            cancelButtonText: "Batalkan!",
            closeOnConfirm: false,
            closeOnCancel: true,
        }, function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url: url,
                    type: "POST",
                    async: false,
                    data: {nis: nis},
                    success: function (hasil) {
                        if(hasil=="1"){
                            swal({
                                title: "Data dihapus",
                                type: "success",
                                confirmButtonText: "OK",
                                closeOnConfirm: true
                            }, function(){
                                dataTabel.ajax.reload();
                            });
                        }else{
                            swal({
                                title: "Data tidak ditemukan",
                                type: "warning",
                                confirmButtonText: "OK",
                            });
                        }
                    }
                });
            }
        });
    }

    $('#cariGan').click(function(e){
        url="{{ url('editDataSiswa','',env('IS_SECURE')) }}";
        nis = $('#cari_nis').val();
        e.preventDefault();
        $.ajax({
            url: url,
            type: "POST",
            async: false,
            data: {nis: nis},
            success: function (hasil) {
                if(hasil=="0"){
                    $('#hasil_cari').slideUp("slow");
                    $('.not-found').slideDown("slow");
                }else {
                    $("input[name='nis']").val(hasil.nis).prop('readonly', true);
                    $("input[name='nama']").val(hasil.nama);
                    $("select[name='j_kel']").val(hasil.j_kel);
                    $("input[name='tgl_lahir']").val(moment(hasil.tgl_lahir).format('YYYY/MM/DD'));
                    $("textarea[name='alamat']").val(hasil.alamat);
                    $('#nama_txt').text(hasil.nama);
                    $('.not-found').slideUp("slow");
                    $('#hasil_cari').slideDown("slow");
                }
            }
        });
    });
</script>--}}
@stop
@section('content')
    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
        <div class="col-md-4" style="padding-left: 2px;padding-right: 2px;">
            <div class="info-box bg-green">
            <span class="info-box-icon">
                <i class="fa fa-users"></i>
            </span>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah siswa</span>
                    <span class="info-box-number">{{DB::table('siswa')->count()}}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                  <span class="progress-description">
                    Keseluruhan
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-4" style="padding-left: 2px;padding-right: 2px;">
            <div class="info-box bg-blue">
            <span class="info-box-icon">
                <i class="fa fa-male"></i>
            </span>
                <div class="info-box-content">
                    <span class="info-box-text">Laki laki</span>
                    <span class="info-box-number">{{DB::table('siswa')->where('j_kel','L')->count()}}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: {{round((DB::table('siswa')->where('j_kel','L')->count()/DB::table('siswa')->count())*100)}}%"></div>
                    </div>
                  <span class="progress-description">
                    {{round((DB::table('siswa')->where('j_kel','L')->count()/DB::table('siswa')->count())*100)}}% dari keseluruhan
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-4" style="padding-left: 2px;padding-right: 2px;">
            <div class="info-box bg-yellow">
            <span class="info-box-icon">
                <i class="fa fa-female"></i>
            </span>
                <div class="info-box-content">
                    <span class="info-box-text">Perempuan</span>
                    <span class="info-box-number">{{DB::table('siswa')->where('j_kel','P')->count()}}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: {{round((DB::table('siswa')->where('j_kel','P')->count()/DB::table('siswa')->count())*100)}}%"></div>
                    </div>
                  <span class="progress-description">
                    {{round((DB::table('siswa')->where('j_kel','P')->count()/DB::table('siswa')->count())*100)}}% dari keseluruhan
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>
    <div class="row"></div>
    <div class="panel panel-default">
        <div class="panel-body" style="padding: 4px 4px 4px 4px;">
            <div class="col-md-3" style="padding: 0px 4px 0px 0px;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit data siswa</h3>
                    </div>
                    <div class="panel-body">
                            <div class="form-group">
                                <label for="NIS">Masukkan NIS</label>
                                <input type="text" class="form-control" id="cari_nis" placeholder="NIS">
                            </div>
                            <button id="cariGan" class="btn btn-success btn-block"><i class="glyphicon glyphicon-search"></i> Cari</button>
                    </div>
                </div>

                <div class="alert alert-warning alert-dismissible not-found" style="display: none">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info-circle"></i> Maaf!</h4>
                    Data tidak ditemukan
                </div>

                <div id="hasil_cari" class="panel panel-default" style="display: none">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data <strong id="nama_txt"></strong></h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="{{ url('editDataSiswaPost','',env('IS_SECURE')) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="NIS">NIS</label>
                                <input type="text" class="form-control" name="nis">
                            </div>
                            <div class="form-group">
                                <label for="Nama">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="J_kel">Jenis Kelamin</label>
                                <select name="j_kel" class="form-control">
                                    <option disabled selected>Pilih</option>
                                    <option value="L">Laki laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal lahir</label>
                                <input type="text" name="tgl_lahir" class="form-control" id="tgl_lahir_edit">
                            </div>
                            <div class="form-group">
                                <label for="Alamat" >Alamat</label>
                                <textarea name="alamat" rows="3" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="glyphicon glyphicon-check"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9" style="padding: 0px 0px 0px 4px;">
                <div class="panel panel-default" style="margin-bottom: 0px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Siswa</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="users-table">
                                <thead>
                                <tr>
                                    <th width="5px">NIS</th>
                                    <th>Nama</th>
                                    <th>L/P</th>
                                    <th>Lahir</th>
                                    <th>Alamat</th>
                                    <th></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop