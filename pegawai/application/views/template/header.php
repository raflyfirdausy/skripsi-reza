<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Informasi Desa,SID">
    <meta name="author" content="ultranesia.com">

    <!-- <link href="<?= asset('website/img/logo_sisdes_light.svg'); ?>" rel="icon" type="image/png" sizes="16x16"> -->
    <link href="<?= asset('website/nice/assets/libs/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= asset('website/nice/assets/libs/chartist/dist/chartist.min.css'); ?>" rel="stylesheet">
    <link href="<?= asset('website/nice/assets/extra-libs/c3/c3.min.css'); ?>" rel="stylesheet">
    <link href="<?= asset('website/nice/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css'); ?>" rel="stylesheet" />
    <link href="<?= asset('website/nice/dist/css/style.min.css'); ?>" rel="stylesheet">
    <link href="<?= asset('website/nice/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
    <link href="<?= asset('website/nice/assets/libs/daterangepicker/daterangepicker.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= asset('website/nice/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= asset('website/nice/assets/libs/sweetalert2/dist/sweetalert2.min.css'); ?>" rel="stylesheet">

    <link href="<?= asset('website/css/style-img.less'); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?= asset('website/font-awesome/css/font-awesome.min.css'); ?>">
    <title><?= isset($title) ? $title . " | " : "" ?><?= $app_complete_name ?></title>
</head>

<body>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">
        <!-- Topbar header - style you can find in pages.scss -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <div class="navbar-brand">
                        <a href="index.html" class="logo">
                            <span class="logo-text">
                                <h3 class="text-white m-l-5">Sistem Pegawai</h3>
                            </span>
                        </a>
                        <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                            <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left mr-auto">
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?= asset('website/img/default.png') ?>" alt="user" class="rounded-circle" width="40">
                                <span class="m-l-5 font-medium d-none d-sm-inline-block"><?= $user_data->gelardepan_user . " " . $user_data->nama_user . " " . $user_data->gelarbelakang_user ?> <i class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">'
                                        <img src="<?= asset('website/img/default.png') ?>" alt="user" class="rounded-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="mb-0"><?= $user_data->gelardepan_user . " " . $user_data->nama_user . " " . $user_data->gelarbelakang_user ?></h4>
                                        <p class=" mb-0"><?= $user_data->nama_jabatan ?></p>
                                    </div>
                                </div>

                                <a class="dropdown-item" href="<?= base_url("auth/logout") ?>">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Keluar</a>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>