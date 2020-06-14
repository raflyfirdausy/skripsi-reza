<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ganti_password extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model", "admin");
    }

    public function index()
    {
        $this->loadViewAdmin("dashboard/ganti_password");
    }

    public function ubah_password()
    {
        $password_sekarang      = $this->input->post('password_sekarang');
        $password_baru          = $this->input->post('password_baru');
        $konfirmasi_password    = $this->input->post('konfirmasi_password');        

        $cekCredential  = $this->admin->where([
            "id_admin"          => $this->session->userdata("login_pegawai")->id_admin,
            "password_admin"    => md5($password_sekarang)
        ])->get();        

        $sukses = FALSE;

        if ($cekCredential) {
            if ($password_baru == $konfirmasi_password) {
                $update = $this->admin->update(
                    ["password_admin" => md5($password_baru)],
                    $this->session->userdata("login_pegawai")->id_admin
                );
                if ($update) {
                    $sukses = TRUE;
                    $this->session->set_flashdata("sukses", "Berhasil mengubah password pada database. Silahkan Masuk dengan password yang baru");
                } else {
                    $this->session->set_flashdata("gagal", "Gagal mengubah password pada database");
                }
            } else {
                $this->session->set_flashdata("gagal", "Konfirmasi password salah");
            }
        } else {
            $this->session->set_flashdata("gagal", "Password lama yang kamu masukan salah");
        }

        if ($sukses) {
            $this->session->unset_userdata('login_pegawai');
            redirect(base_url("auth/login"));
        } else {
            redirect(base_url("ganti-password"));
        }
    }
}
