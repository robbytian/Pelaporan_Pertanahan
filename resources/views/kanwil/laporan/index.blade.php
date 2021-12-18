@extends('kanwil.layouts.main')
@section('title') Dashboard @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
                  <div class="x_title mb-3">
                    <h3 >Data Laporan</h3>
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
                          <td> <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> Lihat</button>
                          <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i> Delete</button></td>
                        </tr>
                        
                       
                      </tbody>
                    </table>
</div>
</div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        console.log('aa');
        $('#tableLaporan').dataTable({
            "paginate" : false
        });
     
    });
       
</script>

@endsection