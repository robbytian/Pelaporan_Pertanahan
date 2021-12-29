@extends('fieldstaff.layouts.main')
@section('title') Cetak Laporan @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    @include('layouts.notif')
    <div class="page-title">
        <div class="title_left">
            <h4><small><a href="/dataLaporan">Data Laporan</a> / Cetak Rencana</small></h4>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="row x_title">
                <div class="col-md-6 col-xs-12 col-sm-12">
                    <h2>
                        Pilih Periode
                    </h2>
                </div>
            </div>
            <div class="x_content">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 left-margin">
                    <div class="form-group">
                        <label>Mulai Dari</label>
                        <input type="date" id="periode_dari" class="form-control periode" required placeholder="MM-YYYY">
                    </div>
                    <div class="form-group">
                        <label>Sampai</label>
                        <input type="date" id="periode_sampai" class="form-control periode" required placeholder="MM-YYYY">
                    </div>
                    <div class="form-group">
                        <button type="submit" id="btnLihatData" class="btn btn-primary">Tampilkan Data</button>
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



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        console.log('aa');

        $('#tableCetak').dataTable({
            "paginate": false,
            "searching": false
        });

    });
</script>

@endsection