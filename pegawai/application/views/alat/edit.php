<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Tambah Kartu Inventaris Peralatan dan Mesin</h4>
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
                                        <input  value="<?= $alat->barang->nama_barang ?>" type="text" class="form-control" name="nama_barang" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kode Barang</label>
                                        <input disabled value="<?= $alat->barang->kode_barang ?>" type="text" class="form-control" name="kode_barang" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kode Register</label>
                                        <input  value="<?= $alat->barang->register_barang ?>" type="text" class="form-control" name="register_barang">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Merk / Type</label>
                                        <input  value="<?= $alat->merk_peralatan ?>" type="text" class="form-control" name="merk_peralatan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Ukuran / CC</label>
                                        <input  value="<?= $alat->ukuran_peralatan ?>" type="text" class="form-control" name="ukuran_peralatan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Bahan</label>
                                        <input  value="<?= $alat->bahan_peralatan ?>" type="text" class="form-control" name="bahan_peralatan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Tahun Pembelian</label>
                                        <input  value="<?= $alat->tahun_peralatan ?>" type="number" maxlength="4" class="form-control" name="tahun_peralatan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nomor Pabrik</label>
                                        <input  value="<?= $alat->nopabrik_peralatan ?>" type="text" class="form-control" name="nopabrik_peralatan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nomor Rangka</label>
                                        <input  value="<?= $alat->norangka_peralatan ?>" type="text" class="form-control" name="norangka_peralatan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nomor Mesin</label>
                                        <input  value="<?= $alat->nomesin_peralatan ?>" type="text" class="form-control" name="nomesin_peralatan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nomor Polisi</label>
                                        <input  value="<?= $alat->nopolisi_peralatan ?>" type="text" class="form-control" name="nopolisi_peralatan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nomor BPKB</label>
                                        <input  value="<?= $alat->nobpkb_peralatan ?>" type="text" class="form-control" name="nobpkb_peralatan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Asal - Usul Cara Perolehan</label>
                                        <input  value="<?= $alat->asal_peralatan ?>" type="text" class="form-control" name="asal_peralatan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Harga</label>
                                        <input  value="<?= $alat->harga_peralatan ?>" type="number" class="form-control" name="harga_peralatan">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Keterangan</label>
                                        <input   value="<?= $alat->barang->keterangan_barang ?>" type="text" class="form-control" name="keterangan_barang">
                                    </div>
                                </div>
                            </div>  
                            <div class="form-group float-right" id="simpan_data">
                                <input type="hidden" name="id_detail" value="<?= $alat->id_detail ?>">
                                <input type="hidden" name="id_barang" value="<?= $alat->barang->id_barang ?>">
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