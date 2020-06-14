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
        $data["pengembalian"] = $this->peminjaman
            ->where(["status_peminjaman" => 2])
            ->as_array()
            ->with_detail()
            ->order_by("created_at", "DESC")
            ->get_all();
        $this->loadViewAdmin("pengembalian/index", $data);
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

    public function data_pengembalian($kode){
        $cekPeminjaman  = $this->peminjaman->where(["kode_peminjaman" => $kode, "status_peminjaman" => 2])->get();
        if (!$cekPeminjaman) {
            $this->session->set_flashdata('gagal', 'Barang pengembalian dengan kode ' . $kode . " tidak ditemukan!");
            redirect(base_url("pengembalian"));
        }
        
        $peminjaman = $this->peminjaman
            ->with_detail(["with"  => ["relation"  => "barang"]])
            ->order_by("created_at", "DESC")
            ->where(["kode_peminjaman" => $kode])
            ->as_array()
            ->get();

        for ($a = 0; $a < sizeof($peminjaman["detail"]); $a++) {
            if (!isset($peminjaman["detail"][$a]->barang)) {
                $barang = $this->barang
                    ->as_array()
                    ->where(["id_barang" => $peminjaman["detail"][$a]->id_barang])
                    ->with_trashed()
                    ->get();
                $peminjaman["detail"][$a]->barang = $barang;
            }
        }


        $data["detail"] = (object) $peminjaman;
        $this->loadViewAdmin("pengembalian/data_pengembalian", $data);
        
    }

    public function detail($kode)
    {
        $cekPeminjaman  = $this->peminjaman->where(["kode_peminjaman" => $kode, "status_peminjaman" => 1])->get();
        if (!$cekPeminjaman) {
            $this->session->set_flashdata('gagal', 'Barang peminjaman dengan kode ' . $kode . " sudah dikembalikan!");
            redirect(base_url("pengembalian"));
        }

        $peminjaman = $this->peminjaman
            ->with_detail(["with"  => ["relation"  => "barang"]])
            ->order_by("created_at", "DESC")
            ->where(["kode_peminjaman" => $kode])
            ->as_array()
            ->get();

        for ($a = 0; $a < sizeof($peminjaman["detail"]); $a++) {
            if (!isset($peminjaman["detail"][$a]->barang)) {
                $barang = $this->barang
                    ->as_array()
                    ->where(["id_barang" => $peminjaman["detail"][$a]->id_barang])
                    ->with_trashed()
                    ->get();
                $peminjaman["detail"][$a]->barang = $barang;
            }
        }


        $data["detail"] = (object) $peminjaman;
        $this->loadViewAdmin("pengembalian/detail", $data);
    }

    public function proses_kembali($kode = null)
    {
        $cekPeminjaman  = $this->peminjaman->where(["kode_peminjaman" => $kode])->get();
        if (!$cekPeminjaman) {
            $this->session->set_flashdata('gagal', 'Kode peminjaman ' . $kode . " tidak ditemukan!");
            redirect(base_url("pengembalian"));
        }

        $dataUpdate = [
            "status_peminjaman"     => 2,
            "keterangan_peminjaman" => $this->input->post("keterangan_peminjaman")
        ];


        $update = $this->peminjaman->update($dataUpdate, $cekPeminjaman->id_peminjaman);
        if ($update) {
            $this->session->set_flashdata('sukses', 'Berhasil mengembalikan barang dengan kode peminjaman ' . $kode);
            redirect("pengembalian");
        } else {
            $this->session->set_flashdata('gagal', 'Terjadi kesalahan saat mengembalikan barang dengan kode peminjaman ' . $kode);
            redirect("pengembalian/detail/$kode");
        }
    }
}
