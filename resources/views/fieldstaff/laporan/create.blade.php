@extends('fieldstaff.layouts.main')
@section('title') Dashboard @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="page-title">
        <div class="title_left">
            <h4><small><a href="/dataLaporan">Data Laporan</a> / Buat Laporan</small></h4>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Input Laporan Harian</h2>
            <div class="clearfix"></div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 left-margin">
                  <form class="form-horizontal form-label-left">
                  <br>
                    <div class="form-group">
                      <label>Nama Fieldstaff</label>
                      <input type="email" class="form-control" placeholder="Enter email">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <input type="date" class="form-control" placeholder="Password">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Kegiatan</label>
                      <div class="radio">
                            <label>
                              <input type="radio" class="flat" checked name="iCheck"> Koordinasi dengan kantah
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" class="flat" name="iCheck"> Melakukan Pendampingan
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" class="flat" name="iCheck"> Rapat/Meeting
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" class="flat" name="iCheck"> Melakukan Kunjungan
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" class="flat" name="iCheck"> Lainnya
                            </label>
                          </div>
                    </div>
                    <br>
                    <div class="form-group">
                    <label for="message">Keterangan</label>
                          <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10"></textarea>
                  </div>
                  <br>
                  <div class="form-group">
                      <label>Peserta</label>
                      <input type="email" class="form-control" placeholder="Enter email">
                    </div>
                  </form>
                </div>
    </div>

</div>
@endsection