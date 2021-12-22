@extends('fieldstaff.layouts.main')
@section('title') Tambah Rencana Bulanan @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
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
            <form class="form-horizontal form-label-left" method="post" action="/dataLaporan">
                @csrf
                <br>
                <div class="form-group">
                    <label>Nama Fieldstaff</label>
                    <input type="text" class="form-control" placeholder="Nama Fieldstaff" readonly value="{{Auth::User()->username}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Periode</label>
                    <input type="month" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" class="form-control" placeholder="Lokasi">
                </div>
                <br>
                <div class="form-group">
                    <label for="message">Rencana Tindak Lanjut</label>
                    <textarea id="message" name="keterangan" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10" rows="3" placeholder="Keterangan.."></textarea>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="float:left">Simpan</buttoclass=>
                </div>
        </div>
        </form>
    </div>
</div>


@endsection