@extends('fieldstaff.layouts.main')
@section('title') Tambah Laporan @endsection
@section('style')
<style>
  input[type="file"] {
    display: none;
  }

  .custom-file-upload {
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
  }
</style>
@endsection
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  @include('layouts.notif')
  <div class="page-title">
    <div class="title_left">
      <h4><small><a href="/dataLaporan">Data Laporan</a> / Tambah Laporan</small></h4>
    </div>
  </div>
  <div class="x_panel">
    <div class="x_title">
      <h2>Input Laporan Harian</h2>
      <div class="clearfix"></div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 left-margin">
      <form class="form-horizontal form-label-left" method="post" action="/dataLaporan" enctype='multipart/form-data'>
        @csrf
        <br>
        <div class="form-group">
          <label>Nama Fieldstaff</label>
          <input type="text" class="form-control" placeholder="Nama Fieldstaff" readonly value="{{Auth::User()->username}}">
        </div>
        <br>
        <div class="form-group">
          <label>Tanggal <span class="required">*</span></label>
          <input type="date" name="tanggal_laporan" class="form-control" placeholder="Password" value="{{old('tanggal_laporan') != null ?old('tanggal_laporan') : date('Y-m-d')}}">
        </div>
        <br>
        @if(auth()->user()->getUser()->kantah_id != null)
        <div class="form-group">
          <label>Kegiatan <span class="required">*</span></label>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="kegiatans[]" class="flat" checked value="Penyuluhan" @if(is_array(old('kegiatans')) && in_array("Penyuluhan", old('kegiatans'))) checked @endif> Melaksanakan Penyuluhan
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="kegiatans[]" class="flat" value="Pemetaan" @if(is_array(old('kegiatans')) && in_array("Pemetaan", old('kegiatans'))) checked @endif> Melaksanakan Pemetaan Sosial
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="kegiatans[]" class="flat" value="Penyusunan Model" @if(is_array(old('kegiatans')) && in_array("Penyusunan Model", old('kegiatans'))) checked @endif> Penyusunan Model
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="kegiatans[]" class="flat" value="Pendampingan" @if(is_array(old('kegiatans')) && in_array("Pendampingan", old('kegiatans'))) checked @endif> Melaksanakan Pendampingan
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="kegiatans[]" class="flat" value="Penyusunan Data" @if(is_array(old('kegiatans')) && in_array("Penyusunan Data", old('kegiatans'))) checked @endif> Penyusunan Data
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="kegiatans[]" class="flat" value="Koordinasi" @if(is_array(old('kegiatans')) && in_array("Koordinasi", old('kegiatans'))) checked @endif> Koordinasi dengan Instansi / tim penanganan
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="kegiatans[]" class="flat" value="Rapat" @if(is_array(old('kegiatans')) && in_array("Rapat", old('kegiatans'))) checked @endif> Rapat / Meeting
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="kegiatans[]" class="flat" value="Lainnya" @if(is_array(old('kegiatans')) && in_array("Lainnya", old('kegiatans'))) checked @endif> Lainnya
            </label>
          </div>
        </div>
        @elseif(auth()->user()->getUser()->kanwil_id != null)
        <div class="form-group">
          <label>Kegiatan <span class="required">*</span></label>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="kegiatans[]" class="flat" checked value="Pemetaan Tahun Sebelumnya" @if(is_array(old('kegiatans')) && in_array("Pemetaan Tahun Sebelumnya", old('kegiatans'))) checked @endif> Melaksanakan Pemetaan sosial tahun sebelumnya
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="kegiatans[]" class="flat" value="Pendampingan Tahun Sebelumnya" @if(is_array(old('kegiatans')) && in_array("Pendampingan Tahun Sebelumnya", old('kegiatans'))) checked @endif> Melaksanakan Pendampingan tahun sebelumnya
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="kegiatans[]" class="flat" value="Monitoring dan Evaluasi" @if(is_array(old('kegiatans')) && in_array("Monitoring dan Evaluasi", old('kegiatans'))) checked @endif> Monitoring dan Evaluasi pelaksanaan akses reforma
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="kegiatans[]" class="flat" value="Koordinasi" @if(is_array(old('kegiatans')) && in_array("Koordinasi", old('kegiatans'))) checked @endif> Koordinasi dengan instansi/ tim penanganan
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="kegiatans[]" class="flat" value="Rapat" @if(is_array(old('kegiatans')) && in_array("Rapat", old('kegiatans'))) checked @endif> Rapat / Meeting
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="kegiatans[]" class="flat" value="Lainnya" @if(is_array(old('kegiatans')) && in_array("Lainnya", old('kegiatans'))) checked @endif> Lainnya
            </label>
          </div>
        </div>
        @endif
        <br>
        <div class="form-group">
          <label for="message">Keterangan <span class="required">*</span></label>
          <textarea id="message" name="keterangan" required="required" class="form-control" rows="3" placeholder="Keterangan..">{{old('keterangan')}}</textarea>
        </div>
        <br>
        <div class="listPeserta">
          <div class="form-group">
            <label>Peserta <span class="required">*</span></label>
            <input type="text" name="peserta[]" class="form-control" placeholder="Peserta" required>
          </div>
        </div>
        <div class="form-group">
          <button type="button" id="addPeserta" class="btn btn-default col-md-12 col-xs-12" style="float:left;border:1px dashed gray"><i class="fa fa-plus"></i> Tambah Peserta</button=>
        </div>
        <br>
        <div class="form-group">
          <label>Upload Foto</label><br>
          <label class="custom-file-upload btn btn-success">
            <input type="file" name="foto" onchange="return onChangeImg(event, this)" accept=".jpg,.png,.jpeg .JPG" id="file-input" />
            <i class="fa fa-upload"></i>&nbsp;Silahkan Pilih Foto
          </label>

          <br>
          <img id="foto" src="#" class="imgLaporan" style="display:none" />
          <div class="row" id="divNamaFile" style="margin-top:5px;display:none">
            <div class="col-md-11 col-xs-11" style="overflow:hidden">
              <p id="namaFile"></p>
            </div>
            <div class="col-md-1 col-xs-1">
              <a href="javascript:void(0)" id="remove"><i class="fa fa-close"></i></a>
            </div>
          </div>
        </div>
        <br>
        <div class="form-group">
          <button type="button" id="addKeluhan" class="btn btn-default col-md-12 col-xs-12" style="float:left;border:1px dashed gray"><i class="fa fa-plus"></i> Tambah Kendala</button=>
        </div>
        <div class="form-group" style="display:none" id="formKeluhan">
          <br>
          <label for="message">Kendala</label> <span class="pull-right"> <a href="javascript:void(0)" id="closeKeluhan"><i class="fa fa-minus-circle"></i></a> </span>
          <textarea id="inputKeluhan" name="keluhan" class="form-control col-md-11" name="message" placeholder="Kendala.." rows="3"></textarea>
        </div>
        <br>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" style="float:left">Simpan</button=>
        </div>
    </div>
    </form>
  </div>
