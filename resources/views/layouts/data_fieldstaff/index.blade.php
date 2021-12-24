<div class="col-md-12 col-sm-12 col-xs-12">
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
                    <th width="18%">Nama</th>
                    <th width="15%">Tanggal Lahir</th>
                    <th width="32%">Alamat</th>
                    <th width="15%">Target Fisik (KK)</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>


            <tbody>
                @foreach($fieldstaffs as $fieldstaff)
                <tr>
                    <td>{{$fieldstaff->name}}</td>
                    <td>{{date('d F Y',strtotime($fieldstaff->date_born))}}</td>
                    <td>{{$fieldstaff->alamat}}</td>
                    <td class="text-center">{{$fieldstaff->target}}</td>
                    <td> <button class="btn btn-default btn-sm" id="btnLihat" type="button" data-toggle="modal" data-target="#dataFieldstaff" data-id="{{$fieldstaff->id}}">
                            <i class="fa fa-search"></i> Lihat</button>
                        <button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash"></i> Delete</button>
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
                    <form class="form-horizontal form-label-left" method="post" action="/dataKantah">
                        @csrf
                        <div class="form-group">
                            <label>Nama Fieldstaff</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Fieldstaff">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="date_born" id="tgl_lahir" class="form-control" required>
                        </div>



                        <div class="form-group">
                            <label for="message">Alamat</label>
                            <textarea id="alamat" name="alamat" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10" rows="3" placeholder="Alamat.."></textarea>
                        </div>


                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="number" id="no_telp" name="phone_number" class="form-control" placeholder="No.Telepon" required>
                        </div>

                        <div class="form-group">
                            <label>Target Fisik (KK)</label>
                            <input type="number" name="target" id="target" class="form-control" placeholder="No.Telepon" required>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

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

        $('#tableFieldstaff').dataTable({
            "autoWidth": false,

        });

        $('body').on('click', '#btnLihat', function(event) {

            event.preventDefault();
            var id = $(this).data('id');
            $.get('dataFieldstaff/' + id + '/detail', function(data) {
                $('#myModalLabel').html("Data " + data.fieldstaff.name);
                $('#name').val(data.fieldstaff.name);
                $('#tgl_lahir').val(data.fieldstaff.date_born);
                $('#alamat').val(data.fieldstaff.alamat);
                $('#no_telp').val(data.fieldstaff.phone_number);
                $('#target').val(data.fieldstaff.target);
                $('#username').val(data.user.username);
                $('#password').val(data.user.password);
            })
        });

    });
</script>