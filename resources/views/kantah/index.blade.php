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
        <div class="count green">
            <h4 class="" style="margin-top:17px">09 November 2021</h4>
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
                                <a class="title" href="#">Irsyad Muhammad Rifa'ie</a>
                                <br><br>
                                <p>0%</p>
                                </p>
                            </div>
                        </li>
                        <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                                <i class="fa fa-user aero"></i>
                            </a>
                            <div class="media-body">
                                <a class="title" href="#">Irsyad Muhammad Rifa'ie</a>
                                <br><br>
                                <p>0%</p>
                                </p>
                            </div>
                        </li>
                        <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                                <i class="fa fa-user aero"></i>
                            </a>
                            <div class="media-body">
                                <a class="title" href="#">Irsyad Muhammad Rifa'ie</a>
                                <br><br>
                                <p>0%</p>
                                </p>
                            </div>
                        </li>
                        <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                                <i class="fa fa-user aero"></i>
                            </a>
                            <div class="media-body">
                                <a class="title" href="#">Irsyad Muhammad Rifa'ie</a>
                                <br><br>
                                <p>0%</p>
                                </p>
                            </div>
                        </li>
                        <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                                <i class="fa fa-user aero"></i>
                            </a>
                            <div class="media-body">
                                <a class="title" href="#">Irsyad Muhammad Rifa'ie</a>
                                <br><br>
                                <p>0%</p>
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
                            <h5>Realisasi Pemetaan</h5>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content ">
                            <div style="text-align: center; margin-bottom: 17px">
                                <span class="chart" id="pemetaan_kantah" data-percent="86">
                                    <span class="percent"></span>
                                </span>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel tile  overflow_hidden">
                        <div class="x_title">
                            <h5>Realisasi Penyuluhan</h5>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div style="text-align: center; margin-bottom: 17px">
                                <span class="chart" id="penyuluhan_kantah" data-percent="86">
                                    <span class="percent"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel tile  overflow_hidden">
                        <div class="x_title">
                            <h5>Realisasi Penyusunan</h5>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div style="text-align: center; margin-bottom: 17px">
                                <span class="chart" id="penyusunan_kantah" data-percent="86">
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
                                <span class="chart" id="pendampingan_kantah" data-percent="86">
                                    <span class="percent"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel tile  overflow_hidden">
                        <div class="x_title">
                            <h5>Realisasi Evaluasi</h5>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div style="text-align: center; margin-bottom: 17px">
                                <span class="chart" id="evaluasi_kantah" data-percent="86">
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
    chartDashboard('pemetaan_kantah', '#455C73');
    chartDashboard('penyuluhan_kantah', '#3498DB');
    chartDashboard('penyusunan_kantah', '#9B59B6');
    chartDashboard('pendampingan_kantah', '#26B99A');
    chartDashboard('evaluasi_kantah', '#BDC3C7');

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
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });

    };
</script>
@endsection