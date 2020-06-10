<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jalan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Detail_jalan_model", "jalan");
    }

    public function index()
    {
        $data["jalan"]  = $this->jalan->show();
        // d($data);
        $this->loadViewAdmin("jalan/index", $data);
    }

    public function tambah()
    {
        $this->loadViewAdmin("jalan/tambah");
    }

    public function proses_tambah()
    {
        $input      = (object) $this->input->post();
        $cekBarang  = $this->barang->where(["kode_barang" => $input->kode_barang])->get();
        if (!$cekBarang) {
            //* TODO : INSERT INTO TABLE BARANG
            $dataInsertBarang = [
                "id_jenis"          => "4",
                "nama_barang"       => $input->nama_barang,
                "kode_barang"       => $input->kode_barang,
                "register_barang"   => $input->register_barang,
                "keterangan_barang" => $input->keterangan_barang,
            ];
            $insertBarang = $this->barang->insert($dataInsertBarang);
            if ($insertBarang) {
                $dataInsert = [
                    "id_barang"             => $insertBarang,
                    "konstruksi_jalan"      => $input->konstruksi_jalan,
                    "panjang_jalan"         => $input->panjang_jalan,
                    "lebar_jalan"           => $input->lebar_jalan,
                    "letak_jalan"           => $input->letak_jalan,
                    "dokumentanggal_jalan"  => $input->dokumentanggal_jalan,
                    "dokumenno_jalan"       => $input->dokumenno_jalan,
                    "statustanah_jalan"     => $input->statustanah_jalan,
                    "nokodetanah_jalan"     => $input->nokodetanah_jalan,
                    "asal_jalan"            => $input->asal_jalan,
                    "harga_jalan"           => $input->harga_jalan,
                    "kondisi_jalan"         => $input->kondisi_jalan,
                ];
                $insert = $this->jalan->insert($dataInsert);
                if ($insert) {
                    $this->session->set_flashdata("sukses", "Berhasil menambahkan data " . $input->nama_barang);
                } else {
                    $this->session->set_flashdata("gagal", "Terjadi kesalahan saat menambahkan data aset :(");
                }
            } else {
                $this->session->set_flashdata("gagal", "Terjadi kesalahan saat menambahkan insert barang ");
            }
        } else {
            $this->session->set_flashdata("gagal", "Kode barang sudah terdaftar pada " . $cekBarang->nama_barang . ". Silahkan gunakan kode barang yang lain");
        }
        redirect(base_url("jalan/tambah"));
    }

    public function detail($kode = null)
    {
        $cekBarang  = $this->barang->where(["kode_barang" => $kode])->get();
        if (!$cekBarang) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan!');
            redirect(base_url("jalan"));
        }
        $data["jalan"]  = $this->jalan->show($cekBarang->id_barang);
        // d($data);
        $this->loadViewAdmin("jalan/detail", $data);
    }

    public function edit($kode = null)
    {
        $cekBarang  = $this->barang->where(["kode_barang" => $kode])->get();
        if (!$cekBarang) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan!');
            redirect(base_url("jalan"));
        }
        $data["jalan"]  = $this->jalan->show($cekBarang->id_barang);
        $this->loadViewAdmin("jalan/edit", $data);
    }

    public function proses_edit()
    {
        //TODO : UPDATE BARANG
        $input      = (object) $this->input->post();
        $dataUpdateBarang = [
            "nama_barang"       => $input->nama_barang,
            // "kode_barang"       => $input->kode_barang,
            "register_barang"   => $input->register_barang,
            "keterangan_barang" => $input->keterangan_barang
        ];

        $updateBarang = $this->barang->update($dataUpdateBarang, $input->id_barang);
        if ($updateBarang) {
            $dataUpdateDetail = [
                "konstruksi_jalan"      => $input->konstruksi_jalan,
                "panjang_jalan"         => $input->panjang_jalan,
                "lebar_jalan"           => $input->lebar_jalan,
                "letak_jalan"           => $input->letak_jalan,
                "dokumentanggal_jalan"  => $input->dokumentanggal_jalan,
                "dokumenno_jalan"       => $input->dokumenno_jalan,
                "statustanah_jalan"     => $input->statustanah_jalan,
                "nokodetanah_jalan"     => $input->nokodetanah_jalan,
                "asal_jalan"            => $input->asal_jalan,
                "harga_jalan"           => $input->harga_jalan,
                "kondisi_jalan"         => $input->kondisi_jalan,
            ];
            $updateDetail = $this->jalan->update($dataUpdateDetail, $input->id_detail);
            if ($updateDetail) {
                $this->session->set_flashdata('sukses', 'Data berhasil diperbaharui!');
                redirect('jalan');
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
            redirect(base_url("jalan"));
        }

        $delete = $this->barang->delete($cekBarang->id_barang);
        if ($delete) {
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus!');
        }
        redirect('jalan');
    }
}
