<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Rencana Bulanan</h2>
            <div class="clearfix"></div>
        </div>
        <table id="tableRencana" class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th width="15%">Nama Fieldstaff</th>
                    <th width="15%">Periode</th>
                    <th width="17%">Lokasi</th>
                    <th width="40%">Rencana Tindak Lanjut</th>
                    <th width="13%">Action</th>
                </tr>
            </thead>


            <tbody>
                @foreach($plans as $data)
                <tr>
                    <td>{{$data->Fieldstaff->name}}</td>
                    <td>{{date('F Y',strtotime($data->periode))}}</td>
                    <td>{{$data->lokasi}}</td>
                    <td>{{$data->tindak_lanjut}}</td>
                    <td><button class="btn btn-default btn-sm btnLihat" type="button" data-toggle="modal" data-target="#modalRencana" data-id="{{$data->id}}">
                            <i class="fa fa-search"></i> Lihat</button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>