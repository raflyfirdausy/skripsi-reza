<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Kartu Inventaris Bangunan dan Gedung</h4>
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
                            <a href="<?= base_url("bangunan/export") ?>" type="button" class="btn waves-effect waves-light btn-danger">Unduh Laporan</a>
                            <a href="<?= base_url("bangunan/tambah") ?>" type="button" class="btn waves-effect waves-light btn-success">Tambah Inventaris Bangunan dan Gedung</a>
                        </div>
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; padding: 10px;">No</th>
                                        <th style=" padding: 10px;">Nama Barang</th>
                                        <th style=" padding: 10px;">Kode Barang</th>
                                        <th style=" padding: 10px;">Kode Register</th>
                                        <th style=" padding: 10px;">Kondisi Bangunan</th>
                                        <th style=" padding: 10px;">Luas Lantai (m2)</th>
                                        <th style="width: 20%; padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($bangunan) : ?>
                                        <?php $no = 1;
                                        foreach ($bangunan as $data) : ?>
                                            <?php if (!empty($data->barang)) : ?>
                                                <tr>
                                                    <td style="padding: 5px;" class="align-middle text-center"><?= $no++ ?></td>
                                                    <td style="padding: 5px;" class="align-middle"><?= $data->barang->nama_barang ?></td>
                                                    <td style="padding: 5px;" class="align-middle"><?= $data->barang->kode_barang ?></td>
                                                    <td style="padding: 5px;" class="align-middle"><?= $data->barang->register_barang ?></td>
                                                    <td style="padding: 5px;" class="align-middle"><?= $data->kondisi_bangunan ?></td>
                                                    <td style="padding: 5px;" class="align-middle"><?= $data->luaslantai_bangunan ?></td>
                                                    <td style="padding: 5px;" class="align-middle text-center">
                                                        <a href="<?= base_url("bangunan/detail/" . $data->barang->kode_barang) ?>" class="btn btn-sm btn-info waves-effect waves-light" type="button">Detail</a>
                                                        <a href="<?= base_url("bangunan/edit/" . $data->barang->kode_barang) ?>" class="btn btn-sm btn-primary waves-effect waves-light" type="button">Ubah</a>
                                                        <a href="<?= base_url("bangunan/hapus/" . $data->barang->kode_barang) ?>" class="btn btn-sm btn-danger waves-effect waves-light" type="button" onclick="return confirm('Hapus data data <?= $data->barang->nama_barang ?> ?');">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endif ?>
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