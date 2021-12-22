@extends('fieldstaff.layouts.main')
@section('title') Data Rencana Bulanan @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
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
          <th>Nama Fieldstaff</th>
          <th>Periode</th>
          <th>Lokasi</th>
          <th>Rencana Tindak Lanjut</th>
          <th>Action</th>
        </tr>
      </thead>


      <tbody>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td><button class="btn btn-default btn-sm" id="btnLihat" type="button" data-toggle="modal" data-target="#dataFieldstaff">
            <i class="fa fa-search"></i> Lihat</button>
          <button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash"></i> Delete</button>
        </td>


      </tbody>
    </table>

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

  });
</script>

@endsection