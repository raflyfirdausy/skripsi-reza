<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Barang_model", "barang");
        $this->load->model("Peminjaman_model", "peminjaman");
        $this->load->model("Detail_peminjaman_model", "detail");
    }

    public function index()
    {
        $this->loadViewAdmin("pengembalian/index");
    }

    public function cek()
    {
        $kode = $this->input->post("kode_peminjaman");
        $cekPeminjaman  = $this->peminjaman->where(["kode_peminjaman" => $kode])->get();
        if (!$cekPeminjaman) {
            $this->session->set_flashdata('gagal', 'Kode peminjaman ' . $kode . " tidak ditemukan!");
            redirect(base_url("pengembalian"));
        } else {
            if ($cekPeminjaman->status_peminjaman == 2) {
                $this->session->set_flashdata('gagal', 'Kode peminjaman ' . $kode . " sudah di kembalikan pada tanggal " . $cekPeminjaman->updated_at);
                redirect(base_url("pengembalian"));
            } else {
                redirect(base_url("pengembalian/detail/" . $kode));
            }
        }
    }

    public function detail($kode)
    {
        $cekPeminjaman  = $this->peminjaman->where(["kode_peminjaman" => $kode])->get();
        if (!$cekPeminjaman) {
            $this->session->set_flashdata('gagal', 'Kode peminjaman ' . $kode . " tidak ditemukan!");
            redirect(base_url("pengembalian"));
        } 
        $peminjaman = $this->peminjaman
            ->with_detail(["with"  => ["relation"  => "barang"]])
            ->order_by("created_at", "DESC")
            ->where(["kode_peminjaman" => $kode])
            ->get();

        $data["detail"] = $peminjaman;
        $this->loadViewAdmin("pengembalian/detail", $data);
    }
}
