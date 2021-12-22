@extends('kanwil.layouts.main')
@section('title') Edit Akun @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Akun</h2>
            <div class="clearfix"></div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 left-margin">
            <form class="form-horizontal form-label-left" method="post" action="/dataKantah">
                @csrf
                <br>
                <div class="form-group">
                    <label>Nama </label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Kantah">
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
                    <button type="submit" class="btn btn-primary" style="float:left">Update</buttoclass=>
                </div>
        </div>
        </form>
    </div>
    </form>
</div>
@endsection