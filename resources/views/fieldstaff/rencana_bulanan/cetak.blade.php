@extends('fieldstaff.layouts.main')
@section('title') Cetak Rencana Bulanan @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="page-title">
        <div class="title_left">
            <h4><small><a href="/dataRencana">Data Rencana</a> / Cetak Rencana</small></h4>
        </div>
    </div>
    <div class="x_panel">
        <div class="row x_title">
            <div class="col-md-6 col-xs-12 col-sm-12">
                <h2>
                    Cetak Rencana Bulanan
                </h2>
            </div>
            <div class="col-md-6">
                <div id="reportrange" class="pull-right" style="
                        background: #fff;
                        cursor: pointer;
                        padding: 5px 10px;
                        border: 1px solid #ccc;
                      ">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                    <span>December 30, 2014 - January 28, 2015</span>
                    <b class="caret"></b>
                </div>
            </div>
        </div>
        <br>
        <table id="tableCetak" class="table table-striped table-bordered">
            <thead>
                <tr>

                    <th width="18%">Periode</th>
                    <th width="18%">Lokasi</th>
                    <th width="28%">Rencana Tindak Lanjut</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <button class="pull-right btn btn-primary" disabled><i class="fa fa-print"></i> Cetak</button>
    </div>


</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        console.log('aa');

        $('#tableCetak').dataTable({
            "paginate": false,
            "searching": false
        });

    });
</script>

@endsection