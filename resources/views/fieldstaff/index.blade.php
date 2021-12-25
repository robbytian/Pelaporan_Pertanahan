@extends('fieldstaff.layouts.main')
@section('title') Dashboard @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel tile">
        <div class="x_title">
            <h3>Dashboard</h3>
            <div class="clearfix"></div>
        </div>
        <div class="row tile_count">

            <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count text-center mt-2">
                <span class="count_top"><i class="fa fa-file"></i> Total Input Laporan</span>
                <div class="count">{{$totalLaporan->count()}}</div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count text-center mt-2">
                <span class="count_top"><i class="fa fa-warning"></i> Laporan Dengan Keluhan</span>
                <div class="count">{{$laporanKeluhan->count()}}</div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count text-center mt-2">
                <span class="count_top"><i class="fa fa-check-square"></i> Laporan Diberikan Saran</span>
                <div class="count">{{$laporanSaran->count()}}</div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count text-center mt-2">
                <span class="count_top"><i class="fa fa-clock-o"></i> Input Laporan Terakhir</span>
                <div class="count green">
                    <h4 class="mt-2">{{empty($tanggal_akhir) ? '-' : date('d F Y',strtotime($tanggal_akhir->created_at))}}</h4>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
        <hr>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile">
                <div class="x_title">
                    <h2>Realisasi Pemetaan</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content ">
                    <div style="text-align: center; margin-bottom: 17px">
                        <span class="chart" id="pemetaan_fieldstaff" data-percent="{{$persenPemetaan}}">
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
                        <span class="chart" id="penyuluhan_fieldstaff" data-percent="{{$persenPenyuluhan}}">
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
                        <span class="chart" id="penyusunan_fieldstaff" data-percent="{{$persenPenyusunan}}">
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
                        <span class="chart" id="pendampingan_fieldstaff" data-percent="{{$persenPendampingan}}">
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
                        <span class="chart" id="evaluasi_fieldstaff" data-percent="{{$persenEvaluasi}}">
                            <span class="percent"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>
    chartDashboard('pemetaan_fieldstaff', '#455C73');
    chartDashboard('penyuluhan_fieldstaff', '#3498DB');
    chartDashboard('penyusunan_fieldstaff', '#9B59B6');
    chartDashboard('pendampingan_fieldstaff', '#26B99A');
    chartDashboard('evaluasi_fieldstaff', '#BDC3C7');

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