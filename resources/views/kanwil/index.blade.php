@extends('kanwil.layouts.main')
@section('title') Dashboard @endsection

@section('content')
<div class="row tile_count">
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count mt-2 text-center">
        <span class="count_top"><i class="fa fa-user"></i> Total Kantah</span>
        <div class="count">{{$totalKantah}}</div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count mt-2 text-center">
        <span class="count_top"><i class="fa fa-clock-o"></i> Total Fieldstaff</span>
        <div class="count">{{$totalFieldstaff}}</div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count mt-2 text-center">
        <span class="count_top"><i class="fa fa-user"></i> Total Input Laporan</span>
        <div class="count">{{$totalLaporan}}</div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count mt-2 text-center">
        <span class="count_top"><i class="fa fa-user"></i> Input Laporan Terakhir</span>
        <div class="count green">
            <h4 class="" style="margin-top:17px">{{empty($tanggal_akhir) ? '-' : date('d F Y',strtotime($tanggal_akhir->created_at))}}</h4>
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
                    <span>{{empty($ranking[0]) ? '-' : $ranking[0]['name']}}</span>
                </div>
                <div class="w_center w_55" style="margin-left:20px">
                    <div class="progress">
                        <div class="progress-bar bg-green" data-transitiongoal="{{empty($ranking[0]) ? '0' : round($ranking[0]['progress'])}}">
                            <span class="sr-only">{{empty($ranking[0]) ? '0' : round($ranking[0]['progress'])}}% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="w_right w_20">
                    <span>{{empty($ranking[0]) ? '0' : round($ranking[0]['progress'])}}%</span>
                </div>

            </div>
            <hr>
            <div class="widget_summary mt-5">
                <div class="w_left w_25">
                    <span>{{empty($ranking[1]) ? '-' : $ranking[1]['name']}}</span>
                </div>
                <div class="w_center w_55" style="margin-left:20px">
                    <div class="progress">
                        <div class="progress-bar bg-blue" data-transitiongoal="{{empty($ranking[1]) ? '0' : round($ranking[1]['progress'])}}">
                            <span class="sr-only">{{empty($ranking[1]) ? '0' : round($ranking[1]['progress'])}}% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="w_right w_20">
                    <span>{{empty($ranking[1]) ? '0' : round($ranking[1]['progress'])}}%</span>
                </div>

            </div>
            <hr>
            <div class="widget_summary mt-3">
                <div class="w_left w_25">
                    <span>{{empty($ranking[2]) ? '-' : $ranking[2]['name']}}</span>
                </div>
                <div class="w_center w_55" style="margin-left:20px">
                    <div class="progress">
                        <div class="progress-bar bg-orange" data-transitiongoal="{{empty($ranking[2]) ? '0' : round($ranking[2]['progress'])}}">
                            <span class="sr-only">{{empty($ranking[2]) ? '0' : round($ranking[2]['progress'])}}% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="w_right w_20">
                    <span>{{empty($ranking[2]) ? '0' : round($ranking[2]['progress'])}}%</span>
                </div>

            </div>
            <hr>
            <div class="widget_summary mt-3">
                <div class="w_left w_25">
                    <span>{{empty($ranking[3]) ? '-' : $ranking[3]['name']}}</span>
                </div>
                <div class="w_center w_55" style="margin-left:20px">
                    <div class="progress">
                        <div class="progress-bar bg-red" data-transitiongoal="{{empty($ranking[3]) ? '0' : round($ranking[3]['progress'])}}">
                            <span class="sr-only">{{empty($ranking[3]) ? '0' : round($ranking[3]['progress'])}}% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="w_right w_20">
                    <span>{{empty($ranking[3]) ? '0' : round($ranking[3]['progress'])}}%</span>
                </div>

            </div>
            <hr>
            <div class="widget_summary mt-3">
                <div class="w_left w_25">
                    <span>{{empty($ranking[4]) ? '-' : $ranking[4]['name']}}</span>
                </div>
                <div class="w_center w_55" style="margin-left:20px">
                    <div class="progress">
                        <div class="progress-bar bg-blue-sky" data-transitiongoal="{{empty($ranking[4]) ? '0' : round($ranking[4]['progress'])}}">
                            <span class="sr-only">{{empty($ranking[4]) ? '0' : round($ranking[4]['progress'])}}% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="w_right w_20">
                    <span>{{empty($ranking[4]) ? '0' : round($ranking[4]['progress'])}}%</span>
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
                <h2>Realisasi Penyuluhan</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
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
                <h2>Realisasi Penyusunan</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div style="text-align: center; margin-bottom: 17px">
                    <span class="chart" id="penyusunan_kanwil" data-percent="{{$persenPenyusunan}}">
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
                <h2>Realisasi Evaluasi</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div style="text-align: center; margin-bottom: 17px">
                    <span class="chart" id="evaluasi_kanwil" data-percent="{{$persenEvaluasi}}">
                        <span class="percent"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('script')
    <script>
        chartDashboard('pemetaan_kanwil', '#455C73');
        chartDashboard('penyuluhan_kanwil', '#3498DB');
        chartDashboard('penyusunan_kanwil', '#9B59B6');
        chartDashboard('pendampingan_kanwil', '#26B99A');
        chartDashboard('evaluasi_kanwil', '#BDC3C7');

        function chartDashboard(id, warna) {

            if (typeof($.fn.easyPieChart) === 'undefined') {
                return;
            }
            console.log('chartDashboard');

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