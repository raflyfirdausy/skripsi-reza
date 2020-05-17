<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ganti_password extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $id_user                = $this->global_data['user_data']->id_user;

        $cekCredential  = $this->m_data->getWhere("id_user", $id_user);
        $cekCredential  = $this->m_data->getWhere("password_user", md5($password_sekarang));
        $cekCredential  = $this->m_data->getData("user")->row();

        $sukses = FALSE;

        if ($cekCredential) {
            if($password_baru == $konfirmasi_password){
                $update = $this->m_data->update(
                    "user",
                    ["password_user" => md5($password_baru)],
                    ["id_user" => $id_user]
                );
                if($update > 0){
                    $sukses = TRUE;
                    $this->session->set_flashdata("sukses", "Berhasil mengubah password pegawai pada database. Silahkan Masuk dengan password yang baru");
                } else {
                    $this->session->set_flashdata("gagal", "Gagal mengubah password pegawai pada database");
                }
            } else {
                $this->session->set_flashdata("gagal", "Konfirmasi password salah");
            }        
        } else {
            $this->session->set_flashdata("gagal", "Password lama yang kamu masukan salah");
        }

        if($sukses){
            $this->session->unset_userdata('login_pegawai');
            redirect(base_url("auth/login"));
        } else {
            redirect(base_url("ganti-password"));
        }
    }
}
