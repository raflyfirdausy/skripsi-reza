<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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

    public function register()
    {
        if ($this->session->has_userdata('login_pegawai')) {
            redirect(base_url("dashboard"));
        }

        $jabatan = $this->m_data->getData("jabatan")->result();

        $data["jabatan"]    = $jabatan;
        $this->load->view('auth/register', $data);
    }

    public function proses_register()
    {

        if ($this->input->post('password') != $this->input->post('konfirmasi_pass')) {
            $this->session->set_flashdata("gagal", "Konfirmasi Password salah! Silahkan ulangi Pendaftaran");
            redirect("auth/register");
        }
        

        $dataInsert = [
            "id_jabatan"            => $this->input->post('jabatan'),
            "gelardepan_user"       => $this->input->post('gelar_depan'),
            "nama_user"             => $this->input->post('nama_lengkap'),
            "gelarbelakang_user"    => $this->input->post('gelar_belakang'),
            "tanggallahir_user"     => $this->input->post('tanggal_lahir'),
            "username_user"         => $this->input->post('username'),
            "password_user"         => md5($this->input->post('password')),
            "pendidikan_user"       => $this->input->post('pendidikan_pegawai'),
            "agama_user"            => $this->input->post('agama_pegawai'),
            "no_hp"                 => $this->input->post('no_hp'),
            "jalan"                 => $this->input->post('jalan'),
            "rt"                    => $this->input->post('rt'),
            "rw"                    => $this->input->post('rw'),
            "desa"                  => $this->input->post('desa'),
            "kecamatan"             => $this->input->post('kecamatan'),
            "kabupaten"             => $this->input->post('kabupaten'),
            "provinsi"              => $this->input->post('provinsi'),
            "level_user"            => 3
        ];

        $insert = $this->m_data->insert("user", $dataInsert);
        if($insert > 0){
            $this->session->set_flashdata("sukses", "Berhasil Melakukan pendaftaran akun dengan username : <b>" . $this->input->post('username') . "</b>");
            redirect("auth/login");
        } else {
            $this->session->set_flashdata("gagal", $this->m_data->getError());
            redirect("auth/register");
        }
    }

    public function username($username)
    {
        echo $this->getUsername($username);
    }

    public function getUsername($username, $percobaan = 1)
    {
        $cekUsername    = $this->m_data->getWhere("username_user", $username);
        $cekUsername    = $this->m_data->getData("user")->row();
        if ($cekUsername) {
            $username = preg_replace('/[^a-zA-Z]/i', '', $username);
            return $this->getUsername($username . $percobaan, ++$percobaan);
        } else {
            echo json_encode(["result" => $username]);
        }
    }

    public function prosesLogin()
    {

        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $cekLogin   = $this->m_data->getWhere("username_user", $username);
        $cekLogin   = $this->m_data->getWhere("password_user", $password);
        $cekLogin   = $this->m_data->getData("user")->row();

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
