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
          <th width="18%">Keluhan</th>
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
          <td>{{empty($report->keluhan) ? '-' : $report->keluhan}}</td>
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
          <form class="form-horizontal form-label-left" method="post" id="upadteLaporan">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Nama Fieldstaff</label>
              <input type="text" id="" name="name" class="form-control" placeholder="Nama Fieldstaff" value="{{\App\Models\Fieldstaff::getUser()->name}}" readonly>
            </div>
            <br>
            <div class="form-group">
              <label>Tanggal Laporan</label>
              <input type="text" name="tanggal_laporan" id="tanggal_laporan" class="form-control" placeholder="Password" readonly>
            </div>
            <br>
            <div class="form-group">
              <label>Tanggal Input</label>
              <input type="text" name="tanggal_input" id="tanggal_input" class="form-control" placeholder="Password" readonly>
            </div>
            <br>
            <div class="form-group">
              <label>Kegiatan </label>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="koordinasi" name="kegiatans[]" class="flat" value="koordinasi" checked=FALSE> Koordinasi dengan kantah
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="pendampingan" name="kegiatans[]" class="flat" value="pendampingan"> Melakukan Pendampingan
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="rapat" name="kegiatans[]" class="flat" value="rapat"> Rapat/Meeting
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="kunjungan" name="kegiatans[]" class="flat" value="kunjungan"> Melakukan Kunjungan
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="lainnya" name="kegiatans[]" class="flat" value="lainnya"> Lainnya
                </label>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="message">Keterangan </label>
              <textarea id="keterangan" name="keterangan" required="required" class="form-control" rows="3" placeholder="Keterangan.."></textarea>
            </div>
            <br>
            <div class=" form-group">
              <label>Peserta </label>
              <input type="text" name="peserta" id="peserta" class="form-control" placeholder="Peserta" value="{{old('peserta')}}">
            </div>
            <br>
            <div class="form-group">
              <label for="message">Keluhan </label>
              <textarea name="keluhan" id="keluhan" required="required" class="form-control" rows="3" placeholder="Keterangan.."></textarea>
            </div>
            <br>
            <div class="form-group">
              <label for="message">Saran</label>
              <textarea name="saran" id="saran" required="required" class="form-control" rows="3" placeholder="Keterangan.." readonly></textarea>
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
  $(document).ready(function() {
    console.log('aa');

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
      event.preventDefault();
      $('#foto').hide();
      // $('#noFoto').hide();
      // $('#koordinasi').removeAttr('checked');
      // $('#pendampingan').removeAttr('checked');
      // $('#rapat').removeAttr('checked');
      // $('#kunjungan').removeAttr('checked');
      // $('#lainnya').removeAttr('checked');
      var id = $(this).data('id');
      $("#updateLaporan").attr('action', '/dataLaporan/' + id);
      $.get('dataLaporan/' + id + '/detail', function(data) {
        var kegiatan = data.laporan.kegiatan.split(",");
        console.log(kegiatan);
        console.log(kegiatan.indexOf("koordinasi"));
        $('#tanggal_laporan').val(data.laporan.tanggal_laporan);
        $('#tanggal_input').val(data.laporan.tanggal_input);
        $('#keterangan').val(data.laporan.keterangan);
        $('#peserta').val(data.laporan.peserta);
        $('#keluhan').val(data.laporan.keluhan);
        $('#saran').val(data.laporan.saran);
        if (kegiatan.indexOf("koordinasi") > -1) {
          $('#koordinasi').prop('checked', true);
        }
        if (kegiatan.indexOf("pendampingan") > -1) {
          $('#pendampingan').prop('checked', true);
        }
        if (kegiatan.indexOf("rapat") > -1) {
          $('#rapat').prop('checked', true);

        }
        if (kegiatan.indexOf("kunjungan") > -1) {
          $('#kunjungan').prop('checked', true);
        }
        if (kegiatan.indexOf("lainnya") > -1) {
          $('#lainnya').prop('checked', true);
        }
        if (data.laporan.foto != null) {
          $('#foto').show();
          $("#foto").attr("src", flagsUrl + "/" + data.laporan.foto);
        } else {
          $('#noFoto').show();
        }

      })
    });
  });
</script>

@endsection