@extends('fieldstaff.layouts.main')
@section('title') Cetak Rencana Bulanan @endsection

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    @include('layouts.notif')
    <div class="page-title">
        <div class="title_left">
            <h4><small><a href="/dataRencana">Data Rencana</a> / Cetak Rencana</small></h4>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="row x_title">
                <div class="col-md-6 col-xs-12 col-sm-12">
                    <h2>
                        Pilih Periode
                    </h2>
                </div>
            </div>
            <div class="x_content">

                <div class="form-group">
                    <label>Mulai Dari</label>
                    <input type="text" id="periode_dari" class="form-control periode" required placeholder="MM-YYYY">
                    <input type="hidden" id="data-periode_dari" name="periode" class="form-control">
                </div>
                <div class="form-group">
                    <label>Sampai</label>
                    <input type="text" id="periode_sampai" class="form-control periode" required placeholder="MM-YYYY">
                    <input type="hidden" id="data-periode_sampai" name="periode" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" id="btnLihatData" class="btn btn-primary">Tampilkan Data</button>
                </div>


            </div>
        </div>
    </div>

    <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="row x_title">
                <div class="col-md-6 col-xs-12 col-sm-12">
                    <h2>
                        Hasil Data <small id="titlePeriode"></small>
                    </h2>
                </div>
            </div>
            <div class="x_content">
                <table id="tableCetak" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="18%">Periode</th>
                            <th width="18%">Lokasi</th>
                            <th width="28%">Rencana Tindak Lanjut</th>
                        </tr>
                    </thead>
                    <tbody id="isiData">
                    </tbody>
                </table>
                <hr>
                <form id="linkCetak">
                    <input type="hidden" id="cetakAwal" name="awal">
                    <input type="hidden" id="cetakAkhir" name="akhir">
                    <button type="submit" id="btnCetak" class="btn btn-success pull-right" disabled> <i class="fa fa-print"></i> Cetak</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

<script>
    $(window).unload(function() {
        $('#btnCetak').prop('disabled', true);
    });

    $('#tableCetak').dataTable({
        "paging": false,
        "info": false,
        "searching": false,
    });
    $("#periode_dari").datepicker({
        format: "mm-yyyy",
        startView: "months",
        minViewMode: "months",
    }).on('changeDate', function() {
        $("#data-periode_dari").val("01-" + $("#periode_dari").val())
    });
    $("#periode_sampai").datepicker({
        format: "mm-yyyy",
        startView: "months",
        minViewMode: "months",
    }).on('changeDate', function() {
        $("#data-periode_sampai").val("01-" + $("#periode_sampai").val())
    });

    $('body').on('click', '#btnLihatData', function(event) {
        const awal = $('#data-periode_dari').val();
        const akhir = $('#data-periode_sampai').val();
        const periodeAwal = $('#periode_dari').val();
        const periodeAkhir = $('#periode_sampai').val();
        $("#isiData").empty();
        $('#btnCetak').prop('disabled', true);
        $('#titlePeriode').text("Periode " + periodeAwal + " s.d " + periodeAkhir);
        $('#linkCetak').attr('action', '/dataRencana/{{\App\Models\Fieldstaff::getUser()->id}}/cetakPDF');
        $('#cetakAwal').val(awal);
        $('#cetakAkhir').val(akhir);
        event.preventDefault();
        $.get('/dataRencana/{{\App\Models\Fieldstaff::getUser()->id}}/cekDataPeriode?awal=' + awal + '&akhir=' + akhir, function(data) {
            console.log(data);
            if (data.data == null) {
                console.log('aa');
                $("#isiData").append(
                    '<tr>' +
                    "<td colspan=3 class='text-center'>Data Tidak Ditemukan</td>" +
                    '</tr>'
                );
            } else {
                $.each(data.data, function(key, value) {
                    $("#isiData").append(
                        '<tr>' +
                        '<td>' + data.data[key].periode + '</td>' +
                        '<td>' + data.data[key].lokasi + '</td>' +
                        '<td>' + data.data[key].tindak_lanjut + '</td>' +
                        '</tr>'
                    );
                });
                $('#btnCetak').prop('disabled', false);
            }
        });

    });
</script>

@endsection