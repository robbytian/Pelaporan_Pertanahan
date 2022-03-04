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
            <form class="form-horizontal form-label-left" method="post" action="/dataTahapan/{{$tahapan->id}}" enctype="multipart/form-data">
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
                            <label>Tahapan Akses Reforma Agraria <span class="required">*</span></label>
                            <select id="tahapan" class="select2_single form-control" tabindex="-1" name="tahapan" required>
                                @if(!empty(auth()->user()->getUser()->kantah_id))
                                <option selected disabled>Pilih Tahapan Akses Reforma Agraria</option>
                                <option value="Penyuluhan" {{old('tahapan') == "Penyuluhan" ? 'selected' : ''}}>Penyuluhan</option>
                                <option value="Pemetaan Sosial" {{old('tahapan') == "Pemetaan Sosial" ? 'selected' : ''}}>Pemetaan Sosial</option>
                                <option value="Penyusunan Model" {{old('tahapan') == "Penyusunan Model" ? 'selected' : ''}}>Penyusunan Model</option>
                                <option value="Pendampingan" {{old('tahapan') == "Pendampingan" ? 'selected' : ''}}>Pendampingan</option>
                                <option value="Penyusunan Data" {{old('tahapan') == "Penyusunan Data" ? 'selected' : ''}}>Penyusunan Data</option>
                                @else
                                <option selected disabled>Pilih Tahapan Akses Reforma Agraria</option>
                                <option value="Pemetaan Sosial" {{old('tahapan') == "Pemetaan Sosial" ? 'selected' : ''}}>Pemetaan Sosial</option>
                                <option value="Pendampingan" {{old('tahapan') == "Pendampingan" ? 'selected' : ''}}>Pendampingan</option>
                                @endif
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
                            <label>Realisasi Fisik <span class="required">*</span></label>
                            <input id="realisasiFisik" name="jumlahRealisasi" type="number" min="1" class="form-control " placeholder="Realisasi Fisik" value="{{old('jumlahRealisasi')}}" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12" style="margin-top:10px">
                        <div class="form-group">
                            <label>Upload Evidence</label>
                            <input name="file_evidence" type="file" class="form-control" accept=".zip, .rar, .pdf">
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