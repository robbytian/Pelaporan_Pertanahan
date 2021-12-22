@extends('kantah.layouts.main')
@section('title') Dashboard @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Data Laporan</h2>
      <div class="clearfix"></div>
    </div>
    <table id="tableLaporan" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Nama Fieldstaff</th>
          <th>Tanggal Laporan</th>
          <th>Tanggal Input</th>
          <th>Kegiatan</th>
          <th>Keluhan</th>
          <th>Action</th>
        </tr>
      </thead>


      <tbody>
        <tr>
          <td>Tiger Nixon</td>
          <td>System Architect</td>
          <td>Edinburgh</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td> <button class="btn btn-default" type="button" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-search"></i> Lihat</button>
            <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i> Delete</button>
          </td>
        </tr>


      </tbody>
    </table>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    console.log('aa');
    $('#tableLaporan').dataTable({
      "paginate": false
    });

  });
</script>

@endsection