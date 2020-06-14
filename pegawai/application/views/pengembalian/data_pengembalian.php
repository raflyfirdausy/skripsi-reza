<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Data Pengembalian Peminjaman (<?= $detail->kode_peminjaman ?>)</h4>
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
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Nama Peminjam</label>
                                    <input disabled value="<?= $detail->nama_peminjaman ?>" type="text" class="form-control" name="nama_peminjaman" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Keperluan Peminjaman</label>
                                    <input disabled value="<?= $detail->keperluan_peminjaman ?>" type="text" class="form-control" name="keperluan_peminjaman" required>
                                </div>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Tanggal Peminjaman</label>
                                    <input disabled value="<?= $detail->waktupinjam_peminjaman ?>" type="text" class="form-control" name="waktukembali_peminjaman" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Tanggal Pengembalian</label>
                                    <input disabled value="<?= $detail->waktukembali_peminjaman ?>" type="text" class="form-control" name="waktukembali_peminjaman" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Status Peminjaman</label>
                                    <input disabled value="<?= $detail->status_peminjaman == "1" ? "Belum dikembalikan" : "Sudah dikembalikan" ?>" type="text" class="form-control" name="waktukembali_peminjaman" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row col-md-12">
                            <div class="col-sm-12">
                                <label for="recipient-name" class="control-label">Daftar Barang Peminjaman</label>
                                <div class="table-responsive">
                                    <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%; padding: 10px;">No</th>
                                                <th style=" padding: 10px;">Kode Barang</th>
                                                <th style=" padding: 10px;">Nama Barang</th>
                                                <th style=" padding: 10px;">Banyak Peminjaman</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($detail->detail) : ?>
                                                <?php $no = 1;
                                                foreach ($detail->detail as $data) : ?>
                                                    <?php $data->barang = (object) $data->barang  ?>
                                                    <tr>
                                                        <td style="padding: 5px;" class="align-middle text-center"><?= $no++ ?></td>
                                                        <td style="padding: 5px;" class="align-middle"><?= $data->barang->kode_barang ?></td>
                                                        <td style="padding: 5px;" class="align-middle"><?= $data->barang->nama_barang ?></td>
                                                        <td style="padding: 5px;" class="align-middle"><?= $data->banyak_barang ?> Barang</td>
                                                    </tr>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Tambahkan Keterangan Pengembalian</label>
                                    <textarea readonly name="keterangan_peminjaman" class="form-control" rows="4"><?= $detail->keterangan_peminjaman ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Waktu Pengembalian</label>
                                    <input disabled value="<?= $detail->updated_at ?>" type="text" class="form-control" name="waktukembali_peminjaman" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group float-right" id="simpan_data">
                            <a href="<?= base_url("pengembalian") ?>" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>