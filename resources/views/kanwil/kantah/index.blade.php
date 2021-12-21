@extends('kanwil.layouts.main')
@section('title') Data Kantah @endsection
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title mb-3">
            <h3>Data Kantah</h3>
            <a href="{{url('/dataKantah/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kantah</a>

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
                            <button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash"></i> Delete</button>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

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
                    <form class="form-horizontal form-label-left" method="post" action="/dataKantah">
                        @csrf
                        <div class="form-group">
                            <label>Nama Kantah</label>
                            <input type="text" id="nama_kantah" name="name" class="form-control" placeholder="Nama Kantah">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" id="email_kantah" name="email" class="form-control" placeholder="Email" required>
                        </div>


                        <div class="form-group">
                            <label for="message">Kasi Penataan dan Pemberdayaan</label>
                            <input type="text" id="head_kantah" name="head_name" class="form-control" placeholder="Kasi Penataan dan Pemberdayaan" required>
                        </div>

                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" id="nip_kantah" name="nip_head_name" class="form-control" placeholder="NIP" required>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" id="username_kantah" name="username" class="form-control" placeholder="Username" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password_kantah" name="password" class="form-control" placeholder="Password" required>

                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Update</button>
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
            "paginate": false,
            "autoWidth": false,

        });

        $('body').on('click', '#btnLihat', function(event) {

            event.preventDefault();
            var id = $(this).data('id');
            $.get('dataKantah/' + id + '/detail', function(data) {
                $('#myModalLabel').html("Data "+data.kantah.name);
                $('#nama_kantah').val(data.kantah.name);
                $('#email_kantah').val(data.kantah.email);
                $('#head_kantah').val(data.kantah.head_name);
                $('#nip_kantah').val(data.kantah.nip_head_name);
                $('#username_kantah').val(data.user.username);
                $('#password_kantah').val(data.user.password);
            })
        });

    });
</script>
@endsection