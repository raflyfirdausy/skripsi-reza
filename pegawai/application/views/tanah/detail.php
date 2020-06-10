<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Detail Kartu Inventaris Barang Tanah</h4>
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
                                        <input disabled value="<?= $tanah->barang->nama_barang ?>" type="text" class="form-control" name="nama_barang" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kode Barang</label>
                                        <input disabled value="<?= $tanah->barang->kode_barang ?>" type="text" class="form-control" name="kode_barang" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kode Register</label>
                                        <input disabled value="<?= $tanah->barang->register_barang ?>" type="text" class="form-control" name="register_barang">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Luas Tanah (m2)</label>
                                        <input disabled value="<?= $tanah->luas_tanah ?>"  type="number" class="form-control" name="luas_tanah">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Tahun Pengadaan</label>
                                        <input disabled value="<?= $tanah->tahun_pengadaan ?>" type="number" class="form-control" name="tahun_pengadaan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Letak / Alamat</label>
                                        <input disabled value="<?= $tanah->letak_tanah ?>" type="text" class="form-control" name="letak_tanah">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Hak Status Tanah</label>
                                        <input disabled value="<?= $tanah->hak_tanah ?>" type="text" class="form-control" name="hak_tanah">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Tanggal Sertifikat Tanah</label>
                                        <input disabled value="<?= $tanah->tanggal_tanah ?>" type="date" class="form-control" name="tanggal_tanah">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nomor Sertifikat Tanah</label>
                                        <input disabled value="<?= $tanah->nomor_tanah ?>"  type="text" class="form-control" name="nomor_tanah">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Penggunaan</label>
                                        <input disabled value="<?= $tanah->penggunaan_tanah ?>" type="text" class="form-control" name="penggunaan_tanah">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Asal Usul</label>
                                        <input disabled value="<?= $tanah->asal_tanah ?>" type="text" class="form-control" name="asal_tanah">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Harga (Rp)</label>
                                        <input disabled value="<?= $tanah->harga_tanah ?>" type="number" class="form-control" name="harga_tanah">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Keterangan</label>
                                        <input disabled value="<?= $tanah->barang->keterangan_barang ?>" type="text" class="form-control" name="keterangan_barang">
                                    </div>
                                </div>
                            </div>                         
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>