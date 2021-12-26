@extends('fieldstaff.layouts.main')
@section('title') Tambah Rencana Bulanan @endsection

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    @include('layouts.notif')
    <div class="page-title">
        <div class="title_left ">
            <h4><small><a href="/dataRencana">Data Rencana</a> / Tambah Rencana</small></h4>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Input Rencana Bulanan</h2>
            <div class="clearfix"></div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 left-margin">
            <form class="form-horizontal form-label-left" method="post" action="/dataRencana">
                @csrf
                <br>
                <div class="form-group">
                    <label>Nama Fieldstaff</label>
                    <input type="text" class="form-control" placeholder="Nama Fieldstaff" readonly value="{{Auth::User()->username}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Periode <span class="required">*</span></label>
                    <input type="text" id="periode2" class="form-control" required placeholder="MM-YYYY">
                    <input type="hidden" id="periode" name="periode" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Lokasi <span class="required">*</span></label>
                    <input type="text" name="lokasi" class="form-control" placeholder="Lokasi" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="message">Rencana Tindak Lanjut <span class="required">*</span></label>
                    <textarea id="rencana" name="tindak_lanjut" required="required" class="form-control" rows="3" placeholder="Keterangan.."></textarea>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="float:left">Simpan</button>
                </div>
        </div>
        </form>
    </div>
</div>


@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

<script>
    $("#periode2").datepicker({
        format: "mm-yyyy",
        startView: "months",
        minViewMode: "months",
    }).on('changeDate', function() {
        $("#periode").val("01-" + $("#periode2").val())
    });
</script>

@endsection