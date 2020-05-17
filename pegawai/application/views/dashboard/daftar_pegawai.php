<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Daftar Pegawai</h4>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="<?= base_url('daftar-pegawai') ?>" method="get">
                    <div class="card">
                        <div class="card-body">
                            <select required class="select2 form-control custom-select" style="width: 250px;" name="jenis" id="jenis">
                                <option value="">Pilih Jenis Pegawai</option>
                                <option value="semua">Semua</option>
                                <?php foreach ($jabatan as $j) : ?>
                                    <option value="<?= $j->id_jabatan ?>"><?= $j->nama_jabatan ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" class="btn waves-effect waves-light btn-info" style="width: 100px;"><i class="fa fa-search"></i> Cari</button>
                            <?php if ($user_data->level_user == 1) : ?>
                                <div class="float-right">
                                    <?php if ($user_data->level_user != 3) : ?>
                                        <a href="<?= base_url('daftar-pegawai/export') ?>" type="button" class="btn waves-effect waves-light btn-danger">Export Pegawai</a>
                                    <?php endif; ?>
                                    <button type="button" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#tambahPegawai">Tambah Pegawai</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>

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
                        <form method="POST" action="<?= base_url('daftar-pegawai/tambah-pegawai') ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Gelar Depan</label>
                                        <input type="text" name="gelar_depan" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Gelar Belakang</label>
                                        <input type="text" name="gelar_belakang" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input required type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="agama_pegawai" id="jenis_surat_tambah" required>
                                            <option value="">Pilih Agama</option>
                                            <?php foreach (daftar_agama() as $a) : ?>
                                                <option value="<?= $a ?>"><?= $a ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Pendidikan Terakhir</label>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="pendidikan_pegawai" id="jenis_surat_tambah" required>
                                            <option value="">Pilih Pendidikan Terakhir</option>
                                            <?php foreach (pendidikan_terakhir() as $p) : ?>
                                                <option value="<?= $p ?>"><?= $p ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No Handphone</label>
                                        <input maxlength="13" onkeyup="numOnly(this)" onblur="numOnly(this)" required type="tel" id="no_hp" name="no_hp" class="form-control" placeholder="No Hp Anda">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jalan</label>
                                        <input  type="text" name="jalan" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input  onkeyup="numOnly(this)" onblur="numOnly(this)" type="text" id="rt" name="rt" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input onkeyup="numOnly(this)" onblur="numOnly(this)" type="text" name="rw" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Desa</label>
                                        <input type="text" name="desa" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" name="kecamatan" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <input type="text" name="kabupaten" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <input type="text" name="provinsi" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Jenis Pegawai</label>
                                <select class="select2 form-control custom-select" style="width: 100%;" name="jabatan_pegawai" id="jenis_surat_tambah" required>
                                    <option value="">Pilih Jenis Pegawai</option>
                                    <?php foreach ($jabatan as $j) : ?>
                                        <option value="<?= $j->id_jabatan ?>"><?= $j->nama_jabatan ?></option>
                                    <?php endforeach; ?>
                                </select>
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
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 4%; padding: 10px;">No</th>
                                        <th style=" padding: 10px;">Nama Pegawai</th>
                                        <th style=" padding: 10px;">Username</th>
                                        <th style=" padding: 10px;">Jabatan</th>
                                        <!-- <th style=" padding: 10px;">Jumlah Dokumen</th> -->
                                        <th style=" padding: 10px;">Tanggal Lahir</th>
                                        <th style="padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $no = 1;
                                    foreach ($dataPegawai as $d) : ?>
                                        <tr>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $no++ ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $d->gelardepan_user . " " . $d->nama_user . " " . $d->gelarbelakang_user ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $d->username_user ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $d->nama_jabatan ?></td>
                                            <!-- <td style="padding: 5px;" class="align-middle text-center"><?= 0 ?></td> -->
                                            <td style="padding: 5px;" class="align-middle"><?= $d->tanggallahir_user ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center">
                                                <a href="<?= base_url('dokumen-pegawai/detail/') . $d->username_user ?>" class="btn btn-sm btn-info text-white waves-effect waves-light">Lihat</a>
                                                <?php if ($user_data->level_user == 1) : ?>
                                                    <button class="btn btn-sm btn-primary waves-effect waves-light" type="button" data-toggle="modal" data-target="#ubah_pegawai<?= $d->username_user ?>">Ubah</button>
                                                    <button class="btn btn-sm btn-danger waves-effect waves-light" type="button" data-toggle="modal" data-target="#hapus_pegawai<?= $d->username_user ?>">Hapus</button>
                                                <?php endif; ?>
                                            </td>

                                            <!-- MODAL UBAH PEGAWAI -->
                                            <div class="modal fade" id="ubah_pegawai<?= $d->username_user ?>" role="dialog" aria-labelledby="ubah_pegawai">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLabel1">Ubah Pegawai</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="<?= base_url('daftar-pegawai/ubah-data') ?>">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="control-label">Username</label>
                                                                            <input disabled type="text" value="<?= $d->username_user ?>" class="form-control" name="username" id="username">
                                                                            <input type="hidden" name="id_pegawai" value="<?= $d->id_user ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Gelar Depan</label>
                                                                            <input type="text" name="gelar_depan" value="<?= $d->gelardepan_user ?>" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Nama Lengkap</label>
                                                                            <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $d->nama_user ?>" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Gelar Belakang</label>
                                                                            <input type="text" name="gelar_belakang" value="<?= $d->gelarbelakang_user ?>" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Tanggal Lahir</label>
                                                                            <input required type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $d->tanggallahir_user ?>" class="form-control" placeholder="Tanggal Lahir">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Agama</label>
                                                                            <select class="select2 form-control custom-select" style="width: 100%;" name="agama_pegawai" id="jenis_surat_tambah" required>
                                                                                <option value="">Pilih Agama</option>
                                                                                <?php foreach (daftar_agama() as $a) : ?>
                                                                                    <option <?= $d->agama_user == $a ? "selected" : "" ?> value="<?= $a ?>"><?= $a ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Pendidikan Terakhir</label>
                                                                            <select class="select2 form-control custom-select" style="width: 100%;" name="pendidikan_pegawai" id="jenis_surat_tambah" required>
                                                                                <option value="">Pilih Pendidikan Terakhir</option>
                                                                                <?php foreach (pendidikan_terakhir() as $p) : ?>
                                                                                    <option <?= $d->pendidikan_user == $p ? "selected" : "" ?> value="<?= $p ?>"><?= $p ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>No Handphone</label>
                                                                            <input value="<?= $d->no_hp ?>" maxlength="13" onkeyup="numOnly(this)" onblur="numOnly(this)" required type="tel" id="no_hp" name="no_hp" class="form-control" placeholder="No Hp Anda">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Jalan</label>
                                                                            <input value="<?= $d->jalan ?>" type="text" name="jalan" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>RT</label>
                                                                            <input value="<?= $d->rt ?>" onkeyup="numOnly(this)" onblur="numOnly(this)" type="text" id="rt" name="rt" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>RW</label>
                                                                            <input value="<?= $d->rw ?>" onkeyup="numOnly(this)" onblur="numOnly(this)" type="text" name="rw" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Desa</label>
                                                                            <input value="<?= $d->desa ?>" type="text" name="desa" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Kecamatan</label>
                                                                            <input value="<?= $d->kecamatan ?>" type="text" name="kecamatan" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Kabupaten</label>
                                                                            <input value="<?= $d->kabupaten ?>" type="text" name="kabupaten" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Provinsi</label>
                                                                            <input value="<?= $d->provinsi ?>" type="text" name="provinsi" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">Jenis Pegawai</label>
                                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="jabatan_pegawai" id="jenis_surat_tambah" required>
                                                                        <option value="">Pilih Jenis Pegawai</option>
                                                                        <?php foreach ($jabatan as $j) : ?>
                                                                            <option <?= $d->id_jabatan == $j->id_jabatan ? "selected" : "" ?> value="<?= $j->id_jabatan ?>"><?= $j->nama_jabatan ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Password (kosongi jika tidak ingin diubah)</label>
                                                                    <input type="password" minlength="8" class="form-control" name="password" id="password">
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
                                            <div class="modal fade" id="hapus_pegawai<?= $d->username_user ?>" role="dialog" aria-labelledby="hapus_pegawai">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLabel1">Hapus Data Pegawai</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="<?= base_url('daftar-pegawai/hapus-data') ?>">
                                                                <input type="hidden" name="id_pegawai" value="<?= $d->id_user ?>">
                                                                <p>Apakah anda yakin ingin menghapus data <?= $d->gelardepan_user . " " . $d->nama_user . " " . $d->gelarbelakang_user ?> ?</p>
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

<script>
    function numOnly(selector) {
        selector.value = selector.value.replace(/[^0-9]/g, '');
    }
</script>