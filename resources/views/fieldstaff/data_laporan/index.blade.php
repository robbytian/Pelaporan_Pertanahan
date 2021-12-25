@extends('fieldstaff.layouts.main')
@section('title') Data Laporan @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
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
          <th>Nama Fieldstaff</th>
          <th>Tanggal Laporan</th>
          <th>Tanggal Input</th>
          <th>Kegiatan</th>
          <th>Keluhan</th>
          <th>Action</th>
        </tr>
      </thead>


      <tbody>
        @foreach($reports as $report)
        <tr>
          <td>{{\App\Models\Fieldstaff::getUser()->name}}</td>
          <td>{{date('d F Y',strtotime($report->tanggal_laporan))}}</td>
          <td>{{date('d F Y',strtotime($report->created_at))}}</td>
          <td>{{$report->kegiatan}}</td>
          <td>{{$report->keluhan}}</td>
          <td> <button class="btn btn-default btn-sm" type="button" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-search"></i> Lihat</button>
            <button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash"></i> Delete</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="clearfix"></div>

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
      "autoWidth": false,
    });

  });
</script>

@endsection