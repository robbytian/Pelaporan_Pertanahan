@extends('fieldstaff.layouts.main')
@section('title') Tambah Tahapan @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    @include('layouts.notif')
    <div class="page-title">
        <div class="title_left ">
            <h4><small><a href="/dataTahapan">Data Tahapan</a> / Tambah Tahapan</small></h4>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Input Tahapan</h2>
            <div class="clearfix"></div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left-margin">
            <form class="form-horizontal form-label-left" method="post" action="/dataTahapan/{{$tahapan->id}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 col-xs-12" style="margin-top:10px">
                        <div class="form-group">
                            <label>Nama Fieldstaff</label>
                            <input type="text" class="form-control" placeholder="Nama Fieldstaff" value="{{\App\Models\Fieldstaff::getUser()->name}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12" style="margin-top:10px">
                        <div class="form-group">
                            <label>Target Fisik (KK)</label>
                            <input type="number" name="targetFisik" class="form-control" readonly value="{{\App\Models\Fieldstaff::getUser()->target}}">
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12" style="margin-top:10px">
                        <div class="form-group">
                            <label>Tahapan Akses Reforma Agraria</label>
                            <select id="tahapan" class="select2_single form-control" tabindex="-1" name="tahapan" required>
                                <option selected disabled>Pilih Tahapan Akses Reforma Agraria</option>
                                <option value="pemetaan" {{old('tahapan') == "pemetaan" ? 'selected' : ''}}>Pemetaan Sosial</option>
                                <option value="penyuluhan" {{old('tahapan') == "penyuluhan" ? 'selected' : ''}}>Penyuluhan</option>
                                <option value="penyusunan" {{old('tahapan') == "penyusunan" ? 'selected' : ''}}>Penyusunan Model</option>
                                <option value="pendampingan" {{old('tahapan') == "pendampingan" ? 'selected' : ''}}>Pendampingan</option>
                                <option value="evaluasi" {{old('tahapan') == "evaluasi" ? 'selected' : ''}}>Evaluasi dan Pelaporan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12" style="margin-top:10px">
                        <div class="form-group">
                            <label>Realisasi yang Sudah Di Input</label>
                            <input id="realisasi" type="number" class="form-control" name="realisasiDiInput" readonly value="{{old('realisasiDiInput')}}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12" style="margin-top:10px">
                        <div class="form-group">
                            <label>Realisasi Fisik</label>
                            <input id="realisasiFisik" name="jumlahRealisasi" type="number" class="form-control " placeholder="Realisasi Fisik" value="{{old('jumlahRealisasi')}}" required>
                        </div>
                    </div>

                </div>
                <div class=" form-group" style="margin-top:10px">
                    <button type="submit" class="btn btn-primary" style="float:left">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    const tahapan = document.querySelector('#tahapan');
    const realisasi = document.querySelector('#realisasi');
    const realisasiFisik = document.querySelector('#realisasiFisik');

    tahapan.addEventListener('change', function() {
        fetch('/dataTahapan/cekRealisasi/{{\App\Models\Fieldstaff::getUser()->id}}?jenis=' + tahapan.value)
            .then(response => response.json())
            .then(data => realisasi.value = data.realisasi)
    });
</script>
@endsection