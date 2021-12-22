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
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>

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