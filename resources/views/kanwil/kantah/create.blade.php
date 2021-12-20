@extends('kanwil.layouts.main')
@section('title') Tambah Data Kantah @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="page-title">
    <div class="title_left">
      <h4><small><a href="/dataKantah">Data Kantah</a> / Tambah Kantah</small></h4>
    </div>
  </div>
  <div class="x_panel">
    <div class="x_title">
      <h2>Input Data Kantah</h2>
      <div class="clearfix"></div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 left-margin">
      <form class="form-horizontal form-label-left" method="post" action="/dataKantah">
        @csrf
        <br>
        <div class="form-group">
          <label>Nama Kantah</label>
          <input type="text" name="name" class="form-control" placeholder="Nama Kantah" >
        </div>
        <br> <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control" placeholder="Email" required>
        </div>
        
        <br>
        <div class="form-group">
          <label for="message">Kasi Penataan dan Pemberdayaan</label>
          <input type="text" name="head_name" class="form-control" placeholder="Kasi Penataan dan Pemberdayaan" required>
        </div>
        <br>
        <div class="form-group">
          <label>NIP</label>
          <input type="text" name="nip_head_name" class="form-control" placeholder="NIP" required>
        </div>
        <br>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <br>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <i class="bi bi-eye-slash" id="togglePassword"></i>
        </div>
        <br>
        <div class="form-group">
        <button type="submit" class="btn btn-primary" style="float:left">Tambah Data Laporan</buttoclass=>
        </div>
        </div>
      </form>
    </div>
  </div>


@endsection