@extends('kantah.layouts.main')
@section('title') Dashboard @endsection

@section('content')

<div class="row tile_count">
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count text-center">
        <span class="count_top"><i class="fa fa-file"></i> Total Laporan</span>
        <div class="count">{{$laporan->count()}}</div>

    </div>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count text-center">
        <span class="count_top"><i class="fa fa-warning"></i> Laporan Dengan Kendala</span>
        <div class="count">{{$laporan->whereNotNull('keluhan')->where('keluhan', '!=', '')->count()}}</div>

    </div>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count text-center">
        <span class="count_top"><i class="fa fa-check-square"></i> Laporan Diberikan Saran</span>
        <div class="count">{{$laporan->whereNotNull('saran')->where('saran', '!=', '')->count()}}</div>

    </div>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count text-center">
        <span class="count_top"><i class="fa fa-clock-o"></i> Input Laporan Terakhir</span>
        <div class="count green">
            <h4 class="" style="margin-top:17px">{{empty($laporan->first()->created_at) ? '-' : date('d F Y',strtotime($laporan->first()->created_at))}}</h4>
        </div>

    </div>

</div>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Dashboard</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div>
                    <div class="x_title">
                        <h2>Ranking Kinerja Fieldstaff</h2>
                        <div class="clearfix"></div>
                    </div>
                    <ul class="list-unstyled top_profiles scroll-view">
                        <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                                <i class="fa fa-user aero"></i>
                            </a>
                            <div class="media-body">
                                <a class="title" href="#">{{empty($ranking[0]) ? '-' : $ranking[0]['name']}}</a>
                                <br><br>
                                <p>{{empty($ranking[0]) ? '0' : round($ranking[0]['progress'])}}%</p>
                                </p>
                            </div>
                        </li>
                        <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                                <i class="fa fa-user aero"></i>
                            </a>
                            <div class="media-body">
                                <a class="title" href="#">{{empty($ranking[1]) ? '-' : $ranking[1]['name']}}</a>
                                <br><br>
                                <p>{{empty($ranking[1]) ? '0' : round($ranking[1]['progress'])}}%</p>
                                </p>
                            </div>
                        </li>
                        <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                                <i class="fa fa-user aero"></i>
                            </a>
                            <div class="media-body">
                                <a class="title" href="#">{{empty($ranking[2]) ? '-' : $ranking[2]['name']}}</a>
                                <br><br>
                                <p>{{empty($ranking[2]) ? '0' : round($ranking[2]['progress'])}}%</p>
                                </p>
                            </div>
                        </li>
                        <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                                <i class="fa fa-user aero"></i>
                            </a>
                            <div class="media-body">
                                <a class="title" href="#">{{empty($ranking[3]) ? '-' : $ranking[3]['name']}}</a>
                                <br><br>
                                <p>{{empty($ranking[3]) ? '0' : round($ranking[3]['progress'])}}%</p>
                                </p>
                            </div>
                        </li>
                        <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                                <i class="fa fa-user aero"></i>
                            </a>
                            <div class="media-body">
                                <a class="title" href="#">{{empty($ranking[4]) ? '-' : $ranking[4]['name']}}</a>
                                <br><br>
                                <p>{{empty($ranking[4]) ? '0' : round($ranking[4]['progress'])}}%</p>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel tile">
                        <div class="x_title">
                            <h5>Total Fieldstaff</h5>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content ">
                            <div style="text-align: center; margin-bottom: 17px;">
                                <h1 style=" line-height: 110px;"> <i class="fa fa-user"></i> {{$fieldstaff->count()}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel tile">
                        <div class="x_title">
                            <h5>Realisasi Penyuluhan</h5>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content ">
                            <div style="text-align: center; margin-bottom: 17px">
                                <span class="chart" id="penyuluhan_kantah" data-percent="{{$persenPenyuluhan}}">
                                    <span class="percent"></span>
                                </span>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel tile  overflow_hidden">
                        <div class="x_title">
                            <h5>Realisasi Pemetaan Sosial</h5>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div style="text-align: center; margin-bottom: 17px">
                                <span class="chart" id="pemetaan_kantah" data-percent="{{$persenPemetaan}}">
                                    <span class="percent"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel tile  overflow_hidden">
                        <div class="x_title">
                            <h5>Realisasi Penyusunan Model</h5>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div style="text-align: center; margin-bottom: 17px">
                                <span class="chart" id="penyusunanModel_kantah" data-percent="{{$persenPenyusunanModel}}">
                                    <span class="percent"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel tile  overflow_hidden">
                        <div class="x_title">
                            <h5>Realisasi Pendampingan</h5>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div style="text-align: center; margin-bottom: 17px">
                                <span class="chart" id="pendampingan_kantah" data-percent="{{$persenPendampingan}}">
                                    <span class="percent"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel tile  overflow_hidden">
                        <div class="x_title">
                            <h5>Realisasi Penyusunan Data</h5>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div style="text-align: center; margin-bottom: 17px">
                                <span class="chart" id="penyusunanData_kantah" data-percent="{{$persenPenyusunanData}}">
                                    <span class="percent"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    chartDashboard('penyuluhan_kantah', '#455C73');
    chartDashboard('pemetaan_kantah', '#3498DB');
    chartDashboard('penyusunanModel_kantah', '#9B59B6');
    chartDashboard('pendampingan_kantah', '#26B99A');
    chartDashboard('penyusunanData_kantah', '#BDC3C7');

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