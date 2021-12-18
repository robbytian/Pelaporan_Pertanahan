@extends('fieldstaff.layouts.main')
@section('title') Dashboard @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title mb-3">
      <h3>Data Tahapan</h3>
      <a href="{{url('/dataTahapan/create')}}" class="btn btn-primary">Tambah Tahapan</a>
      <table id="tableLaporan" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Nama Fieldstaff</th>
            <th>Total</th>
            <th>Pemetaan Sosial</th>
            <th>Penyuluhan</th>
            <th>Penyusunan Model</th>
            <th>Pendampingan</th>
            <th>Evaluasi dan Pelaporan</th>
          </tr>
        </thead>


        <tbody>
     

        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    console.log('aa');

    $('#tableLaporan').dataTable({
      "paginate": false,
      buttons: [{
        text: 'My button',
        action: function(e, dt, node, config) {
          alert('Button activated');
        }
      }]
    });

  });
</script>

@endsection