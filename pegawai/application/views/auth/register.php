<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register | Sistem Informasi Pegawai</title>
    <link href="<?= asset('website/nice/dist/css/style.min.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background-image:url(<?= asset('website/img/bg-login.jpg') ?>); background-size: cover;">
            <div class="auth-box" style="max-width: 700px;">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="<?= asset('website/nice/assets/images/logo-icon.png') ?>" alt="logo" /></span>
                        <h4 class="font-medium m-t-10">Daftar Sistem Administrasi Pegawai RSUD Bumiayu</h4>
                    </div>

                    <?php if ($this->session->flashdata("gagal")) : ?>
                        <div class="alert alert-danger"> <?= $this->session->flashdata("gagal") ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata("sukses")) : ?>
                        <div class="alert alert-success"> <?= $this->session->flashdata("sukses") ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        </div>
                    <?php endif; ?>

                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" id="loginform" method="POST" action="<?= base_url("auth/register") ?>">
                                <div class="form-body">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Gelar Depan</label>
                                                <input type="text" name="gelar_depan" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Gelar Belakang</label>
                                                <input type="text" name="gelar_belakang" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input required type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Jabatan</label>
                                                <select required class="form-control custom-select" name="jabatan" style="width: 100%; height:36px;">
                                                    <option value="">Pilih Jabatan</option>
                                                    <?php foreach ($jabatan as $data) : ?>
                                                        <option value="<?= $data->id_jabatan ?>"><?= $data->nama_jabatan ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Pendidikan Terakhir</label>
                                                <select class="select2 form-control custom-select" style="width: 100%;" name="pendidikan_pegawai" id="jenis_surat_tambah" required>
                                                    <option value="">Pilih Pendidikan Terakhir</option>
                                                    <?php foreach (pendidikan_terakhir() as $p) : ?>
                                                        <option value="<?= $p ?>"><?= $p ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Agama</label>
                                                <select class="select2 form-control custom-select" style="width: 100%;" name="agama_pegawai" id="jenis_surat_tambah" required>
                                                    <option value="">Pilih Agama</option>
                                                    <?php foreach (daftar_agama() as $a) : ?>
                                                        <option value="<?= $a ?>"><?= $a ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>No Handphone</label>
                                                <input maxlength="13" onkeyup="numOnly(this)" onblur="numOnly(this)" required type="tel" id="no_hp" name="no_hp" class="form-control" placeholder="No Hp Anda">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Username Anda</label>
                                                <input required type="text" readonly id="username" name="username" class="form-control" placeholder="Username Anda">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jalan</label>
                                                <input type="text" name="jalan" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>RT</label>
                                                <input onkeyup="numOnly(this)" onblur="numOnly(this)" type="text" id="rt" name="rt" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>RW</label>
                                                <input onkeyup="numOnly(this)" onblur="numOnly(this)" type="text" name="rw" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Desa</label>
                                                <input type="text" name="desa" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <input type="text" name="kecamatan" class="form-control" required>
                                            </div>
                                        </div>                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kabupaten</label>
                                                <input type="text" name="kabupaten" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Provinsi</label>
                                                <input type="text" name="provinsi" class="form-control" required>
                                            </div>
                                        </div>                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input required type="password" minlength="6" name="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Konfirmasi Password</label>
                                                <input required type="password" minlength="6" name="konfirmasi_pass" class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-10">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">Daftar</button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 m-t-0">
                                    <div class="col-sm-12 text-center">
                                        Sudah punya akun ? <a href="<?= base_url("auth/login") ?>" class="text-info m-l-5"><b>Masuk Disini</b></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= asset('website/nice/assets/libs/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= asset('website/nice/assets/libs/popper.js/dist/umd/popper.min.js') ?>"></script>
    <script src="<?= asset('website/nice/assets/libs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
        $('#to-recover').on("click", function() {
            alert("Silahkan hubungi admin untuk melakukan reset password anda");
        });

        $("#lupa").on("click", function() {
            Swal.fire(
                'Info',
                'Silahkan Hubungi admin untuk reset password',
                'info'
            );
        })

        var typingTimer; //timer identifier
        var doneTypingInterval = 1000; //time in ms, 5 second for example        

        $("#nama_lengkap").on("keyup", function() {
            let nama = $(this).val();
            nama = nama.split(' ').slice(0, 2).join('');
            nama = nama.replace(/\s/g, '');
            nama = nama.toLowerCase();

            $.ajax({
                url: "<?= base_url('auth/getUsername/') ?>" + nama,
                type: "GET",
                dataType: "JSON",
                success: function(e) {
                    $("#username").val(e.result);
                }
            })
        });

        function numOnly(selector) {
            selector.value = selector.value.replace(/[^0-9]/g, '');
        }
    </script>
</body>

</html>