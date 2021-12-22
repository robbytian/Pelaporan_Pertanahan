@extends('kanwil.layouts.main')
@section('title') Dashboard @endsection

@section('content')

<div class="row tile_count">
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count mt-2 text-center">
        <span class="count_top"><i class="fa fa-user"></i> Total Kantah</span>
        <div class="count">2500</div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count mt-2 text-center">
        <span class="count_top"><i class="fa fa-clock-o"></i> Total Fieldstaff</span>
        <div class="count">123.50</div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count mt-2 text-center">
        <span class="count_top"><i class="fa fa-user"></i> Total Input Laporan</span>
        <div class="count">2,500</div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count mt-2 text-center">
        <span class="count_top"><i class="fa fa-user"></i> Input Laporan Terakhir</span>
        <div class="count">
            <h4 class="" style="margin-top:17px">09 November 2021</h4>
        </div>
    </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel tile">
        <div class="x_title">
            <h2>Ranking Kinerja Kantah</h2>

            <div class="clearfix"></div>
        </div>

        <div class="x_content" style="margin-top:20px;">
            <div class="widget_summary mt-3">
                <div class="w_left w_25">
                    <span>KANTOR PERTANAHAN KUBU RAYAAAA</span>
                </div>
                <div class="w_center w_55" style="margin-left:20px">
                    <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1000" style="width: 66%;">
                            <span class="sr-only">60% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="w_right w_20">
                    <span>60%</span>
                </div>

            </div>
            <hr>
            <div class="widget_summary mt-5">
                <div class="w_left w_25">
                    <span>Kantor Pertanahan B</span>
                </div>
                <div class="w_center w_55" style="margin-left:20px">
                    <div class="progress">
                        <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                            <span class="sr-only">60% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="w_right w_20">
                    <span>60%</span>
                </div>

            </div>
            <hr>
            <div class="widget_summary mt-3">
                <div class="w_left w_25">
                    <span>Kantor Pertanahan C</span>
                </div>
                <div class="w_center w_55" style="margin-left:20px">
                    <div class="progress">
                        <div class="progress-bar bg-red" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                            <span class="sr-only">60% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="w_right w_20">
                    <span>50%</span>
                </div>

            </div>
            <hr>
            <div class="widget_summary mt-3">
                <div class="w_left w_25">
                    <span>Kantor Pertanahan D</span>
                </div>
                <div class="w_center w_55" style="margin-left:20px">
                    <div class="progress">
                        <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                            <span class="sr-only">60% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="w_right w_20">
                    <span>0%</span>
                </div>

            </div>
            <hr>
            <div class="widget_summary mt-3">
                <div class="w_left w_25">
                    <span>Kantor Pertanahan E</span>
                </div>
                <div class="w_center w_55" style="margin-left:20px">
                    <div class="progress">
                        <div class="progress-bar bg-gray" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                            <span class="sr-only">60% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="w_right w_20">
                    <span>0%</span>
                </div>

            </div>
        </div>


    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>Realisasi Pemetaan</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content ">
                <canvas id="chart_gauge_01" class=""></canvas>
                <div class="goal-wrapper">
                    <span id="gauge-text" class="gauge-value pull-left">0</span>
                    <span class="gauge-value pull-left">%</span>
                    <span id="goal-text" class="goal-value pull-right">100%</span>
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
                <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 100%; height: 100px;"></canvas>
                <div class="goal-wrapper">
                    <span id="gauge-text" class="gauge-value pull-left">0</span>
                    <span class="gauge-value pull-left">%</span>
                    <span id="goal-text" class="goal-value pull-right">100%</span>
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
                <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 160px; height: 100px;"></canvas>
                <div class="goal-wrapper">
                    <span id="gauge-text" class="gauge-value pull-left">0</span>
                    <span class="gauge-value pull-left">%</span>
                    <span id="goal-text" class="goal-value pull-right">100%</span>
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
                <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 100%; height: 100px;"></canvas>
                <div class="goal-wrapper">
                    <span id="gauge-text" class="gauge-value pull-left">0</span>
                    <span class="gauge-value pull-left">%</span>
                    <span id="goal-text" class="goal-value pull-right">100%</span>
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
                <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 160px; height: 100px;"></canvas>
                <div class="goal-wrapper">
                    <span id="gauge-text" class="gauge-value pull-left">0</span>
                    <span class="gauge-value pull-left">%</span>
                    <span id="goal-text" class="goal-value pull-right">100%</span>
                </div>
            </div>
        </div>

    </div>
    @endsection