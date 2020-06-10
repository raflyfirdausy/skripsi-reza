<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peralatan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Detail_peralatan_model", "alat");
    }

    public function index()
    {
        $data["alat"]  = $this->alat->show();
        // d($data);
        $this->loadViewAdmin("alat/index", $data);
    }

    public function tambah()
    {
        $this->loadViewAdmin("alat/tambah");
    }

    public function proses_tambah()
    {
        $input      = (object) $this->input->post();
        $cekBarang  = $this->barang->where(["kode_barang" => $input->kode_barang])->get();

        if (!$cekBarang) {
            //* TODO : INSERT INTO TABLE BARANG
            $dataInsertBarang = [
                "id_jenis"          => "2",
                "nama_barang"       => $input->nama_barang,
                "kode_barang"       => $input->kode_barang,
                "register_barang"   => $input->register_barang,
                "keterangan_barang" => $input->keterangan_barang,
            ];
            $insertBarang = $this->barang->insert($dataInsertBarang);
            if ($insertBarang) {
                $dataInsert = [
                    "id_barang"         => $insertBarang,
                    "merk_peralatan"    => $input->merk_peralatan,
                    "ukuran_peralatan"  => $input->ukuran_peralatan,
                    "bahan_peralatan"   => $input->bahan_peralatan,
                    "tahun_peralatan"   => $input->tahun_peralatan,
                    "nopabrik_peralatan" => $input->nopabrik_peralatan,
                    "norangka_peralatan" => $input->norangka_peralatan,
                    "nomesin_peralatan" => $input->nomesin_peralatan,
                    "nopolisi_peralatan" => $input->nopolisi_peralatan,
                    "nobpkb_peralatan"  => $input->nobpkb_peralatan,
                    "asal_peralatan"    => $input->asal_peralatan,
                    "harga_peralatan"   => $input->harga_peralatan,
                ];
                $insert = $this->alat->insert($dataInsert);
                if ($insert) {
                    $this->session->set_flashdata("sukses", "Berhasil menambahkan data " . $input->nama_barang);
                } else {
                    $this->session->set_flashdata("gagal", "Terjadi kesalahan saat menambahkan data tanah");
                }
            } else {
                $this->session->set_flashdata("gagal", "Terjadi kesalahan saat menambahkan data aset");
            }
        } else {
            $this->session->set_flashdata("gagal", "Kode barang sudah terdaftar pada " . $cekBarang->nama_barang . ". Silahkan gunakan kode barang yang lain");
        }
        redirect(base_url("peralatan/tambah"));
    }

    public function detail($kode = null)
    {
        $cekBarang  = $this->barang->where(["kode_barang" => $kode])->get();
        if (!$cekBarang) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan!');
            redirect(base_url("tanah"));
        }
        $data["alat"]  = $this->alat->show($cekBarang->id_barang);
        // d($data);
        $this->loadViewAdmin("alat/detail", $data);
    }

    public function edit($kode = null)
    {
        $cekBarang  = $this->barang->where(["kode_barang" => $kode])->get();
        if (!$cekBarang) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan!');
            redirect(base_url("peralatan"));
        }
        $data["alat"]  = $this->alat->show($cekBarang->id_barang);
        $this->loadViewAdmin("alat/edit", $data);
    }

    public function proses_edit()
    {
        //TODO : UPDATE BARANG
        $input      = (object) $this->input->post();
        $dataUpdateBarang = [
            "nama_barang"       => $input->nama_barang,
            "kode_barang"       => $input->kode_barang,
            "register_barang"   => $input->register_barang,
            "keterangan_barang" => $input->keterangan_barang
        ];

        $updateBarang = $this->barang->update($dataUpdateBarang, $input->id_barang);
        if ($updateBarang) {
            $dataUpdateDetail = [
                "merk_peralatan"    => $input->merk_peralatan,
                "ukuran_peralatan"  => $input->ukuran_peralatan,
                "bahan_peralatan"   => $input->bahan_peralatan,
                "tahun_peralatan"   => $input->tahun_peralatan,
                "nopabrik_peralatan" => $input->nopabrik_peralatan,
                "norangka_peralatan" => $input->norangka_peralatan,
                "nomesin_peralatan" => $input->nomesin_peralatan,
                "nopolisi_peralatan" => $input->nopolisi_peralatan,
                "nobpkb_peralatan"  => $input->nobpkb_peralatan,
                "asal_peralatan"    => $input->asal_peralatan,
                "harga_peralatan"   => $input->harga_peralatan,
            ];
            $updateDetail = $this->alat->update($dataUpdateDetail, $input->id_detail);
            if ($updateDetail) {
                $this->session->set_flashdata('sukses', 'Data berhasil diperbaharui!');
                redirect('peralatan');
            } else {
                $this->session->set_flashdata('gagal', 'Data gagal diperbarui');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal diperbarui, Kode barang tidak boleh sama dengan yang lain!');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function hapus($kode)
    {
        $cekBarang  = $this->barang->where(["kode_barang" => $kode])->get();
        if (!$cekBarang) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan!');
            redirect(base_url("tanah"));
        }

        $delete = $this->barang->delete($cekBarang->id_barang);
        if ($delete) {
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus!');
        }
        redirect('peralatan');
    }
}
