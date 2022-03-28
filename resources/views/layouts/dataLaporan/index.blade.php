<div class="col-md-12 col-sm-12 col-xs-12">
    @include('layouts.notif')
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Laporan</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x-content">
            <table id="tableLaporan" class="table table-striped table-bordered dt-responsive">
                <thead>
                    <tr>
                        <th width="15%">Nama Fieldstaff</th>
                        <th width="15%">Tanggal Laporan</th>
                        <th width="15%">Tanggal Input</th>
                        <th width="19%">Kegiatan</th>
                        <th width="18%">Kendala</th>
                        <th width="18%">Action</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach($reports as $report)
                    <tr>
                        <td>{{$report->Fieldstaff->name}}</td>
                        <td>{{date('d F Y',strtotime($report->tanggal_laporan))}}</td>
                        <td>{{date('d F Y',strtotime($report->created_at))}}</td>
                        <td>{{$report->kegiatan}}</td>
                        <td>
                            @if(empty($report->keluhan))
                            -
                            @else
                            @if(empty($report->saran))
                            <span class="label label-danger">Terdapat Kendala</span>
                            @else
                            <span class="label label-success">Saran sudah diberikan</span>
                            @endif
                            @endif

                        </td>
                        <td> <button class="btn btn-default btn-sm btnLihat" type="button" data-toggle="modal" data-target="{{empty($report->Fieldstaff->kanwil_id) ? '#modalUpdate' : '#modalUpdate_kanwil'}}" data-id="{{$report->id}}"> <i class="fa fa-search"></i> Lihat</button>
                            <button class="btn btn-danger btn-sm btnHapus" data-toggle="modal" data-target="#modalDelete" data-id="{{$report->id}}" type="button"><i class="fa fa-trash"></i> Delete</button>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Detail Laporan</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <form class="form-horizontal form-label-left updateLaporan" method="post" id="updateLaporan">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Fieldstaff</label>
                            <input type="text" id="" name="name" class="form-control name" placeholder="Nama Fieldstaff" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Tanggal Laporan</label>
                            <input type="text" name="tanggal_laporan" id="" class="form-control tanggal_laporan" placeholder="tanggal laporan" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Tanggal Input</label>
                            <input type="text" name="tanggal_input" id="" class="form-control tanggal_input" placeholder="tanggal input" readonly>
                        </div>
                        <br>
                        <div class="form-group ">
                            <label>Kegiatan </label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="penyuluhan" id="penyuluhan" name="kegiatans[]" value="Penyuluhan" disabled> Melaksanakan Penyuluhan
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="pemetaan" id="pemetaan" name="kegiatans[]" value="Pemetaan" disabled> Melaksanakan Pemetaan Sosial
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="penyusunan_model" id="penyusunan_model" name="kegiatans[]" value="Penyusunan Model" disabled> Penyusunan Model
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="pendampingan" id="pendampingan" name="kegiatans[]" value="Pendampingan" disabled> Melaksanakan Pendampingan
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="penyusunan_data" id="penyusunan_data" name="kegiatans[]" value="Penyusunan Data" disabled> Penyusunan Data
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="koordinasi" id="koordinasi" name="kegiatans[]" value="Koordinasi" disabled> Koordinasi dengan Instansi / tim penanganan
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="rapat" id="rapat" name="kegiatans[]" value="Rapat" disabled> Rapat / Meeting
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="lainnya" id="lainnya" name="kegiatans[]" value="Lainnya" disabled> Lainnya
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="message">Keterangan </label>
                            <textarea id="" name="keterangan" required="required" class="form-control keterangan" rows="3" placeholder="Keterangan.." readonly></textarea>
                        </div>
                        <br>
                        <div class=" form-group">
                            <label>Peserta </label>
                            <textarea name="peserta" id="" class="form-control peserta" placeholder="Peserta" readonly></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="message">Kendala </label>
                            <textarea name="keluhan" id="" class="form-control keluhan" rows="3" placeholder="Tidak Ada Kendala" readonly></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="message">Saran</label>
                            <textarea name="saran" id="saran" class="form-control saran" rows="3" placeholder="Berikan Saran.."></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="message">Foto</label> <br>
                            <img id="" src="#" class="imgLaporan2 foto" style="display:none" />
                            <p id="" style="display:none" class="noFoto"> <i>Tidak ada Foto yang diupload</i> </p>
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

<!-- Modal -->
<div class="modal fade" id="modalUpdate_kanwil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Detail Laporan</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <form class="form-horizontal form-label-left updateLaporan" method="post" id="updateLaporan">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Fieldstaff</label>
                            <input type="text" id="" name="name" class="form-control name" placeholder="Nama Fieldstaff" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Tanggal Laporan</label>
                            <input type="text" name="tanggal_laporan" id="tanggal_laporan" class="form-control tanggal_laporan" placeholder="tanggal laporan" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Tanggal Input</label>
                            <input type="text" name="tanggal_input" id="tanggal_input" class="form-control tanggal_input" placeholder="tanggal input" readonly>
                        </div>
                        <br>
                        <div class="form-group ">
                            <label>Kegiatan </label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="pemetaan_sebelumnya" id="pemetaan_sebelumnya" name="kegiatans[]" value="Pemetaan Tahun Sebelumnya" disabled> Melaksanakan Pemetaan sosial tahun sebelumnya
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="pendampingan_sebelumnya" id="pendampingan_sebelumnya" name="kegiatans[]" value="Pendampingan Tahun Sebelumnya" disabled> Melaksanakan Pendampingan tahun sebelumnya
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="monitoring" id="monitoring" name="kegiatans[]" value="Monitoring dan Evaluasi" disabled> Monitoring dan Evaluasi pelaksanaan akses reforma
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="koordinasi" id="koordinasi_kanwil" name="kegiatans[]" value="Koordinasi" disabled> Koordinasi dengan instansi/ tim penanganan
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="rapat" id="rapat_kanwil" name="kegiatans[]" value="Rapat" disabled> Rapat / Meeting
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="lainnya" id="lainnya_kanwil" name="kegiatans[]" value="Lainnya" disabled> Lainnya
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="message">Keterangan </label>
                            <textarea id="keterangan" name="keterangan" required="required" class="form-control keterangan" rows="3" placeholder="Keterangan.." readonly></textarea>
                        </div>
                        <br>
                        <div class=" form-group">
                            <label>Peserta </label>
                            <textarea name="peserta" id="peserta" class="form-control peserta" placeholder="Peserta" readonly></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="message">Kendala </label>
                            <textarea name="keluhan" id="keluhan" class="form-control keluhan" rows="3" placeholder="Tidak Ada Kendala" readonly></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="message">Saran</label>
                            <textarea name="saran" id="saran" class="form-control saran" rows="3" placeholder="Berikan Saran.."></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="message">Foto</label> <br>
                            <img id="foto" src="#" class="imgLaporan2 foto" style="display:none" />
                            <p id="noFoto" style="display:none" class="noFoto"> <i>Tidak ada Foto yang diupload</i> </p>
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
                <form method="post" id="deleteLaporan">
                    @csrf
                    @method('DELETE')
                    <p>Anda yakin ingin menghapus data laporan ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>