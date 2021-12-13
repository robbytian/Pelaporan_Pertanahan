@extends('layouts.app')

@section('menu')
<ul class="nav side-menu">
    <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
    <li><a href="/kantah"><i class="fa fa-building"></i> Kantah</a></li>
    <li><a href="/fieldstaff"><i class="fa fa-user"></i> Fieldstaff</a></li>
    <li><a href="/laporan"><i class="fa fa-clipboard"></i> Laporan</a></li>
    <li><a href="/tahapan"><i class="fa fa-tasks"></i> Tahapan</a></li>
    <li><a href="/rencanaBulanan"><i class="fa fa-list-alt"></i> Rencana Bulanan</a></li>
    <li><a href="javascript:void(0)"><i class="fa fa-map-marker"></i> Lokasi</a></li>
    <li><a href="javascript:void(0)"><i class="fa fa-group"></i> Peserta Pemberdayaan</a></li>
</ul>
@endsection

@section('script')
<script>console.log('aa')</script>
@endsection