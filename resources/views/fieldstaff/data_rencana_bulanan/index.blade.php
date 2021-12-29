@extends('fieldstaff.layouts.main')
@section('title') Data Rencana Bulanan @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  @include('layouts.notif')
  <div class="x_panel">
    <div class="x_title">
      <h2>Data Rencana Bulanan</h2>
      <div class="clearfix"></div>
    </div>
    <a href="{{url('/dataRencana/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Rencana Bulanan</a>
    <a href="{{url('/dataRencana/cetak')}}" class="btn btn-success"><i class="fa fa-print"></i> Cetak Rencana Bulanan</a>
    <br><br>

    <table id="tableRencana" class="table table-striped table-bordered ">
      <thead>
        <tr>
          <th width="15%">Nama Fieldstaff</th>
          <th width="15%">Periode</th>
          <th>Lokasi</th>
          <th>Rencana Tindak Lanjut</th>
          <th width="20%">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($rencanas as $rencana)
        <tr>
          <td>{{\App\Models\Fieldstaff::getUser()->name}}</td>
          <td>{{date('F Y',strtotime($rencana->periode))}}</td>
          <td>{{$rencana->lokasi}}</td>
          <td>{{$rencana->tindak_lanjut}}</td>
          <td><button class="btn btn-default btn-sm btnLihat" id="" data-id="{{$rencana->id}}" type="button" data-toggle="modal" data-target="#modalRencana">
              <i class="fa fa-search"></i> Lihat</button>
            <button class="btn btn-danger btn-sm btnHapus" id="" type="button" data-id="{{$rencana->id}}" type="button" data-toggle="modal" data-target="#modalDelete"><i class="fa fa-trash"></i> Delete</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalRencana" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Detail Rencana</h4>
      </div>
      <div class="modal-body">
        <div class="">
          <form class="form-horizontal form-label-left" method="post" id="updateRencana">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Nama Fieldstaff</label>
              <input type="text" id="" name="name" class="form-control" placeholder="Nama Fieldstaff" value="{{\App\Models\Fieldstaff::getUser()->name}}" readonly>
            </div>
            <br>
            <div class="form-group">
              <label>Periode</label>
              <input type="text" id="periode" name="periode" class="form-control" placeholder="Periode" required readonly>
            </div>
            <br>
            <div class="form-group">
              <label>Lokasi</label>
              <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="Lokasi" required>
            </div>
            <br>
            <div class="form-group">
              <label>Rencana Tindak Lanjut</label>
              <textarea id="rencana" name="tindak_lanjut" required="required" class="form-control" placeholder="Keterangan.." rows="3"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
    </form>
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
        <form method="post" id="deleteRencana">
          @csrf
          @method('DELETE')
          <p>Anda yakin ingin menghapus data rencana ini?</p>
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
  $(document).ready(function() {
    console.log('aa');

    $('#tableRencana').dataTable({
      "autoWidth": false,
    });

    $('body').on('click', '.btnLihat', function(event) {
      event.preventDefault();
      var id = $(this).data('id');
      $("#updateRencana").attr('action', '/dataRencana/' + id);
      $.get('dataRencana/' + id + '/detail', function(data) {
        $('#periode').val(data.rencana.periode);
        $('#lokasi').val(data.rencana.lokasi);
        $('#rencana').val(data.rencana.tindak_lanjut);

      })
    });

    $('body').on('click', '.btnHapus', function() {
      event.preventDefault();
      var id = $(this).data('id');
      $("#deleteRencana").attr('action', '/dataRencana/' + id);
    })

  });
</script>

@endsection