@extends('kanwil.layouts.main')
@section('title') Data Rencana Bulanan @endsection

@section('content')
@include('layouts.dataRencana.index')

<div class="modal fade" id="modalRencana" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Detail Rencana</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <form class="form-horizontal form-label-left" method="post" id="updateRencana">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Fieldstaff</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Nama Fieldstaff" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="text" id="periode" name="periode" class="form-control" placeholder="Periode" required readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="Lokasi" required readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Rencana Tindak Lanjut</label>
                            <textarea id="rencana" name="tindak_lanjut" required="required" class="form-control" placeholder="Keterangan.." rows="3" readonly></textarea>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </form>
    </div>
</div>

<!-- Modal Delete-->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi Penghapusan</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="deleteRencana">
                    @csrf
                    @method('DELETE')
                    <p>Anda yakin ingin menghapus data rencana ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#tableRencana').dataTable({
            "autoWidth": false,
            "aaSorting": []
        });

        $('.btnLihat').on('click', function(event) {
            console.log('aas');
            event.preventDefault();
            var id = $(this).data('id');
            $("#updateRencana").attr('action', '/dataRencana/' + id);
            $.get('dataRencana/' + id + '/detail', function(data) {
                $('#periode').val(data.rencana.periode);
                $('#lokasi').val(data.rencana.lokasi);
                $('#rencana').val(data.rencana.tindak_lanjut);
                $('#name').val(data.rencana.fieldstaff.name);
            })
        });

    });

    $('body').on('click', '.btnHapus', function() {
        event.preventDefault();
        var id = $(this).data('id');
        $("#deleteRencana").attr('action', '/dataRencana/' + id);
    })
</script>

@endsection