<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Lengkapi Dokumen <?= ucwords(strtolower($user_detail->nama_user)) ?></h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <?php if ($this->session->flashdata("dataSukses")) : ?>
                    <?php foreach ($this->session->flashdata("dataSukses") as $data) : ?>
                        <div class="alert alert-success"> <?= $data ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if ($this->session->flashdata("dataGagal")) : ?>
                    <?php foreach ($this->session->flashdata("dataGagal") as $data) : ?>
                        <div class="alert alert-danger"> <?= $data ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Isi data di bawah ini (Maximal Ukuran per File 2MB)</h4>
                        <!-- <form class="m-t-20" method="POST" action="<?= base_url('dokumen-pegawai/update-dokumen') ?>"> -->
                        <?= form_open_multipart('dokumen-pegawai/update-dokumen', ["class" => 'm-t-20']) ?>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                                Foto Formal
                            </label>
                            <div class="col-sm-9">
                                <div class="">
                                    <input type="file" class="" id="customFile" name="foto_formal">
                                    <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                                Ijazah SD
                            </label>
                            <div class="col-sm-9">
                                <div class="">
                                    <input type="file" class="" id="customFile" name="ijazah_sd">
                                    <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                                Ijazah SMP
                            </label>
                            <div class="col-sm-9">
                                <div class="">
                                    <input type="file" class="" id="customFile" name="ijazah_smp">
                                    <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                                Ijazah SMA/K
                            </label>
                            <div class="col-sm-9">
                                <div class="">
                                    <input type="file" class="" id="customFile" name="ijazah_smak">
                                    <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                                Kartu Tanda Penduduk
                            </label>
                            <div class="col-sm-9">
                                <div class="">
                                    <input type="file" class="" id="customFile" name="ktp">
                                    <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                                Kartu Keluarga
                            </label>
                            <div class="col-sm-9">
                                <div class="">
                                    <input type="file" class="" id="customFile" name="kk">
                                    <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                                Sertifikat
                            </label>
                            <div class="col-sm-9">
                                <div class="email-repeater form-group">
                                    <div data-repeater-list="sertifikat">
                                        <div data-repeater-item class="row m-b-15">
                                            <div class="col-md-5">
                                                <input required type="text" class="form-control" id="" placeholder="Nama Sertifikat" name="nama_sertifikat">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="">
                                                    <input required type="file" class="" id="customFile" name="sertifikat">
                                                    <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light" type="button"><i class="ti-close"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" data-repeater-create="" class="btn btn-info waves-effect waves-light">Tambah Sertifikat Lain
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                                Surat Keterangan
                            </label>
                            <div class="col-sm-9">
                                <div class="email-repeater form-group">
                                    <div data-repeater-list="surat_keterangan">
                                        <div data-repeater-item class="row m-b-15">
                                            <div class="col-md-5">
                                                <input required type="text" class="form-control" id="" placeholder="Nama Surat Keterangan" name="nama_surat_keterangan">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="">
                                                    <input required type="file" class="" id="customFile" name="surat_keterangan">
                                                    <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light" type="button"><i class="ti-close"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" data-repeater-create="" class="btn btn-info waves-effect waves-light">Tambah Surat Keterangan Lain
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <a href="<?= base_url('dokumen-pegawai') ?>" class="btn btn-dark waves-effect waves-light">Batal</a>
                            <button class="btn btn-success waves-effect waves-light" type="submit">Simpan</button>
                        </div>
                        <?= form_close() ?>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>