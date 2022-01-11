@extends('kanwil.layouts.main')
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
      $('#foto').hide();
      $('#noFoto').hide();
      $('#koordinasi').prop('checked', false);
      $('#pendampingan').prop('checked', false);
      $('#rapat').prop('checked', false);
      $('#kunjungan').prop('checked', false);
      $('#lainnya').prop('checked', false);
      $('#saran').removeAttr('readonly');
      var id = $(this).data('id');
      $("#updateLaporan").attr('action', '/dataLaporan/' + id);
      $.get('dataLaporan/' + id + '/detail', function(data) {
        var kegiatan = data.laporan.kegiatan.split(",");
        $('#tanggal_laporan').val(data.laporan.tanggal_laporan);
        $('#tanggal_input').val(data.laporan.tanggal_input);
        $('#keterangan').val(data.laporan.keterangan);
        $('#peserta').val(data.namaPeserta);
        $('#keluhan').val(data.laporan.keluhan);
        $('#saran').val(data.laporan.saran);

        if (kegiatan.indexOf("koordinasi") > -1 || kegiatan.indexOf(" koordinasi") > -1) {
          $('#koordinasi').prop('checked', true);
        }
        if (kegiatan.indexOf("pendampingan") > -1 || kegiatan.indexOf(" pendampingan") > -1) {
          $('#pendampingan').prop('checked', true);
        }
        if (kegiatan.indexOf("rapat") > -1 || kegiatan.indexOf(" rapat") > -1) {
          $('#rapat').prop('checked', true)
        }
        if (kegiatan.indexOf("kunjungan") > -1 || kegiatan.indexOf(" kunjungan") > -1) {
          $('#kunjungan').prop('checked', true)
        }
        if (kegiatan.indexOf("lainnya") > -1 || kegiatan.indexOf(" lainnya") > -1) {
          $('#lainnya').prop('checked', true)
        }
        if (data.laporan.foto != null) {
          $('#foto').show();
          $("#foto").attr("src", flagsUrl + "/" + data.laporan.foto);
        } else {
          $('#noFoto').show();
        }

        if (data.laporan.keluhan == null) {
          $('#saran').prop('readonly', true);
        }

      })
    });
  });
</script>

@endsection