<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Daftar Jabatan</h4>
            </div>

        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <?php if ($this->session->flashdata("sukses")) : ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata("sukses") ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata("gagal")) : ?>
                    <div class="alert alert-danger"> <?= $this->session->flashdata("gagal") ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- MODAL TAMBAH PEGAWAI -->
        <div class="modal fade" id="tambahPegawai" role="dialog" aria-labelledby="tambahPegawai">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Pegawai</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?= base_url('daftar-jabatan/tambah-jabatan') ?>">
                            <div class="form-group">
                                <label for="message-text" class="control-label">Nama Jabatan</label>
                                <input required type="text" class="form-control" name="nama_jabatan" id="nama_jabatan">
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

        <!-- tabel surat keluar -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right m-b-20">
                            <button type="button" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#tambahPegawai">Tambah Jabatan</button>
                        </div>
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; padding: 10px;">No</th>
                                        <th style=" padding: 10px;">Nama Jabatan</th>
                                        <!-- <th style=" padding: 10px;">Username</th>
                                        <th style=" padding: 10px;">Jabatan</th> -->
                                        <!-- <th style=" padding: 10px;">Jumlah Dokumen</th> -->
                                        <!-- <th style=" padding: 10px;">Tanggal Lahir</th> -->
                                        <th style="width: 20%; padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $no = 1;
                                    foreach ($jabatan as $d) : ?>
                                        <tr>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $no++ ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $d->nama_jabatan ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center">
                                                <button class="btn btn-sm btn-primary waves-effect waves-light" type="button" data-toggle="modal" data-target="#ubah_pegawai<?= $d->id_jabatan ?>">Ubah</button>
                                                <button class="btn btn-sm btn-danger waves-effect waves-light" type="button" data-toggle="modal" data-target="#hapus_pegawai<?= $d->id_jabatan ?>">Hapus</button>
                                            </td>

                                            <!-- MODAL UBAH PEGAWAI -->
                                            <div class="modal fade" id="ubah_pegawai<?= $d->id_jabatan ?>" role="dialog" aria-labelledby="ubah_pegawai">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLabel1">Ubah Jabatan</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="<?= base_url('daftar-jabatan/ubah-jabatan') ?>">
                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Nama Jabatan</label>
                                                                    <input type="text" value="<?= $d->nama_jabatan ?>" class="form-control" name="nama_jabatan" id="nama_jabatan">
                                                                    <input type="hidden" name="id_jabatan" value="<?= $d->id_jabatan ?>">
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END MODAL -->

                                            <!-- MODAL HAPUS PEGAWAI -->
                                            <div class="modal fade" id="hapus_pegawai<?= $d->id_jabatan ?>" role="dialog" aria-labelledby="hapus_pegawai">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLabel1">Hapus Data Jabatan</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="<?= base_url('daftar-jabatan/hapus-jabatan') ?>">
                                                                <input type="hidden" name="id_jabatan" value="<?= $d->id_jabatan ?>">
                                                                <p>Apakah anda yakin ingin menghapus data <?= $d->nama_jabatan ?> ?</p>
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
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>