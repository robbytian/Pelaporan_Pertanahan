@extends('kantah.layouts.main')
@section('title') Data Laporan @endsection

@section('content')
@include('layouts.dataLaporan.index')
@endsection

@section('script')
<script>
  var flagsUrl = "{{ URL::asset('/images/laporan/') }}";
  $(document).ready(function() {
    $('#tableLaporan').dataTable({
      "autoWidth": false,
      "aaSorting": []
    });

    $('body').on('click', '.btnHapus', function() {
      event.preventDefault();
      var id = $(this).data('id');
      console.log(id);
      $("#deleteLaporan").attr('action', '/dataLaporan/' + id);
    });

    $('body').on('click', '.btnLihat', function(event) {
      event.preventDefault();
      $('.foto').hide();
      $('.noFoto').hide();
      $('.penyuluhan').prop('checked', false);
      $('.pemetaan').prop('checked', false);
      $('.penyusunan_model').prop('checked', false);
      $('.pendampingan').prop('checked', false);
      $('.penyusunan_data').prop('checked', false);
      $('.koordinasi').prop('checked', false);
      $('.rapat').prop('checked', false);
      $('.lainnya').prop('checked', false);
      $('.pemetaan_sebelumnya').prop('checked', false);
      $('.pendampingan_sebelumnya').prop('checked', false);
      $('.monitoring').prop('checked', false);
      $('.saran').removeAttr('readonly');
      var id = $(this).data('id');
      $(".updateLaporan").attr('action', '/dataLaporan/' + id);
      $.get('dataLaporan/' + id + '/detail', function(data) {
        var kegiatan = data.laporan.kegiatan.split(",");
        $('.name').val(data.fieldstaff);
        $('.tanggal_laporan').val(data.laporan.tanggal_laporan);
        $('.tanggal_input').val(data.laporan.tanggal_input);
        $('.keterangan').val(data.laporan.keterangan);
        $('.peserta').val(data.namaPeserta);
        $('.keluhan').val(data.laporan.keluhan);
        $('.saran').val(data.laporan.saran);

        if (kegiatan.indexOf("Penyuluhan") > -1 || kegiatan.indexOf(" Penyuluhan") > -1) {
          $('.penyuluhan').prop('checked', true);
        }
        if (kegiatan.indexOf("Pemetaan") > -1 || kegiatan.indexOf(" Pemetaan") > -1) {
          $('.pemetaan').prop('checked', true);
        }
        if (kegiatan.indexOf("Penyusunan Model") > -1 || kegiatan.indexOf(" Penyusunan Model") > -1) {
          $('.penyusunan_model').prop('checked', true)
        }
        if (kegiatan.indexOf("Pendampingan") > -1 || kegiatan.indexOf(" Pendampingan") > -1) {
          $('.pendampingan').prop('checked', true)
        }
        if (kegiatan.indexOf("Penyusunan Data") > -1 || kegiatan.indexOf(" Penyusunan Data") > -1) {
          $('.penyusunan_data').prop('checked', true)
        }
        if (kegiatan.indexOf("Koordinasi") > -1 || kegiatan.indexOf(" Koordinasi") > -1) {
          $('.koordinasi').prop('checked', true)
        }
        if (kegiatan.indexOf("Rapat") > -1 || kegiatan.indexOf(" Rapat") > -1) {
          $('.rapat').prop('checked', true)
        }
        if (kegiatan.indexOf("Lainnya") > -1 || kegiatan.indexOf(" Lainnya") > -1) {
          $('.lainnya').prop('checked', true)
        }
        if (kegiatan.indexOf("Pemetaan Tahun Sebelumnya") > -1 || kegiatan.indexOf(" Pemetaan Tahun Sebelumnya") > -1) {
          $('.pemetaan_sebelumnya').prop('checked', true)
        }
        if (kegiatan.indexOf("Pendampingan Tahun Sebelumnya") > -1 || kegiatan.indexOf(" Pendampingan Tahun Sebelumnya") > -1) {
          $('.pendampingan_sebelumnya').prop('checked', true)
        }
        if (kegiatan.indexOf("Monitoring dan Evaluasi") > -1 || kegiatan.indexOf(" Monitoring dan Evaluasi") > -1) {
          $('.monitoring').prop('checked', true)
        }
        if (data.laporan.foto != null) {
          $('.foto').show();
          $(".foto").attr("src", flagsUrl + "/" + data.laporan.foto);
        } else {
          $('.noFoto').show();
        }
        if (data.laporan.keluhan == null) {
          $('.saran').prop('readonly', true);
        }

      })
    });
  });
</script>

@endsection