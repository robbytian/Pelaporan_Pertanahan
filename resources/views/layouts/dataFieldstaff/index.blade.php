<div class="col-md-12 col-sm-12 col-xs-12">
    @include('layouts.notif')
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Fieldstaff</h2>
            <div class="clearfix"></div>
        </div>
        <a href="{{url('/dataFieldstaff/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Fieldstaff</a>
        <br><br>
        <table id="tableFieldstaff" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="15%">Nama</th>
                    <th width="15%">Tanggal Lahir</th>
                    <th width="22%">Alamat</th>
                    <th width="15%">Target Fisik (KK)</th>
                    @if(Auth::User()->level==1)<th width="15%">Nama Kantah</th>@endif
                    <th width="18%">Action</th>
                </tr>
            </thead>


            <tbody>
                @foreach($fieldstaffs as $fieldstaff)
                <tr>
                    <td>{{$fieldstaff->name}}</td>
                    <td>{{date('d F Y',strtotime($fieldstaff->date_born))}}</td>
                    <td>{{$fieldstaff->alamat}}</td>
                    <td class="text-center">{{empty($fieldstaff->target) ? '-' : $fieldstaff->target}}</td>
                    @if(Auth::User()->level==1)<td>{{$fieldstaff->kantah_id != null ? $fieldstaff->Kantah->name : $fieldstaff->Kanwil->name}}</td>@endif

                    <td> <button class="btn btn-default btn-sm btnLihat" id="" type="button" data-toggle="modal" data-target="#dataFieldstaff" data-id="{{$fieldstaff->id}}">
                            <i class="fa fa-search"></i> Lihat</button>
                        <button class="btn btn-danger btn-sm btnHapus" type="button" data-id="{{$fieldstaff->id}}" data-toggle="modal" data-target="#modalDelete"><i class="fa fa-trash"></i> Delete</button>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>


</div>


<!-- Modal -->
<div class="modal fade" id="dataFieldstaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <form class="form-horizontal form-label-left" method="post" id="formUpdate">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Fieldstaff</label>
                            <input type="text" id="name" name=" name" class="form-control" placeholder="Nama Fieldstaff">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="date_born" id="tgl_lahir" class="form-control" required>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="message">Alamat</label>
                            <textarea id="alamat" name="alamat" required="required" class="form-control" rows="3" placeholder="Alamat.."></textarea>
                        </div>

                        <br>
                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="number" id="no_telp" name="phone_number" class="form-control" placeholder="Target Fisik" required>
                        </div>

                        <div class="form-group" id="formTarget" style="display:none">
                            <br>
                            <label>Target Fisik (KK)</label>
                            <input type="number" name="target" id="target" class="form-control" placeholder="No.Telepon">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
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
                <form method="post" id="deleteFieldstaff">
                    @csrf
                    @method('DELETE')
                    <p>Anda yakin ingin menghapus Akun Fieldstaff ini?</p>
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
        $('#tableFieldstaff').dataTable({
            "autoWidth": false,
            "aaSorting": [],
        });

        $('body').on('click', '.btnLihat', function(event) {
            event.preventDefault();
            $('#target').val('');
            $('#formTarget').hide();
            var id = $(this).data('id');
            $('#formUpdate').attr('action', '/dataFieldstaff/' + id);
            $.get('dataFieldstaff/' + id + '/detail', function(data) {
                $('#myModalLabel').html("Data " + data.fieldstaff.name);
                $('#name').val(data.fieldstaff.name);
                $('#tgl_lahir').val(data.fieldstaff.date_born);
                $('#alamat').val(data.fieldstaff.alamat);
                $('#no_telp').val(data.fieldstaff.phone_number);
                if (data.fieldstaff.target != null) {
                    $('#formTarget').show();
                    $('#target').prop('required', true);
                    $('#target').val(data.fieldstaff.target);
                }
                $('#username').val(data.user.username);
                $('#password').val(data.user.password);
            })
        });

        $('body').on('click', '.btnHapus', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            $('#deleteFieldstaff').attr('action', '/dataFieldstaff/' + id);
        });

    });
</script>