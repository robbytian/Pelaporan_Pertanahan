@extends('kanwil.layouts.main')
@section('title') Data Rencana Bulanan @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Rencana Bulanan</h2>
            <div class="clearfix"></div>
        </div>


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
                @foreach($plans as $plan)
                <tr>
                    <td>{{$plan->Fieldstaff->name}}</td>
                    <td>{{date('F Y',strtotime($plan->periode))}}</td>
                    <td>{{$plan->lokasi}}</td>
                    <td>{{$plan->tindak_lanjut}}</td>
                    <td><button class="btn btn-default btn-sm" id="btnLihat" type="button" data-toggle="modal" data-target="#dataFieldstaff">
                            <i class="fa fa-search"></i> Lihat</button>
                        <button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash"></i> Delete</button>
                    </td>
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

        $('#tableRencana').dataTable({
            "autoWidth": false,
        });

    });
</script>

@endsection