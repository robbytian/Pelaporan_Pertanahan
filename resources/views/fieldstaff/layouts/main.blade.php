@extends('layouts.app')

@section('menu')
<ul class="nav side-menu">
    <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
    <li><a href="/dataLaporan"><i class="fa fa-clipboard"></i> Laporan</a></li>
    <li><a href="/dataTahapan"><i class="fa fa-tasks"></i> Tahapan</a></li>
    <li><a href="/dataRencana"><i class="fa fa-list-alt"></i> Rencana Bulanan</a></li>
    <li><a href="https://ptm.atrbpn.go.id" target="_blank"><i class="fa fa-group"></i> Peserta Pemberdayaan</a></li>
</ul>
@endsection

@section('script')
<script>
    console.log('aa')
</script>
@endsection