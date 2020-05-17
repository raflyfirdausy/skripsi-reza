<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('jabatan')) {
    function jabatan(){
        $jabatan = array(
            "Dokter",
            "Perawat",
            "Bidan",
            "Radiografer",
            "Laboran",
            "Farmasi",
            "Gizi",
            "Laundry",
            "Pemulasaran Jenazah",
            "Administrasi",
            "IT",
            "Aset",
            "Keamanan",
            "Tenaga Kebersihan",
            "Kesehatan"
        );
        sort($jabatan);
        return $jabatan;
    }
}
