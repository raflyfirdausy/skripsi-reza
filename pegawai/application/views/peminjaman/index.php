<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Daftar Peminjaman Barang</h4>
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
                        <div class="float-right m-b-20">
                            <a href="<?= base_url("peminjaman/export") ?>" type="button" class="btn waves-effect waves-light btn-danger">Unduh Laporan</a>
                            <?php if ($this->userData->level_admin == "1") : ?>
                                <a href="<?= base_url("peminjaman/tambah") ?>" type="button" class="btn waves-effect waves-light btn-success">Tambah Peminjaman</a>
                            <?php endif ?>
                        </div>
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; padding: 10px;">No</th>
                                        <th style=" padding: 10px;">Kode Peminjaman</th>
                                        <th style=" padding: 10px;">Nama Peminjam</th>
                                        <th style=" padding: 10px;">Keperluan</th>
                                        <th style=" padding: 10px;">Tanggal Pinjam</th>
                                        <th style=" padding: 10px;">Tanggal Kembali</th>
                                        <th style=" padding: 10px;">Jumlah</th>
                                        <th style=" padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($peminjaman) : ?>
                                        <?php $no = 1;
                                        foreach ($peminjaman as $data) : ?>

                                            <?php $total = 0;
                                            foreach ($data["detail"] as $item) : ?>
                                                <?php $total += $item->banyak_barang; ?>
                                            <?php endforeach ?>
                                            <tr>
                                                <td style="padding: 5px;" class="align-middle text-center"><?= $no++ ?></td>
                                                <td style="padding: 5px;" class="align-middle"><?= $data["kode_peminjaman"] ?></td>
                                                <td style="padding: 5px;" class="align-middle"><?= $data["nama_peminjaman"] ?></td>
                                                <td style="padding: 5px;" class="align-middle"><?= $data["keperluan_peminjaman"] ?></td>
                                                <td style="padding: 5px;" class="align-middle"><?= $data["waktupinjam_peminjaman"] ?></td>
                                                <td style="padding: 5px;" class="align-middle"><?= $data["waktukembali_peminjaman"] ?></td>
                                                <td style="padding: 5px;" class="align-middle"><?= $total ?> Barang</td>
                                                <td style="padding: 5px;" class="align-middle text-center">
                                                    <?php if ($this->userData->level_admin == "1") : ?>
                                                        <a target="_blank" href="<?= base_url("peminjaman/bukti/" . $data["kode_peminjaman"]) ?>" class="btn btn-sm btn-primary waves-effect waves-light" type="button">Bukti</a>
                                                    <?php endif ?>
                                                    <a href="<?= base_url("peminjaman/detail/" . $data["kode_peminjaman"]) ?>" class="btn btn-sm btn-info waves-effect waves-light" type="button">Detail</a>
                                                    <?php if ($this->userData->level_admin == "1") : ?>
                                                        <a href="<?= base_url("peminjaman/hapus/" . $data["kode_peminjaman"]) ?>" class="btn btn-sm btn-danger waves-effect waves-light" type="button" onclick="return confirm('Hapus data data peminjaman <?= $data['kode_peminjaman'] ?> ?');">Hapus</a>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>