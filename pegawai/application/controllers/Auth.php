<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model", "admin");
    }

    public function index()
    {
        redirect(base_url("auth/login"));
    }

    public function login()
    {
        if ($this->session->has_userdata('login_pegawai')) {
            redirect(base_url("dashboard"));
        }
        $this->load->view('auth/login');
    }

    public function prosesLogin()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $cekLogin = $this->admin->where([
            "username_admin"    => $username,
            "password_admin"    => $password
        ])->get();

        if ($cekLogin) {
            $this->session->set_userdata("login_pegawai", $cekLogin);            
            redirect(base_url("dashboard"));
        } else {
            $this->session->set_flashdata("gagal", "Maaf kombinasi username dan password salah!");
            redirect(base_url("auth/login"));            
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
