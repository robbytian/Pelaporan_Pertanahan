@extends('kantah.layouts.main')
@section('title') Edit Akun @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    @include('layouts.notif')
</div>

<div class="col-md-6 col-sm-12 col-xs-12">

    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Profile</h2>
            <div class="clearfix"></div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left-margin">
            <form class="form-horizontal form-label-left" method="post" action="/editProfile/{{Auth::User()->id}}">
                @csrf
                @method('PUT')
                <br>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Kantah" value="{{\App\Models\Kantah::getUser()->name}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{\App\Models\Kantah::getUser()->email}}" required>
                </div>
                <br>
                <div class="form-group">
                    <label>Kasi Penataan dan Pemberdayaan</label>
                    <input type="text" name="head_name" class="form-control" placeholder="Kasi Penataan dan Pemberdayaan" value="{{\App\Models\Kantah::getUser()->head_name}}">
                </div>
                <br>

                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" name="nip_head_name" class="form-control" placeholder="No.Telepon" required value="{{\App\Models\Kantah::getUser()->nip_head_name}}">
                </div>
                <br>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="float:left">Update</buttoclass=>
                </div>
        </div>
        </form>
    </div>
</div>

<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit User Login</h2>
            <div class="clearfix"></div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left-margin">
            <form class="form-horizontal form-label-left" method="post" action="/editAkun/{{Auth::User()->id}}">
                @csrf
                @method('PUT')
                <br>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required value="{{Auth::User()->username}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Password Lama</label>
                    <input type="password" name="password_lama" class="form-control" placeholder="Password" required>

                </div>
                <br>
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>

                </div>
                <br>
                <div class="form-group">
                    <label>Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password" required>

                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="float:left">Update</buttoclass=>
                </div>
        </div>
        </form>
    </div>
</div>


@endsection