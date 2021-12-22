@extends('fieldstaff.layouts.main')
@section('title') Edit Akun @endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Akun</h2>
            <div class="clearfix"></div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 left-margin">
            <form class="form-horizontal form-label-left" method="post" action="/dataFieldstaff">
                @csrf
                <br>
                <div class="form-group">
                    <label>Nama Fieldstaff</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Fieldstaff">
                </div>
                <br>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="date_born" class="form-control" required>
                </div>

                <br>

                <div class="form-group">
                    <label for="message">Alamat</label>
                    <textarea id="message" name="alamat" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10" rows="3" placeholder="Alamat.."></textarea>
                </div>
                <br>

                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="number" name="phone_number" class="form-control" placeholder="No.Telepon" required>
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
</div>


@endsection