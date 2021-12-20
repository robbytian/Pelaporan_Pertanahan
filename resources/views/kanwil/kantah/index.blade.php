@extends('kanwil.layouts.main')
@section('title') Data Kantah @endsection
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title mb-3">
      <h3>Data Kantah</h3>
      <a href="{{url('/dataKantah/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kantah</a>
      
      <table id="tableKantah" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th width="50%">Nama</th>
            <th>Total Fieldstaff</th>
            <th>Action</th>
          </tr>
        </thead>


        <tbody>
            @foreach($allKantah as $kantah)
          <tr>
            <td>{{$kantah->name}}</td>
          
            <td class="text-center">{{$kantah->Fieldstaff->count()}}</td>
            <td> <button class="btn btn-default btn-sm" type="button" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-search"></i> Lihat</button>
              <button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash"></i> Delete</button>
            </td>
          </tr>
          @endforeach


        </tbody>
      </table>
    </div>
   
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

    $('#tableKantah').dataTable({
      "paginate": false,
      "autoWidth": false,
      
    });

  });
</script>
@endsection