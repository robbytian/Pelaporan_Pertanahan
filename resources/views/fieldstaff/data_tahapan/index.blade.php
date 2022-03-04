@extends('fieldstaff.layouts.main')
@section('title') Data Tahapan @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  @include('layouts.notif')
  <div class="x_panel">
    <div class="x_title">
      <h2>Data Tahapan</h2>
      <div class="filter">
        <a href="{{url('/dataTahapan/inputTahapan')}}" class="btn btn-primary btn-sm pull-right btn-sm"><i class="fa fa-plus"></i> Tambah Tahapan</a>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="x-content">
      @if(!empty(auth()->user()->getUser()->kantah_id))
      <div class="col-md-12 col-xs-12">
        <br>
        <div class="col-md-12 col-xs-12">
          <div class="col-md-3 col-sm-5 col-xs-5">
            <p for="">Penyuluhan</p>
          </div>
          <div class="col-md-8 col-sm-6 col-xs-5">
            <div class="progress ">
              <div class="progress-bar progress-bar-success" data-transitiongoal="{{$tahapan->penyuluhan}}" aria-valuemax="{{$fieldstaff->target}}"></div>
            </div>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-2">
            <p for="">{{$tahapan->penyuluhan}}/{{$fieldstaff->target}}</p>
          </div>
        </div>
        <hr>
        <div class=" col-md-12 col-xs-12">
          <div class="col-md-3 col-sm-5 col-xs-5">
            <p for="">Pemetaan Sosial</p>
          </div>
          <div class="col-md-8 col-sm-6 col-xs-5">
            <div class="progress">
              <div class="progress-bar progress-bar-danger" data-transitiongoal="{{$tahapan->pemetaan_sosial}}" aria-valuemax="{{$fieldstaff->target}}"></div>
            </div>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-2">
            <p for="">{{$tahapan->pemetaan_sosial}}/{{$fieldstaff->target}}</p>
          </div>
        </div>
        <hr>
        <div class="col-md-12 col-xs-12">
          <div class="col-md-3 col-sm-5 col-xs-5">
            <p for="">Penyusunan Model</p>
          </div>
          <div class="col-md-8 col-sm-6 col-xs-5">
            <div class="progress ">
              <div class="progress-bar progress-bar-primary" data-transitiongoal="{{$tahapan->penyusunan_model}}" aria-valuemax="{{$fieldstaff->target}}"></div>
            </div>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-2">
            <p for="">{{$tahapan->penyusunan_model}}/{{$fieldstaff->target}}</p>
          </div>
        </div>
        <hr>
        <div class="col-md-12 col-xs-12">
          <div class="col-md-3 col-sm-5 col-xs-5">
            <p for="">Pendampingan</p>
          </div>
          <div class="col-md-8 col-sm-6 col-xs-5">
            <div class="progress progress_wide">
              <div class="progress-bar progress-bar-warning" data-transitiongoal="{{$tahapan->pendampingan}}" aria-valuemax="{{$fieldstaff->target}}"></div>
            </div>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-2">
            <p for="">{{$tahapan->pendampingan}}/{{$fieldstaff->target}}</p>
          </div>
        </div>
        <hr>
        <div class="col-md-12 col-xs-12">
          <div class="col-md-3 col-sm-5 col-xs-5">
            <p for="">Penyusunan Data</p>
          </div>
          <div class="col-md-8 col-sm-6 col-xs-5">
            <div class="progress">
              <div class="progress-bar progress-bar-gray" data-transitiongoal="{{$tahapan->penyusunan_data}}" aria-valuemax="{{$fieldstaff->target}}"></div>
            </div>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-2">
            <p for="">{{$tahapan->penyusunan_data}}/{{$fieldstaff->target}}</p>
          </div>
        </div>
      </div>
      @else
      <div class="col-md-12 col-xs-12">
        <br>
        <div class=" col-md-12 col-xs-12">
          <div class="col-md-3 col-sm-5 col-xs-5">
            <p for="">Pemetaan Sosial</p>
          </div>
          <div class="col-md-8 col-sm-6 col-xs-5">
            <div class="progress">
              <div class="progress-bar progress-bar-danger" data-transitiongoal="{{$tahapan->pemetaan_sosial}}" aria-valuemax="{{$fieldstaff->target}}"></div>
            </div>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-2">
            <p for="">{{$tahapan->pemetaan_sosial}}/{{$fieldstaff->target}}</p>
          </div>
        </div>
        <hr>

        <div class="col-md-12 col-xs-12">
          <div class="col-md-3 col-sm-5 col-xs-5">
            <p for="">Pendampingan</p>
          </div>
          <div class="col-md-8 col-sm-6 col-xs-5">
            <div class="progress progress_wide">
              <div class="progress-bar progress-bar-warning" data-transitiongoal="{{$tahapan->pendampingan}}" aria-valuemax="{{$fieldstaff->target}}"></div>
            </div>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-2">
            <p for="">{{$tahapan->pendampingan}}/{{$fieldstaff->target}}</p>
          </div>
        </div>
        <hr>

      </div>
      @endif
    </div>
  </div>

  <div class="x_panel">
    <div class="x_title">
      <h2>Histori Penambahan</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x-content">
      <table id="tableTahapan" class="table table-striped table-bordered ">
        <thead>
          <tr>
            <th width="30%">Tanggal Input</th>
            <th width="30%">Tahapan</th>
            <th width="20%">Jumlah</th>
            <th width="20%">File Evidence</th>
            <th width="20%">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($histories as $histori)
          <tr>
            <td>{{date('d F Y ( H:i:s )',strtotime($histori->created_at))}}</td>
            <td>{{$histori->tahapan}}</td>
            <td>{{$histori->jumlah}}</td>
            <td>
              @if(!empty($histori->evidence))
              <a href="{{asset('tahapan_evidence/'.$histori->evidence)}}"><i class="fa fa-file"></i> {{$histori->evidence}}</a>
              @else
              -
              @endif
            </td>
            <td><button data-id="{{$histori->id}}" class="btn btn-danger btn-sm btnHapus" type="button" data-toggle="modal" data-target="#modalDelete"><i class="fa fa-trash"></i> Delete</button></td>
          </tr>
          @endforeach
        </tbody>
      </table>
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
        <form method="post" id="deleteHistori">
          @csrf
          @method('DELETE')
          <p>Anda yakin ingin menghapus histori tahapan ini?</p>
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
    $('#tableTahapan').dataTable({
      "autoWidth": false,
      "bLengthChange": false,
      "bInfo": false,
      "searching": false
    });

    $('body').on('click', '.btnHapus', function() {
      event.preventDefault();
      var id = $(this).data('id');
      $("#deleteHistori").attr('action', '/dataHistori/' + id);
    });

  });
</script>

@endsection