</div>


@endsection

@section('script')
<script>
  var inc = 1;
  $("#addKeluhan").on('click', function() {
    $("#formKeluhan").show();
    $(this).prop("disabled", true);
    $("#inputKeluhan").prop("required", true);
  })

  $("#addPeserta").on('click', function() {
    $('.listPeserta').append(
      '<div class="input-group" id="peserta' + inc + '">' +
      '<input type="text" name="peserta[]" class="form-control" placeholder="Peserta" required>' +
      '<span class="input-group-btn">' +
      '<button type="button" class="btn btn-danger removePeserta" id="' + inc + '"><i class="fa fa-close"></i></button>' +
      '</span>' +
      '</div>'
    );
    inc++;
    console.log(inc);
  });

  $(document).on('click', '.removePeserta', function() {
    $id = $(this).attr('id');
    $('#peserta' + $id).remove();

  });

  $("#closeKeluhan").on('click', function() {
    $("#formKeluhan").hide();
    $('#addKeluhan').prop("disabled", false);
    $("#inputKeluhan").removeAttr("required");
  })

  $('#remove').on('click', function() {
    $("#file-input").val('');
    $("#foto").hide();
    $("#divNamaFile").hide();
    document.getElementById("remove").style.display = "none";
  });

  function onChangeImg(event, fileInput) {

    var filePath = fileInput.value;
    var ext = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();
    if (ext == "jpg" || ext == "JPG" || ext == "png" || ext == "jpeg" || ext == "gif") {
      $("#foto").attr("src", URL.createObjectURL(event.target.files[0]));
      $("#foto").show();
      $("#divNamaFile").show();
      $("#namaFile").text(fileInput.value.replace(/C:\\fakepath\\/i, ''));
      return true;
    } else {
      alert("Hanya Bisa Memasukan Gambar");
      fileInput.focus();
      return false;
    }
  }
</script>
@endsection