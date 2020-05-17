<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Detail Dokumen Rafli</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="150px" class="align-middle text-center" rowspan="3">
                                        <img src="<?= asset('website/nice/assets/images/users/1-old.jpg') ?>" width="150px" alt="user" />
                                    </td>
                                    <td width="20%" class="align-middle">Nama</td>
                                    <td class="align-middle">Rafli Firdausy</td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Username</td>
                                    <td class="align-middle">raflyfirdausy</td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Jabatan</td>
                                    <td class="align-middle">Dokter</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- tabel surat keluar -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 m-b-5">
                                <button class="btn btn-success waves-effect float-left waves-light" type="button">Perbarui Dokumen</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 4%; padding: 10px;">No</th>
                                        <th style="padding: 10px;">Nama Dokumen</th>
                                        <th width="20%" style="padding: 10px;">Tanggal Upload</th>
                                        <th width="20%" style="padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="padding: 5px;" class="align-middle text-center">1</td>
                                        <td style="padding: 5px;" class="align-middle">Ijazah</td>
                                        <td style="padding: 5px;" class="align-middle">02-02-2020</td>
                                        <td style="padding: 5px;" class="align-middle text-center">
                                            <button class="btn btn-sm btn-info waves-effect waves-light" type="button">Download Dokumen</button>
                                        </td>

                                        <!-- MODAL TAMBAH SURAT KELUAR -->
                                        <div class="modal fade" id="ubah_surat" tabindex="-1" role="dialog" aria-labelledby="ubah_surat">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel1">Ubah Surat Keluar</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="control-label">Jenis Surat</label>
                                                                <select class="select2 form-control custom-select" style="width: 100%;" name="jenis_surat_tambah" id="jenis_surat_tambah2" required>
                                                                    <option value="">Pilih Jenis Surat</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="control-label">Nomor Surat</label>
                                                                <input type="text" class="form-control" name="nomor_surat" id="nomor_surat">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="control-label">Tanggal Surat</label>
                                                                <div class="input-group" style="width: 100%;">
                                                                    <input type="text" class="form-control" id="datepicker-autoclose2" name="tgl_surat" placeholder="mm/dd/yyyy">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Tambah</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END MODAL -->

                                        <!-- MODAL HAPUS SURAT KELUAR -->
                                        <div class="modal fade" id="hapus_surat" tabindex="-1" role="dialog" aria-labelledby="hapus_surat">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel1">Hapus Surat Keluar</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <p>Apakah anda yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END MODAL -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>