<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Tambah Kartu Inventaris Bangunan dan Gedung</h4>
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
                                        <input type="text" class="form-control" name="nama_barang" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kode Barang</label>
                                        <input type="text" class="form-control" name="kode_barang" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kode Register</label>
                                        <input type="text" class="form-control" name="register_barang">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kondisi bangunan</label><br>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="kondisi_bangunan" id="kondisi_bangunan">
                                            <option value="Baik" selected>Baik</option>
                                            <option value="Kurang Baik" >Kurang Baik</option>
                                            <option value="Rusak Berat">Rusak Berat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Konstruksi Bangunan (Bertingkat / Tidak)</label><br>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="bertingkat_bangunan" id="bertingkat_bangunan">
                                            <option value="Bertingkat" selected>Bertingkat</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Konstruksi Bangunan (Beton / Tidak)</label><br>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="beton_bangunan" id="beton_bangunan">
                                            <option value="Beton" selected>Beton</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Luas Lantai (m2)</label>
                                        <input type="number" class="form-control" name="luaslantai_bangunan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Letak / Alamat</label>
                                        <input type="text" class="form-control" name="letak_bangunan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Tanggal Dokumen Gedung</label>
                                        <input type="date" class="form-control" name="dokumentanggal_bangunan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nomor Dokumen Gedung</label>
                                        <input type="text" class="form-control" name="dokumenno_bangunan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Luas Tanah (m2)</label>
                                        <input type="number" class="form-control" name="luastanah_bangunan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Status Tanah</label>
                                        <input type="text" class="form-control" name="statustanah_bangunan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nomor Kode Tanah</label>
                                        <input type="text" class="form-control" name="nomor_bangunan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Asal Usul Tanah</label>
                                        <input type="text" class="form-control" name="asal_bangunan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Harga</label>
                                        <input type="number" class="form-control" name="harga_bangunan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan_barang">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group float-right" id="simpan_data">
                                <a href="<?= base_url("peralatan") ?>" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>