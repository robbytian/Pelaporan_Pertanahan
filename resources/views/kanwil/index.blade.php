@extends('kanwil.layouts.main')
@section('title') Dashboard @endsection

@section('content')
<div class="row tile_count">
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count mt-2 text-center">
        <span class="count_top"><i class="fa fa-user"></i> Total Kantah</span>
        <div class="count">{{$totalKantah}}</div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count mt-2 text-center">
        <span class="count_top"><i class="fa fa-user"></i> Total Fieldstaff</span>
        <div class="count">{{$totalFieldstaff}}</div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count mt-2 text-center">
        <span class="count_top"><i class="fa fa-file"></i> Total Input Laporan</span>
        <div class="count">{{$totalLaporan}}</div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count mt-2 text-center">
        <span class="count_top"><i class="fa fa-clock-o"></i> Input Laporan Terakhir</span>
        <div class="count green">
            <h4 class="" style="margin-top:17px">{{empty($tanggal_akhir) ? '-' : date('d F Y',strtotime($tanggal_akhir->created_at))}}</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>Ranking Kinerja Kantah</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content" style="margin-top:20px;">
                <div class="widget_summary mt-3">
                    <div class="w_left w_35">
                        <span>{{empty($ranking[0]) ? '-' : $ranking[0]['name']}}</span>
                    </div>
                    <div class="w_center w_50" style="margin-left:20px">
                        <div class="progress">
                            <div class="progress-bar bg-green" data-transitiongoal="{{empty($ranking[0]) ? '0' : round($ranking[0]['progress'])}}">
                                <span class="sr-only">{{empty($ranking[0]) ? '0' : round($ranking[0]['progress'])}}% Complete</span>
                            </div>
                        </div>
                    </div>
                    <div class="w_right w_15">
                        <span>{{empty($ranking[0]) ? '0' : round($ranking[0]['progress'])}}%</span>
                    </div>

                </div>
                <hr>
                <div class="widget_summary mt-5">
                    <div class="w_left w_35">
                        <span>{{empty($ranking[1]) ? '-' : $ranking[1]['name']}}</span>
                    </div>
                    <div class="w_center w_50" style="margin-left:20px">
                        <div class="progress">
                            <div class="progress-bar bg-blue" data-transitiongoal="{{empty($ranking[1]) ? '0' : round($ranking[1]['progress'])}}">
                                <span class="sr-only">{{empty($ranking[1]) ? '0' : round($ranking[1]['progress'])}}% Complete</span>
                            </div>
                        </div>
                    </div>
                    <div class="w_right w_15">
                        <span>{{empty($ranking[1]) ? '0' : round($ranking[1]['progress'])}}%</span>
                    </div>

                </div>
                <hr>
                <div class="widget_summary mt-3">
                    <div class="w_left w_35">
                        <span>{{empty($ranking[2]) ? '-' : $ranking[2]['name']}}</span>
                    </div>
                    <div class="w_center w_50" style="margin-left:20px">
                        <div class="progress">
                            <div class="progress-bar bg-orange" data-transitiongoal="{{empty($ranking[2]) ? '0' : round($ranking[2]['progress'])}}">
                                <span class="sr-only">{{empty($ranking[2]) ? '0' : round($ranking[2]['progress'])}}% Complete</span>
                            </div>
                        </div>
                    </div>
                    <div class="w_right w_15">
                        <span>{{empty($ranking[2]) ? '0' : round($ranking[2]['progress'])}}%</span>
                    </div>

                </div>
                <hr>
                <div class="widget_summary mt-3">
                    <div class="w_left w_35">
                        <span>{{empty($ranking[3]) ? '-' : $ranking[3]['name']}}</span>
                    </div>
                    <div class="w_center w_50" style="margin-left:20px">
                        <div class="progress">
                            <div class="progress-bar bg-red" data-transitiongoal="{{empty($ranking[3]) ? '0' : round($ranking[3]['progress'])}}">
                                <span class="sr-only">{{empty($ranking[3]) ? '0' : round($ranking[3]['progress'])}}% Complete</span>
                            </div>
                        </div>
                    </div>
                    <div class="w_right w_15">
                        <span>{{empty($ranking[3]) ? '0' : round($ranking[3]['progress'])}}%</span>
                    </div>
                </div>
                <hr>
                <div class="widget_summary mt-3">
                    <div class="w_left w_35">
                        <span>{{empty($ranking[4]) ? '-' : $ranking[4]['name']}}</span>
                    </div>
                    <div class="w_center w_50" style="margin-left:20px">
                        <div class="progress">
                            <div class="progress-bar bg-blue-sky" data-transitiongoal="{{empty($ranking[4]) ? '0' : round($ranking[4]['progress'])}}">
                                <span class="sr-only">{{empty($ranking[4]) ? '0' : round($ranking[4]['progress'])}}% Complete</span>
                            </div>
                        </div>
                    </div>
                    <div class="w_right w_15">
                        <span>{{empty($ranking[4]) ? '0' : round($ranking[4]['progress'])}}%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>Ranking Kinerja Fieldstaff</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <ul class="list-unstyled top_profiles scroll-view">
                    <li class="media event">
                        <a class="pull-left border-aero profile_thumb">
                            <i class="fa fa-user aero"></i>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">{{empty($rankingFS[0]) ? '-' : $rankingFS[0]['name']}}</a>
                            <br><br>
                            <p>{{empty($rankingFS[0]) ? '0' : round($rankingFS[0]['progress'])}}%</p>
                            </p>
                        </div>
                    </li>
                    <li class="media event">
                        <a class="pull-left border-aero profile_thumb">
                            <i class="fa fa-user aero"></i>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">{{empty($rankingFS[1]) ? '-' : $rankingFS[1]['name']}}</a>
                            <br><br>
                            <p>{{empty($rankingFS[1]) ? '0' : round($rankingFS[1]['progress'])}}%</p>
                            </p>
                        </div>
                    </li>
                    <li class="media event">
                        <a class="pull-left border-aero profile_thumb">
                            <i class="fa fa-user aero"></i>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">{{empty($rankingFS[2]) ? '-' : $rankingFS[2]['name']}}</a>
                            <br><br>
                            <p>{{empty($rankingFS[2]) ? '0' : round($rankingFS[2]['progress'])}}%</p>
                            </p>
                        </div>
                    </li>
                    <li class="media event">
                        <a class="pull-left border-aero profile_thumb">
                            <i class="fa fa-user aero"></i>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">{{empty($rankingFS[3]) ? '-' : $rankingFS[3]['name']}}</a>
                            <br><br>
                            <p>{{empty($rankingFS[3]) ? '0' : round($rankingFS[3]['progress'])}}%</p>
                            </p>
                        </div>
                    </li>
                    <li class="media event">
                        <a class="pull-left border-aero profile_thumb">
                            <i class="fa fa-user aero"></i>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">{{empty($rankingFS[4]) ? '-' : $rankingFS[4]['name']}}</a>
                            <br><br>
                            <p>{{empty($rankingFS[4]) ? '0' : round($rankingFS[4]['progress'])}}%</p>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>Realisasi Penyuluhan</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content ">
                <div style="text-align: center; margin-bottom: 17px">
                    <span class="chart" id="penyuluhan_kanwil" data-percent="{{$persenPenyuluhan}}">
                        <span class="percent"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel tile  overflow_hidden">
            <div class="x_title">
                <h2>Realisasi Pemetaan Sosial</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div style="text-align: center; margin-bottom: 17px">
                    <span class="chart" id="pemetaan_kanwil" data-percent="{{$persenPemetaan}}">
                        <span class="percent"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel tile  overflow_hidden">
            <div class="x_title">
                <h2>Realisasi Penyusunan Model</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div style="text-align: center; margin-bottom: 17px">
                    <span class="chart" id="penyusunanModel_kanwil" data-percent="{{$persenPenyusunanModel}}">
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
                    <span class="chart" id="pendampingan_kanwil" data-percent="{{$persenPendampingan}}">
                        <span class="percent"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel tile  overflow_hidden">
            <div class="x_title">
                <h2>Realisasi Penyusunan Data</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div style="text-align: center; margin-bottom: 17px">
                    <span class="chart" id="penyusunanData_kanwil" data-percent="{{$persenPenyusunanData}}">
                        <span class="percent"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    chartDashboard('penyuluhan_kanwil', '#455C73');
    chartDashboard('pemetaan_kanwil', '#3498DB');
    chartDashboard('penyusunanModel_kanwil', '#9B59B6');
    chartDashboard('pendampingan_kanwil', '#26B99A');
    chartDashboard('penyusunanData_kanwil', '#BDC3C7');

    function chartDashboard(id, warna) {

        if (typeof($.fn.easyPieChart) === 'undefined') {
            return;
        }
        // console.log('chartDashboard');

        $('#' + id).easyPieChart({
            easing: 'easeOutElastic',
            delay: 3000,
            barColor: warna,
            trackColor: '#eceff3',
            scaleColor: false,
            lineWidth: 20,
            trackWidth: 16,
            lineCap: 'butt',
            onStep: function(from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent) + "%");
            }
        });

    };
</script>
@endsection