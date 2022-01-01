@extends('fieldstaff.layouts.main')
@section('title') Cetak Laporan @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    @include('layouts.notif')
    <div class="page-title">
        <div class="title_left">
            <h4><small><a href="/dataLaporan">Data Laporan</a> / Cetak Laporan</small></h4>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="row x_title">
                <div class="col-md-6 col-xs-12 col-sm-12">
                    <h2>
                        Pilih Rentang Tanggal Laporan
                    </h2>
                </div>
            </div>
            <div class="x_content">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 left-margin">
                    <div class="form-group">
                        <label>Mulai Dari</label>
                        <input type="date" id="periode_dari" class="form-control periode" required>
                    </div>
                    <div class="form-group">
                        <label>Sampai</label>
                        <input type="date" id="periode_sampai" class="form-control periode" required>
                    </div>
                    <div class="form-group">
                        <button type="button" id="btnLihatData" class="btn btn-primary">Tampilkan Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
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
                            <th width="15%">Tanggal Laporan</th>
                            <th width="15%">Kegiatan</th>
                            <th width="30%">Deskripsi Kegiatan</th>
                            <th width="20%">Peserta</th>
                            <th width="20%">Foto</th>
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
<script>
    $(document).ready(function() {
        var flagsUrl = "{{ URL::asset('/images/laporan/') }}";
        $('#tableCetak').dataTable({
            "paginate": false,
            "searching": false
        });

        $('body').on('click', '#btnLihatData', function(event) {
            const awal = $('#periode_dari').val();
            const akhir = $('#periode_sampai').val();
            $("#isiData").empty();
            $('#btnCetak').prop('disabled', true);
            $('#titlePeriode').text("Tanggal Laporan " + awal + " s.d " + akhir);
            $('#linkCetak').attr('action', '/dataLaporan/{{\App\Models\Fieldstaff::getUser()->id}}/cetakPDF');
            $('#cetakAwal').val(awal);
            $('#cetakAkhir').val(akhir);
            event.preventDefault();
            $.get('/dataLaporan/{{\App\Models\Fieldstaff::getUser()->id}}/cekDataPeriode?awal=' + awal + '&akhir=' + akhir, function(data) {
                if (data.data == null) {
                    $("#isiData").append(
                        '<tr>' +
                        "<td colspan=5 class='text-center'>Data Tidak Ditemukan</td>" +
                        '</tr>'
                    );
                } else {
                    $.each(data.data, function(key, value) {
                        if (data.data[key].foto != null) {
                            $("#isiData").append(
                                '<tr>' +
                                '<td style="vertical-align:middle">' + data.data[key].tanggal_laporan + '</td>' +
                                '<td style="vertical-align:middle">' + data.data[key].kegiatan + '</td>' +
                                '<td style="vertical-align:middle">' + data.data[key].keterangan + '</td>' +
                                '<td style="vertical-align:middle">' + data.data[key].peserta + '</td>' +
                                '<td style="vertical-align:middle"><img src="' + flagsUrl + "/" + data.data[key].foto + '" class="imgLaporan3"/></td>' +
                                '</tr>'
                            );
                        } else {
                            $("#isiData").append(
                                '<tr>' +
                                '<td>' + data.data[key].tanggal_laporan + '</td>' +
                                '<td>' + data.data[key].kegiatan + '</td>' +
                                '<td>' + data.data[key].keterangan + '</td>' +
                                '<td>' + data.data[key].peserta + '</td>' +
                                '<td>Tidak ada Foto diupload</td>' +
                                '</tr>'
                            );
                        }

                    });
                    $('#btnCetak').prop('disabled', false);
                }
            });
        });
    });
</script>

@endsection