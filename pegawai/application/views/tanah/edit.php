<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Edit Kartu Inventaris Barang Tanah</h4>
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
                        <form action="<?= current_url() ?>" method="post" enctype="multipart/form-data">
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nama Barang</label>
                                        <input value="<?= $tanah->barang->nama_barang ?>" type="text" class="form-control" name="nama_barang" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kode Barang</label>
                                        <input value="<?= $tanah->barang->kode_barang ?>" type="text" class="form-control" name="kode_barang" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kode Register</label>
                                        <input value="<?= $tanah->barang->register_barang ?>" type="text" class="form-control" name="register_barang">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Luas Tanah (m2)</label>
                                        <input value="<?= $tanah->luas_tanah ?>"  type="number" class="form-control" name="luas_tanah">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Tahun Pengadaan</label>
                                        <input value="<?= $tanah->tahun_pengadaan ?>" type="number" class="form-control" name="tahun_pengadaan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Letak / Alamat</label>
                                        <input value="<?= $tanah->letak_tanah ?>" type="text" class="form-control" name="letak_tanah">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Hak Status Tanah</label>
                                        <input value="<?= $tanah->hak_tanah ?>" type="text" class="form-control" name="hak_tanah">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Tanggal Sertifikat Tanah</label>
                                        <input value="<?= $tanah->tanggal_tanah ?>" type="date" class="form-control" name="tanggal_tanah">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nomor Sertifikat Tanah</label>
                                        <input value="<?= $tanah->nomor_tanah ?>"  type="text" class="form-control" name="nomor_tanah">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Penggunaan</label>
                                        <input value="<?= $tanah->penggunaan_tanah ?>" type="text" class="form-control" name="penggunaan_tanah">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Asal Usul</label>
                                        <input value="<?= $tanah->asal_tanah ?>" type="text" class="form-control" name="asal_tanah">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Harga (Rp)</label>
                                        <input value="<?= $tanah->harga_tanah ?>" type="number" class="form-control" name="harga_tanah">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Keterangan</label>
                                        <input value="<?= $tanah->barang->keterangan_barang ?>" type="text" class="form-control" name="keterangan_barang">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group float-right" id="simpan_data">
                                <input type="hidden" name="id_detail" value="<?= $tanah->id_detail ?>">
                                <input type="hidden" name="id_barang" value="<?= $tanah->barang->id_barang ?>">
                                <a href="<?= base_url("tanah") ?>" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>