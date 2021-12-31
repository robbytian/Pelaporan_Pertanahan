@extends('kanwil.layouts.main')
@section('title') Data Kantah @endsection
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    @include('layouts.notif')
    <div class="x_panel">
        <div class="x_title mb-3">
            <h2>Data Kantah</h2>
            <div class="clearfix"></div>
        </div>
        <a href="{{url('/dataKantah/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kantah</a>
        <br><br>
        <table id="tableKantah" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="50%">Nama</th>
                    <th>Total Fieldstaff</th>
                    <th>Action</th>
                </tr>
            </thead>


            <tbody>
                @foreach($allKantah as $kantah)
                <tr>
                    <td>{{$kantah->name}}</td>

                    <td class="text-center">{{$kantah->Fieldstaff->count()}}</td>
                    <td> <button class="btn btn-default btn-sm" id="btnLihat" type="button" data-toggle="modal" data-target="#dataKantah" data-id="{{$kantah->id}}">
                            <i class="fa fa-search"></i> Lihat</button>
                        <button class="btn btn-danger btn-sm btnHapus" type="button" data-toggle="modal" data-target="#modalDelete" data-id="{{$kantah->id}}"><i class="fa fa-trash"></i> Delete</button>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>


    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="dataKantah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <form class="form-horizontal form-label-left" method="post" id="updateKantah">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Kantah</label>
                            <input type="text" id="nama_kantah" name="name" class="form-control" placeholder="Nama Kantah" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" id="email_kantah" name="email" class="form-control" placeholder="Email" required>
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="message">Kasi Penataan dan Pemberdayaan</label>
                            <input type="text" id="head_kantah" name="head_name" class="form-control" placeholder="Kasi Penataan dan Pemberdayaan" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" id="nip_kantah" name="nip_head_name" class="form-control" placeholder="NIP" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" id="username_kantah" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" id="password_kantah" name="password" class="form-control" placeholder="Password" required>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default"> <i class="fa fa-eye-slash"></i> </button>
                                </span>
                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
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
                <form method="post" id="deleteKantah">
                    @csrf
                    @method('DELETE')
                    <p>Anda yakin ingin menghapus Akun Kantah ini?</p>
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
        console.log('aa');
        $('#tableKantah').dataTable({
            "autoWidth": false,
        });

        $('body').on('click', '#btnLihat', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            $('#updateKantah').attr('action', '/dataKantah/' + id);
            $.get('dataKantah/' + id + '/detail', function(data) {
                $('#myModalLabel').html("Data " + data.kantah.name);
                $('#nama_kantah').val(data.kantah.name);
                $('#email_kantah').val(data.kantah.email);
                $('#head_kantah').val(data.kantah.head_name);
                $('#nip_kantah').val(data.kantah.nip_head_name);
                $('#username_kantah').val(data.user.username);
                $('#password_kantah').val(data.user.password);
            })
        });

        $('body').on('click', '.btnHapus', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            $('#deleteKantah').attr('action', '/dataKantah/' + id);
        });
    });
</script>
@endsection