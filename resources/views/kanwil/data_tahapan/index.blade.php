@extends('kanwil.layouts.main')
@section('title') Data Tahapan @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Tahapan</h2>
            <div class="clearfix"></div>
        </div>

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
                @foreach($tahapans as $tahapan)
                <tr>
                    <td>{{$tahapan->Fieldstaff->name}}</td>
                    <td></td>
                    <td>{{$tahapan->pemetaan}}</td>
                    <td>{{$tahapan->penyuluhan}}</td>
                    <td>{{$tahapan->penyusunan}}</td>
                    <td>{{$tahapan->pendampingan}}</td>
                    <td>{{$tahapan->evaluasi}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        console.log('aa');

        $('#tableLaporan').dataTable({

        });

    });
</script>

@endsection