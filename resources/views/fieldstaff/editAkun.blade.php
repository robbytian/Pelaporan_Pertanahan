@extends('fieldstaff.layouts.main')
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
                    <label>Nama Fieldstaff</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Fieldstaff" value="{{\App\Models\Fieldstaff::getUser()->name}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="date_born" class="form-control" value="{{\App\Models\Fieldstaff::getUser()->date_born}}" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="message">Alamat</label>
                    <textarea id="message" name="alamat" required="required" class="form-control" name="message" data-parsley-trigger="keyup" rows="2" placeholder="Alamat..">{{\App\Models\Fieldstaff::getUser()->alamat}}</textarea>
                </div>
                <br>

                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="number" name="phone_number" class="form-control" placeholder="No.Telepon" required value="{{\App\Models\Fieldstaff::getUser()->phone_number}}">
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