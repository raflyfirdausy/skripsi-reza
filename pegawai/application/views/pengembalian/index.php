<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Daftar Pengembalian Barang</h4>
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

        <!-- MODAL KEMBALI BARANG -->
        <div class="modal fade myModal" id="kembalikanBarang" tabindex="-1" role="dialog" aria-labelledby="tambahJabatan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form enctype="multipart/form-data" action="<?= current_url() ?>" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">Kembalikan Barang</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Kode Peminjaman <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kode_peminjaman" id="kode_peminjaman" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success ultra-disabled" id="add-btn">Kembalikan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right m-b-20">
                            <button type="button" class="btn waves-effect waves-light btn-success" id="tombol-tambah" style="width: 180px;" data-toggle="modal" data-target="#kembalikanBarang">Kembalikan Barang</button>
                        </div>
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; padding: 10px;">No</th>
                                        <th style=" padding: 10px;">Kode Peminjaman</th>
                                        <th style=" padding: 10px;">Nama Peminjam</th>
                                        <th style=" padding: 10px;">Tanggal Pengembalian</th>
                                        <th style=" padding: 10px;">Keterangan</th>
                                        <th style=" padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>