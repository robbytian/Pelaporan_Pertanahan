@extends('fieldstaff.layouts.main')
@section('title') Data Laporan @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  @include('layouts.notif')
  <div class="x_panel">
    <div class="x_title">
      <h2>Data Laporan</h2>
      <div class="clearfix"></div>
    </div>
    <a href="{{url('/dataLaporan/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Laporan</a>
    <a href="{{url('/dataLaporan/cetak')}}" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</a>
    <br><br>
    <table id="tableLaporan" class="table table-striped table-bordered dt-responsive " width="100%">
      <thead>
        <tr>
          <th width="15%">Nama Fieldstaff</th>
          <th width="15%">Tanggal Laporan</th>
          <th width="15%">Tanggal Input</th>
          <th width="19%">Kegiatan</th>
          <th width="18%">Kendala</th>
          <th width="18%">Action</th>
        </tr>
      </thead>


      <tbody>
        @foreach($reports as $report)
        <tr>
          <td>{{\App\Models\Fieldstaff::getUser()->name}}</td>
          <td>{{date('d F Y',strtotime($report->tanggal_laporan))}}</td>
          <td>{{date('d F Y',strtotime($report->created_at))}}</td>
          <td>{{$report->kegiatan}}</td>
          <td>
            @if(empty($report->keluhan))
            -
            @else
            @if(empty($report->saran))
            <span class="label label-danger">Terdapat Kendala</span>
            @else
            <span class="label label-success">Saran sudah diberikan</span>
            @endif
            @endif

          </td>
          <td> <button class="btn btn-default btn-sm btnLihat" type="button" data-toggle="modal" data-target="#modalUpdate" data-id="{{$report->id}}"> <i class="fa fa-search"></i> Lihat</button>
            <button data-id="{{$report->id}}" class="btn btn-danger btn-sm btnHapus" type="button" data-toggle="modal" data-target="#modalDelete"><i class="fa fa-trash"></i> Delete</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="clearfix"></div>

  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Detail Laporan</h4>
      </div>
      <div class="modal-body">
        <div class="">
          <form class="form-horizontal form-label-left" method="post" id="updateLaporan">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Nama Fieldstaff</label>
              <input type="text" id="" name="name" class="form-control" placeholder="Nama Fieldstaff" value="{{\App\Models\Fieldstaff::getUser()->name}}" readonly>
            </div>
            <br>
            <div class="form-group">
              <label>Tanggal Laporan</label>
              <input type="text" name="tanggal_laporan" id="tanggal_laporan" class="form-control" placeholder="tanggal laporan" readonly>
            </div>
            <br>
            <div class="form-group">
              <label>Tanggal Input</label>
              <input type="text" name="tanggal_input" id="tanggal_input" class="form-control" placeholder="tanggal input" readonly>
            </div>
            <br>
            <div class="form-group ">
              <label>Kegiatan </label>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="koordinasi" name="kegiatans[]" value="koordinasi"> Koordinasi dengan kantah
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="pendampingan" name="kegiatans[]" value="pendampingan"> Melakukan Pendampingan
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="rapat" name="kegiatans[]" value="rapat"> Rapat/Meeting
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="kunjungan" name="kegiatans[]" value="kunjungan"> Melakukan Kunjungan
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="lainnya" name="kegiatans[]" value="lainnya"> Lainnya
                </label>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="message">Keterangan </label>
              <textarea id="keterangan" name="keterangan" required="required" class="form-control" rows="3" placeholder="Keterangan.."></textarea>
            </div>
            <br>
            <div class="form-group pesertaPertama">
              <label>Peserta </label>

            </div>
            <div id="listPeserta">
              <!-- <div class="input-group" id="peserta' + inc + '">
                <input type="text" name="peserta[]" class="form-control" placeholder="Peserta" required>
                <span class="input-group-btn">
                  <button type="button" class="btn btn-danger removePeserta" id="' + inc + '"><i class="fa fa-close"></i></button>
                </span>
              </div> -->
            </div>
            <div class="form-group">
              <button type="button" id="addPeserta" class="btn btn-default col-md-12 col-xs-12" style="float:left;border:1px dashed gray"><i class="fa fa-plus"></i> Tambah Peserta</button=>
            </div>
            <br>
            <div class="form-group">
              <label for="message">Kendala </label>
              <textarea name="keluhan" id="keluhan" class="form-control" rows="3" placeholder="Kendala.."></textarea>
            </div>
            <br>
            <div class="form-group">
              <label for="message">Saran</label>
              <textarea name="saran" id="saran" class="form-control" rows="3" placeholder="Saran.." readonly></textarea>
            </div>
            <br>
            <div class="form-group">
              <label for="message">Foto</label> <br>
              <img id="foto" src="#" class="imgLaporan2" style="display:none" />
              <p id="noFoto" style="display:none"> <i>Tidak ada Foto yang diupload</i> </p>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Delete-->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Konfirmasi Penghapusan</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="deleteLaporan">
          @csrf
          @method('DELETE')
          <p>Anda yakin ingin menghapus data laporan ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  // var base_url = "{!! url('public/images/laporan') !!}";
  // console.log(base_url);
  var flagsUrl = "{{ URL::asset('/images/laporan/') }}";
  var inc = 0;
  $(document).ready(function() {

    $('#tableLaporan').dataTable({
      "autoWidth": false,
    });

    $('body').on('click', '.btnHapus', function() {
      event.preventDefault();
      var id = $(this).data('id');
      console.log(id);
      $("#deleteLaporan").attr('action', '/dataLaporan/' + id);
    });

    $('body').on('click', '.btnLihat', function(event) {
      console.log(inc);
      event.preventDefault();

      var id = $(this).data('id');
      // console.log(id);
      $("#updateLaporan").attr('action', '/dataLaporan/' + id);
      $.get('dataLaporan/' + id + '/detail', function(data) {
        var kegiatan = data.laporan.kegiatan.split(",");
        $('#tanggal_laporan').val(data.laporan.tanggal_laporan);
        $('#tanggal_input').val(data.laporan.tanggal_input);
        $('#keterangan').val(data.laporan.keterangan);
        // console.log(data.listPeserta);
        $('#keluhan').val(data.laporan.keluhan);
        $('#saran').val(data.laporan.saran);

        data.listPeserta.forEach(function(index) {
          if (inc == 0) {
            $('.pesertaPertama').append(
              '<input type="text" name="peserta[]" id="peserta" class="form-control inputPeserta" placeholder="Peserta" required value="' + index + '">'
            );
          } else {
            $('#listPeserta').append(
              '<div class="input-group inputPeserta" id="peserta' + inc + '">' +
              '<input type="text" name="peserta[]" class="form-control" placeholder="Peserta" required value="' + index + '">' +
              '<span class="input-group-btn">' +
              '<button type="button" class="btn btn-danger removePeserta" id="' + inc + '"><i class="fa fa-close"></i></button>' +
              '</span>' +
              '</div>'
            );
          }
          inc++;
        });
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

      })
    });

    $('#modalUpdate').on('hidden.bs.modal', function() {
      $('#foto').hide();
      $('#noFoto').hide();
      $('#koordinasi').prop('checked', false);
      $('#pendampingan').prop('checked', false);
      $('#rapat').prop('checked', false);
      $('#kunjungan').prop('checked', false);
      $('#lainnya').prop('checked', false);
      $('.inputPeserta').remove();
      inc = 0;
    })

    $("#addPeserta").on('click', function() {
      $('#listPeserta').append(
        '<div class="input-group inputPeserta" id="peserta' + inc + '">' +
        '<input type="text" name="peserta[]" class="form-control" placeholder="Peserta" required>' +
        '<span class="input-group-btn">' +
        '<button type="button" class="btn btn-danger removePeserta" id="' + inc + '"><i class="fa fa-close"></i></button>' +
        '</span>' +
        '</div>'
      );
      inc++;
    });

    $(document).on('click', '.removePeserta', function() {
      $id = $(this).attr('id');
      $('#peserta' + $id).remove();

    });
  });
</script>

@endsection