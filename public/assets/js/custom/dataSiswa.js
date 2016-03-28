/**
 * Created by aoktox on 28/03/16.
 */
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
        ajax: "/getDataSiswa",
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
    url="/deleteDataSiswa";
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
    url="/editDataSiswa";
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