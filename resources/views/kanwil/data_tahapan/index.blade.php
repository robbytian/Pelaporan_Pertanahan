@extends('kanwil.layouts.main')
@section('title') Data Tahapan @endsection

@section('content')
@include('layouts.dataTahapan.index')
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#tableTahapan').dataTable({
            "autoWidth": false,
        });

        $('#tableHistoriTahapan').dataTable({
            "autoWidth": false,
        });

    });
</script>

@endsection