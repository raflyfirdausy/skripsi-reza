<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Detail Kartu Inventaris Jalan, Irigasi, dan Jaringan</h4>
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
                                        <input disabled value="<?= $jalan->barang->nama_barang ?>" type="text" class="form-control" name="nama_barang" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kode Barang</label>
                                        <input disabled value="<?= $jalan->barang->kode_barang ?>" type="text" class="form-control" name="kode_barang" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kode Register</label>
                                        <input disabled value="<?= $jalan->barang->register_barang ?>" type="text" class="form-control" name="register_barang">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Konstruksi</label>
                                        <input disabled value="<?= $jalan->konstruksi_jalan ?>" type="text" class="form-control" name="konstruksi_jalan">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Panjang (Km)</label>
                                        <input disabled value="<?= $jalan->panjang_jalan ?>" type="number" class="form-control" name="panjang_jalan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Lebar (m)</label>
                                        <input disabled value="<?= $jalan->lebar_jalan ?>" type="number" class="form-control" name="lebar_jalan">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Luas (m2)</label>
                                        <input readonly value="<?= $jalan->luas_jalan ?>" type="number" class="form-control" name="luas_jalan">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Letak / Lokasi</label>
                                        <input disabled value="<?= $jalan->letak_jalan ?>" type="text" class="form-control" name="letak_jalan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Tanggal Dokumen</label>
                                        <input disabled value="<?= $jalan->dokumentanggal_jalan ?>" type="date" class="form-control" name="dokumentanggal_jalan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nomor Dokumen</label>
                                        <input disabled value="<?= $jalan->dokumenno_jalan ?>" type="text" class="form-control" name="dokumenno_jalan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Status Tanah</label>
                                        <input disabled value="<?= $jalan->statustanah_jalan ?>" type="text" class="form-control" name="statustanah_jalan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nomor Kode Tanah</label>
                                        <input disabled value="<?= $jalan->nokodetanah_jalan ?>" type="text" class="form-control" name="nokodetanah_jalan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Asal Usul Tanah</label>
                                        <input disabled value="<?= $jalan->asal_jalan ?>" type="text" class="form-control" name="asal_jalan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Harga (Rp)</label>
                                        <input disabled value="<?= $jalan->harga_jalan ?>" type="number" class="form-control" name="harga_jalan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kondisi Jalan</label><br>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="kondisi_jalan" id="kondisi_jalan">
                                            <option value="Baik" <?= $jalan->kondisi_jalan == "Baik" ? "selected" : "" ?>>Baik</option>
                                            <option value="Kurang Baik" <?= $jalan->kondisi_jalan == "Kurang Baik" ? "selected" : "" ?>>Kurang Baik</option>
                                            <option value="Rusak Berat" <?= $jalan->kondisi_jalan == "Rusak Berat" ? "selected" : "" ?>>Rusak Berat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Keterangan</label>
                                        <input disabled value="<?= $jalan->barang->keterangan_barang ?>" type="text" class="form-control" name="keterangan_barang">
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