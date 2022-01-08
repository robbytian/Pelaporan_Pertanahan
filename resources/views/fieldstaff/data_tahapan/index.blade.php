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
      <div class="col-md-12 col-xs-12">
        <br>
        <div class="col-md-12 col-xs-12">
          <div class="col-md-3 col-sm-5 col-xs-5">
            <p for="">Pemetaan Sosial</p>
          </div>
          <div class="col-md-8 col-sm-6 col-xs-5">
            <div class="progress ">
              <div class="progress-bar progress-bar-success" data-transitiongoal="{{$tahapan->pemetaan}}" aria-valuemax="{{$fieldstaff->target}}"></div>
            </div>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-2">
            <p for="">{{$tahapan->pemetaan}}/{{$fieldstaff->target}}</p>
          </div>
        </div>
        <hr>
        <div class=" col-md-12 col-xs-12">
          <div class="col-md-3 col-sm-5 col-xs-5">
            <p for="">Penyuluhan</p>
          </div>
          <div class="col-md-8 col-sm-6 col-xs-5">
            <div class="progress">
              <div class="progress-bar progress-bar-danger" data-transitiongoal="{{$tahapan->penyuluhan}}" aria-valuemax="{{$fieldstaff->target}}"></div>
            </div>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-2">
            <p for="">{{$tahapan->penyuluhan}}/{{$fieldstaff->target}}</p>
          </div>
        </div>
        <hr>
        <div class="col-md-12 col-xs-12">
          <div class="col-md-3 col-sm-5 col-xs-5">
            <p for="">Penyusunan Model</p>
          </div>
          <div class="col-md-8 col-sm-6 col-xs-5">
            <div class="progress ">
              <div class="progress-bar progress-bar-primary" data-transitiongoal="{{$tahapan->penyusunan}}" aria-valuemax="{{$fieldstaff->target}}"></div>
            </div>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-2">
            <p for="">{{$tahapan->penyusunan}}/{{$fieldstaff->target}}</p>
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
            <p for="">Evaluasi dan Pelaporan</p>
          </div>
          <div class="col-md-8 col-sm-6 col-xs-5">
            <div class="progress">
              <div class="progress-bar progress-bar-gray" data-transitiongoal="{{$tahapan->evaluasi}}" aria-valuemax="{{$fieldstaff->target}}"></div>
            </div>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-2">
            <p for="">{{$tahapan->evaluasi}}/{{$fieldstaff->target}}</p>
          </div>

        </div>

      </div>

    </div>


  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
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