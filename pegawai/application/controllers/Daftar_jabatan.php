<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_jabatan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $level_user = $this->global_data['user_data']->level_user;

        if ($level_user == 3) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $jenis = $this->input->get('jenis');
        $dataPegawai    = $this->m_data->getWhere("level_user", "3");
        if (!empty($jenis) && $jenis != "semua") {
            $dataPegawai    = $this->m_data->getWhere("jabatan_user", $jenis);
        }

        $dataPegawai    = $this->m_data->getJoin("jabatan", "user.id_jabatan = jabatan.id_jabatan", "LEFT");
        $dataPegawai    = $this->m_data->order_by("id_user", "DESC");
        $dataPegawai    = $this->m_data->getData("user")->result();

        $jabatan        = $this->m_data->order_by("nama_jabatan", "ASC");
        $jabatan        = $this->m_data->getData("jabatan")->result();

        $data["jabatan"]        = $jabatan;
        $data["dataPegawai"]    = $dataPegawai;
        $this->loadViewAdmin("dashboard/daftar_jabatan", $data);
    }

    public function tambah_jabatan(){
        $data = [
            "nama_jabatan"       => $this->input->post('nama_jabatan'),            
        ];
        $insert = $this->m_data->insert("jabatan", $data);
        if ($insert > 0) {
            $this->session->set_flashdata("sukses", "Berhasil menambah data Jabatan <b>". $data["nama_jabatan"] ."</b> pada database");
        } else {
            $this->session->set_flashdata("gagal", "Gagal menambah data jabatan pada database : " . $this->m_data->getError());
        }
        redirect(base_url('daftar-jabatan'));
    }

    public function ubah_jabatan(){
        $data = [
            "nama_jabatan"       => $this->input->post('nama_jabatan'),            
        ];
        $update     = $this->m_data->update("jabatan", $data, ["id_jabatan" => $this->input->post('id_jabatan')]);
        if ($update > 0) {
            $this->session->set_flashdata("sukses", "Berhasil mengubah data Jabatan pada database");
        } else {
            $this->session->set_flashdata("gagal", "Gagal mengubah data pegawai pada database");
        }
        redirect(base_url('daftar-jabatan'));        
    }

    public function hapus_jabatan(){
        $delete     = $this->m_data->delete(["id_jabatan" => $this->input->post('id_jabatan')], "jabatan");
        if ($delete > 0) {
            $this->session->set_flashdata("sukses", "Berhasil menghapus data jabatan pada database");
        } else {
            $this->session->set_flashdata("gagal", "Tidak bisa menghapus data jabatan");
        }
        redirect(base_url('daftar-jabatan'));
    }
}
