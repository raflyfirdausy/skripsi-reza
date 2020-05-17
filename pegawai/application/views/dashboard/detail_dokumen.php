<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Detail Dokumen <?= ucwords(strtolower($user_detail->nama_user)) ?></h4>
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="150px" class="align-middle text-center" rowspan="5">
                                        <img src="<?= $foto == "" ? asset('website/img/default.png') : $foto ?>" width="150px" alt="user" />
                                    </td>
                                    <td width="20%" class="align-middle">Nama</td>
                                    <td class="align-middle"><?= $user_detail->gelardepan_user . " " . ucwords(strtolower($user_detail->nama_user)) . " " . $user_detail->gelarbelakang_user ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Username</td>
                                    <td class="align-middle"><?= strtolower($user_detail->username_user) ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Jabatan</td>
                                    <td class="align-middle"><?= ucwords(strtolower($user_detail->nama_jabatan)) ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle">No Hp</td>
                                    <td class="align-middle"><?= $user_detail->no_hp ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Alamat</td>
                                    <td class="align-middle">
                                        <?= $user_detail->jalan . ", Desa "
                                            . $user_detail->desa . " RT " .
                                            $user_detail->rt . " RW " .
                                            $user_detail->rw . ", Kec." .
                                            $user_detail->kecamatan . ", Kab. " .
                                            $user_detail->kabupaten . ", " .
                                            $user_detail->provinsi ?>
                                    </td>
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
                        <?php if ($user_data->level_user == 3) : ?>
                            <div class="row">
                                <div class="col-md-12 m-b-5">
                                    <a href="<?= base_url('dokumen-pegawai/lengkapi/') . $user_data->username_user ?>" class="btn btn-success waves-effect float-left waves-light" type="button">Lengkapi atau Ubah Dokumen</a>
                                </div>
                            </div>
                        <?php endif; ?>
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
                                    <?php $no = 1;
                                    foreach ($dokumen as $d) : ?>

                                        <tr>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $no++ ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $d->nama_file ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $d->updated_at ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center">
                                                <a target="_blank" href="<?= base_url('assets/dokumen/') . $d->lokasi_file ?>" class="btn btn-sm btn-info waves-effect waves-light" type="button">Download</a>
                                                <?php if ($user_data->level_user == 3 || $user_data->level_user == 1) : ?>
                                                    <button class="btn btn-sm btn-danger waves-effect waves-light" type="button" data-toggle="modal" data-target="#hapus_dokumen_<?= md5($d->id_file) ?>">Hapus</button>
                                                <?php endif; ?>
                                            </td>

                                            <!-- MODAL HAPUS -->
                                            <div class="modal fade" id="hapus_dokumen_<?= md5($d->id_file) ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_surat">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLabel1">Hapus Surat Keluar</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="<?= current_url() ?>">
                                                                <input type="hidden" name="id_file" value="<?= $d->id_file ?>">
                                                                <p>Apakah anda yakin ingin menghapus data <?= $d->nama_file ?> ?</p>
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