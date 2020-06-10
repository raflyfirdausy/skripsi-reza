<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Edit Kartu Inventaris Bangunan dan Gedung</h4>
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
                                        <input value="<?= $bangunan->barang->nama_barang ?>" type="text" class="form-control" name="nama_barang" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kode Barang</label>
                                        <input disabled value="<?= $bangunan->barang->kode_barang ?>" type="text" class="form-control" name="kode_barang" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kode Register</label>
                                        <input value="<?= $bangunan->barang->register_barang ?>" type="text" class="form-control" name="register_barang">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kondisi bangunan</label><br>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="kondisi_bangunan" id="kondisi_bangunan">
                                            <option value="Baik" <?= $bangunan->kondisi_bangunan == "Baik" ? "selected" : "" ?>>Baik</option>
                                            <option value="Kurang Baik" <?= $bangunan->kondisi_bangunan == "Kurang Baik" ? "selected" : "" ?>>Kurang Baik</option>
                                            <option value="Rusak Berat" <?= $bangunan->kondisi_bangunan == "Rusak Berat" ? "selected" : "" ?>>Rusak Berat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Konstruksi Bangunan (Bertingkat / Tidak)</label><br>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="bertingkat_bangunan" id="bertingkat_bangunan">
                                            <option value="Bertingkat" <?= $bangunan->bertingkat_bangunan == "Bertingkat" ? "selected" : "" ?>>Bertingkat</option>
                                            <option value="Tidak" <?= $bangunan->bertingkat_bangunan == "Tidak" ? "selected" : "" ?>>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Konstruksi Bangunan (Beton / Tidak)</label><br>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="beton_bangunan" id="beton_bangunan">
                                            <option value="Beton" <?= $bangunan->beton_bangunan == "Beton" ? "selected" : "" ?>>Beton</option>
                                            <option value="Tidak" <?= $bangunan->beton_bangunan == "Tidak" ? "selected" : "" ?>>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Luas Lantai (m2)</label>
                                        <input value="<?= $bangunan->luaslantai_bangunan ?>" type="number" class="form-control" name="luaslantai_bangunan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Letak / Alamat</label>
                                        <input value="<?= $bangunan->letak_bangunan ?>" type="text" class="form-control" name="letak_bangunan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Tanggal Dokumen Gedung</label>
                                        <input value="<?= $bangunan->dokumentanggal_bangunan ?>" type="date" class="form-control" name="dokumentanggal_bangunan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nomor Dokumen Gedung</label>
                                        <input value="<?= $bangunan->dokumenno_bangunan ?>" type="text" class="form-control" name="dokumenno_bangunan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Luas Tanah (m2)</label>
                                        <input value="<?= $bangunan->luastanah_bangunan ?>" type="number" class="form-control" name="luastanah_bangunan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Status Tanah</label>
                                        <input value="<?= $bangunan->statustanah_bangunan ?>" type="text" class="form-control" name="statustanah_bangunan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nomor Kode Tanah</label>
                                        <input value="<?= $bangunan->nomor_bangunan ?>" type="text" class="form-control" name="nomor_bangunan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Asal Usul Tanah</label>
                                        <input value="<?= $bangunan->asal_bangunan ?>" type="text" class="form-control" name="asal_bangunan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Harga</label>
                                        <input value="<?= $bangunan->harga_bangunan ?>" type="number" class="form-control" name="harga_bangunan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Keterangan</label>
                                        <input value="<?= $bangunan->barang->keterangan_barang ?>" type="text" class="form-control" name="keterangan_barang">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group float-right" id="simpan_data">
                                <input type="hidden" name="id_detail" value="<?= $bangunan->id_detail ?>">
                                <input type="hidden" name="id_barang" value="<?= $bangunan->barang->id_barang ?>">
                                <a href="<?= base_url("peralatan") ?>" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>