<div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-plus-square"></i> Total Target</span>
        <div class="count green">{{$tahapans->sum('Fieldstaff.target')}}</div>

    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-plus-square"></i> Penyuluhan</span>
        <div class="count">{{$tahapans->sum('penyuluhan')}}</div>

    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-plus-square"></i> Pemetaan Sosial</span>
        <div class="count">{{$tahapans->sum('pemetaan_sosial')}}</div>

    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-plus-square"></i> Penyusunan Model</span>
        <div class="count">{{$tahapans->sum('penyusunan_model')}}</div>

    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-plus-square"></i> Pendampingan</span>
        <div class="count">{{$tahapans->sum('pendampingan')}}</div>

    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-plus-square"></i> Penyusunan Data</span>
        <div class="count">{{$tahapans->sum('penyusunan_data')}}</div>

    </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Tahapan</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x-content">
            <table id="tableTahapan" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="15">Nama Fieldstaff</th>
                        <th width="7%">Target</th>
                        <th width="13%">Penyuluhan</th>
                        <th width="15%">Pemetaan Sosial</th>
                        <th width="17%">Penyusunan Model</th>
                        <th width="14%">Pendampingan</th>
                        <th width="17%">Penyusunan Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tahapans as $tahapan)
                    <tr>
                        <td>{{$tahapan->Fieldstaff->name}}</td>
                        <td>{{$tahapan->Fieldstaff->target}}</td>
                        <td>{{$tahapan->penyuluhan}}</td>
                        <td>{{$tahapan->pemetaan_sosial}}</td>
                        <td>{{$tahapan->penyusunan_model}}</td>
                        <td>{{$tahapan->pendampingan}}</td>
                        <td>{{$tahapan->penyusunan_data}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Histori Penambahan Tahapan</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x-content">
            <table id="tableHistoriTahapan" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="20%">Feidlstaff</th>
                        <th width="20%">Tanggal Input</th>
                        <th width="16%">Tahapan</th>
                        <th width="10%">Jumlah</th>
                        <th width="15%">File Evidence</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($histories as $histori)
                    <tr>
                        <td>{{$histori->Fieldstaff->name}}</td>
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

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>