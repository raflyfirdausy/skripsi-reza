<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Tambah Peminjaman</h4>
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nama Peminjam</label>
                                        <input type="text" class="form-control" name="nama_peminjaman" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Keperluan Peminjaman</label>
                                        <input type="text" class="form-control" name="keperluan_peminjaman" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Tanggal Pengembalian</label>
                                        <input type="date" class="form-control" name="waktukembali_peminjaman" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row col-md-12">                                
                                <div class="col-sm-12">
                                    <label for="recipient-name" class="control-label">Daftar Barang Peminjaman</label>
                                    <div class="email-repeater form-group">
                                        <div data-repeater-list="barang">
                                            <div data-repeater-item class="row m-b-15">
                                                <div class="col-md-7">
                                                    <select class="select2 form-control custom-select select-mantap" style="width: 100%;" name="id">
                                                        <?php if ($barang) : ?>
                                                            <?php foreach ($barang as $data) : ?>
                                                                <option value="<?= $data->id_barang ?>"><?= $data->nama_barang ?></option>
                                                            <?php endforeach ?>
                                                        <?php endif ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input required type="number" class="form-control" id="" placeholder="Banyak Barang" name="banyak" required>
                                                </div>
                                                <div class="col-md-1">
                                                    <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light" type="button"><i class="ti-close"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" data-repeater-create="" class="btn btn-info waves-effect waves-light">Tambah Barang Lain
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group float-right" id="simpan_data">
                                <a href="<?= base_url("tanah") ?>" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>