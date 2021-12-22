@extends('fieldstaff.layouts.main')
@section('title') Tambah Tahapan @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="page-title">
        <div class="title_left ">
            <h4><small><a href="/dataTahapan">Data Tahapan</a> / Tambah Tahapan</small></h4>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Input Tahapan</h2>
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
                    <label>Target Fisik (KK)</label>
                    <input type="number" class="form-control" readonly>
                </div>
                <br>
                <div class="form-group">
                    <label>Tahapan Akses Reforma Agraria</label>
                    <select class="select2_single form-control" tabindex="-1">
                        <option selected disabled>Pilih Tahapan Akses Reforma Agraria</option>
                        <option value="AK">Pemetaan Sosial</option>
                        <option value="HI">Penyuluhan</option>
                        <option value="CA">Penyusunan Model</option>
                        <option value="NV">Pendampingan</option>
                        <option value="OR">Evaluasi dan Pelaporan</option>

                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label>Realisasi Fisik</label>
                    <input type="number" class="form-control" placeholder="Realisasi Fisik">
                </div>
                <br>
                <div class="form-group">
                    <label>Realisasi yang Sudah Di Input</label>
                    <input type="number" class="form-control" readonly>
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