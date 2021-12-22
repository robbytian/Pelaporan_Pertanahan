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
        <div class="count green">
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
                        <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
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
                        <div class="progress-bar bg-red" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
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
                        <div class="progress-bar bg-blue-sky" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
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
                <div style="text-align: center; margin-bottom: 17px">
                    <span class="chart" id="pemetaan_kanwil" data-percent="86">
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
                    <span class="chart" id="penyuluhan_kanwil" data-percent="9%">
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
                    <span class="chart" id="penyusunan_kanwil" data-percent="46">
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
                    <span class="chart" id="pendampingan_kanwil" data-percent="26">
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
                    <span class="chart" id="evaluasi_kanwil" data-percent="16">
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
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });

        };
    </script>
    @endsection