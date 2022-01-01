@extends('kanwil.layouts.main')
@section('title') Data Tahapan @endsection

@section('content')
@include('layouts.dataTahapan.index')
@endsection

@section('script')
<script>
    $(document).ready(function() {
        console.log('aa');

        $('#tableTahapan').dataTable({
            "autoWidth": false,
        });

    });
</script>

@endsection