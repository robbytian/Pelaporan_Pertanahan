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
            @if(auth()->user()->getUser()->kantah_id != null)
            <input type="hidden" id="fs" value="kantah">
            <div class="form-group ">
              <label>Kegiatan </label>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="penyuluhan" name="kegiatans[]" value="Penyuluhan"> Melaksanakan Penyuluhan
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="pemetaan" name="kegiatans[]" value="Pemetaan"> Melaksanakan Pemetaan Sosial
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="penyusunan_model" name="kegiatans[]" value="Penyusunan Model"> Penyusunan Model
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="pendampingan" name="kegiatans[]" value="Pendampingan"> Melaksanakan Pendampingan
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="penyusunan_data" name="kegiatans[]" value="Penyusunan Data"> Penyusunan Data
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="koordinasi" name="kegiatans[]" value="Koordinasi"> Koordinasi dengan Instansi / tim penanganan
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="rapat" name="kegiatans[]" value="Rapat"> Rapat / Meeting
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="lainnya" name="kegiatans[]" value="Lainnya"> Lainnya
                </label>
              </div>
            </div>
            @elseif(auth()->user()->getUser()->kanwil_id != null)
            <input type="hidden" id="fs" value="kanwil">
            <div class="form-group ">
              <label>Kegiatan </label>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="pemetaan_sebelumnya" name="kegiatans[]" value="Pemetaan Tahun Sebelumnya"> Melaksanakan Pemetaan sosial tahun sebelumnya
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="pendampingan_sebelumnya" name="kegiatans[]" value="Pendampingan Tahun Sebelumnya"> Melaksanakan Pendampingan tahun sebelumnya
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="monitoring" name="kegiatans[]" value="Monitoring dan Evaluasi"> Monitoring dan Evaluasi pelaksanaan akses reforma
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="koordinasi2" name="kegiatans[]" value="Koordinasi"> Koordinasi dengan instansi/ tim penanganan
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="rapat2" name="kegiatans[]" value="Rapat"> Rapat / Meeting
                </label>
              </div>
            </div>
            @endif
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
    let fs = $('#fs').val();

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
        if (fs == 'kantah') {
          if (kegiatan.indexOf("Penyuluhan") > -1 || kegiatan.indexOf(" Penyuluhan") > -1) {
            $('#penyuluhan').prop('checked', true);
          }
          if (kegiatan.indexOf("Pemetaan") > -1 || kegiatan.indexOf(" Pemetaan") > -1) {
            $('#pemetaan').prop('checked', true);
          }
          if (kegiatan.indexOf("Penyusunan Model") > -1 || kegiatan.indexOf(" Penyusunan Model") > -1) {
            $('#penyusunan_model').prop('checked', true)
          }
          if (kegiatan.indexOf("Pendampingan") > -1 || kegiatan.indexOf(" Pendampingan") > -1) {
            $('#pendampingan').prop('checked', true)
          }
          if (kegiatan.indexOf("Penyusunan Data") > -1 || kegiatan.indexOf(" Penyusunan Data") > -1) {
            $('#penyusunan_data').prop('checked', true)
          }
          if (kegiatan.indexOf("Koordinasi") > -1 || kegiatan.indexOf(" Koordinasi") > -1) {
            $('#koordinasi').prop('checked', true)
          }
          if (kegiatan.indexOf("Rapat") > -1 || kegiatan.indexOf(" Rapat") > -1) {
            $('#rapat').prop('checked', true)
          }
          if (kegiatan.indexOf("Lainnya") > -1 || kegiatan.indexOf(" Lainnya") > -1) {
            $('#lainnya').prop('checked', true)
          }
        } else if (fs == 'kanwil') {
          if (kegiatan.indexOf("Pemetaan Tahun Sebelumnya") > -1 || kegiatan.indexOf(" Pemetaan Tahun Sebelumnya") > -1) {
            $('#pemetaan_sebelumnya').prop('checked', true);
          }
          if (kegiatan.indexOf("Pendampingan Tahun Sebelumnya") > -1 || kegiatan.indexOf(" Pendampingan Tahun Sebelumnya") > -1) {
            $('#pendampingan_sebelumnya').prop('checked', true);
          }
          if (kegiatan.indexOf("Monitoring dan Evaluasi") > -1 || kegiatan.indexOf(" Monitoring dan Evaluasi") > -1) {
            $('#monitoring').prop('checked', true);
          }
          if (kegiatan.indexOf("Koordinasi") > -1 || kegiatan.indexOf(" Koordinasi") > -1) {
            $('#koordinasi2').prop('checked', true);
          }
          if (kegiatan.indexOf("Rapat") > -1 || kegiatan.indexOf(" Rapat") > -1) {
            $('#rapat2').prop('checked', true);
          }
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
      if (fs == 'kantah') {
        $('#penyuluhan').prop('checked', false);
        $('#pemetaan').prop('checked', false);
        $('#penyusunan_model').prop('checked', false);
        $('#pendampingan').prop('checked', false);
        $('#penyusunan_data').prop('checked', false);
        $('#koordinasi').prop('checked', false);
        $('#rapat').prop('checked', false);
        $('#lainnya').prop('checked', false);
      } else if (fs == 'kanwil') {
        $('#pemetaan_sebelumnya').prop('checked', false);
        $('#pendampingan_sebelumnya').prop('checked', false);
        $('#monitoring').prop('checked', false);
        $('#koordinasi2').prop('checked', false);
        $('#rapat2').prop('checked', false);
      }
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