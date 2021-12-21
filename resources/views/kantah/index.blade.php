@extends('kantah.layouts.main')
@section('title') Dashboard @endsection

@section('content')
<div class="row tile_count">
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count text-center">
        <span class="count_top"><i class="fa fa-user"></i> Total Laporan</span>
        <div class="count">2500</div>

    </div>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count text-center">
        <span class="count_top"><i class="fa fa-clock-o"></i> Laporan Dengan Keluhan</span>
        <div class="count">123.50</div>

    </div>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count text-center">
        <span class="count_top"><i class="fa fa-user"></i> Laporan Diberikan Saran</span>
        <div class="count">2,500</div>

    </div>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count text-center">
        <span class="count_top"><i class="fa fa-user"></i> Input Laporan Terakhir</span>
        <div class="count">4,567</div>

    </div>

</div>
<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel tile">
        <div class="x_title">
            <h2>Realisasi Pemetaan</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content ">
            <div style="text-align: center; margin-bottom: 17px">
                <span class="chart" data-percent="86">
                    <span class="percent"></span>
                </span>
            </div>


        </div>
    </div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel tile  overflow_hidden">
        <div class="x_title">
            <h2>Realisasi Penyuluhan</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div style="text-align: center; margin-bottom: 17px">
                <span class="chart" data-percent="86">
                    <span class="percent"></span>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel tile  overflow_hidden">
        <div class="x_title">
            <h2>Realisasi Penyusunan</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div style="text-align: center; margin-bottom: 17px">
                <span class="chart" data-percent="86">
                    <span class="percent"></span>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel tile  overflow_hidden">
        <div class="x_title">
            <h2>Realisasi Pendampingan</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div style="text-align: center; margin-bottom: 17px">
                <span class="chart" data-percent="86">
                    <span class="percent"></span>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel tile  overflow_hidden">
        <div class="x_title">
            <h2>Realisasi Evaluasi</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div style="text-align: center; margin-bottom: 17px">
                <span class="chart" data-percent="86">
                    <span class="percent"></span>
                </span>
            </div>
        </div>
    </div>
</div>
@endsection