<div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-plus-square"></i> Total Target</span>
        <div class="count green">{{$tahapans->sum('Fieldstaff.target')}}</div>

    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-plus-square"></i> Pemetaan Sosial</span>
        <div class="count">{{$tahapans->sum('pemetaan')}}</div>

    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-plus-square"></i> Penyuluhan</span>
        <div class="count">{{$tahapans->sum('penyuluhan')}}</div>

    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-plus-square"></i> Penyusunan Model</span>
        <div class="count">{{$tahapans->sum('penyusunan')}}</div>

    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-plus-square"></i> Pendampingan</span>
        <div class="count">{{$tahapans->sum('pendampingan')}}</div>

    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-plus-square"></i> Evaluasi dan Pelaporan</span>
        <div class="count">{{$tahapans->sum('evaluasi')}}</div>

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
                        <th width="17%">Pemetaan Sosial</th>
                        <th width="15%">Penyuluhan</th>
                        <th width="18%">Penyusunan Model</th>
                        <th width="15%">Pendampingan</th>
                        <th width="20%">Evaluasi dan Pelaporan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tahapans as $tahapan)
                    <tr>
                        <td>{{$tahapan->Fieldstaff->name}}</td>
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
</div>