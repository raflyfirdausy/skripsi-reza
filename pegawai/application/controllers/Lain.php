<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lain extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Detail_lainnya_model", "lain");
    }

    public function index()
    {
        $data["lain"]  = $this->lain->show();
        // d($data);
        $this->loadViewAdmin("lain/index", $data);
    }

    public function tambah()
    {
        $this->loadViewAdmin("lain/tambah");
    }

    public function proses_tambah()
    {
        $input      = (object) $this->input->post();
        $cekBarang  = $this->barang->where(["kode_barang" => $input->kode_barang])->get();

        if (!$cekBarang) {
            //* TODO : INSERT INTO TABLE BARANG
            $dataInsertBarang = [
                "id_jenis"          => "5",
                "nama_barang"       => $input->nama_barang,
                "kode_barang"       => $input->kode_barang,
                "register_barang"   => $input->register_barang,
                "keterangan_barang" => $input->keterangan_barang,
            ];
            $insertBarang = $this->barang->insert($dataInsertBarang);
            if ($insertBarang) {
                $dataInsert = [
                    "id_barang"             => $insertBarang,
                    "judul_lainnya"         => $input->judul_lainnya,
                    "spesifikasi_lainnya"   => $input->spesifikasi_lainnya,
                    "asaldaerah_lainnya"    => $input->asaldaerah_lainnya,
                    "pencipta_lainnya"      => $input->pencipta_lainnya,
                    "bahan_lainnya"         => $input->bahan_lainnya,
                    "tanggal_lainnya"       => $input->tanggal_lainnya,
                    "nomor_lainnya"         => $input->nomor_lainnya,
                    "jumlah_lainnya"        => $input->jumlah_lainnya,
                    "tahun_lainnya"         => $input->tahun_lainnya,
                    "asal_lainnya"          => $input->asal_lainnya,
                    "harga_lainnya"         => $input->harga_lainnya,
                ];
                $insert = $this->lain->insert($dataInsert);
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
        redirect(base_url("lain/tambah"));
    }

    public function detail($kode = null)
    {
        $cekBarang  = $this->barang->where(["kode_barang" => $kode])->get();
        if (!$cekBarang) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan!');
            redirect(base_url("lain"));
        }
        $data["lain"]  = $this->lain->show($cekBarang->id_barang);
        // d($data);
        $this->loadViewAdmin("lain/detail", $data);
    }

    public function edit($kode = null)
    {
        $cekBarang  = $this->barang->where(["kode_barang" => $kode])->get();
        if (!$cekBarang) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan!');
            redirect(base_url("lain"));
        }
        $data["lain"]  = $this->lain->show($cekBarang->id_barang);
        $this->loadViewAdmin("lain/edit", $data);
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
                "judul_lainnya"         => $input->judul_lainnya,
                "spesifikasi_lainnya"   => $input->spesifikasi_lainnya,
                "asaldaerah_lainnya"    => $input->asaldaerah_lainnya,
                "pencipta_lainnya"      => $input->pencipta_lainnya,
                "bahan_lainnya"         => $input->bahan_lainnya,
                "tanggal_lainnya"       => $input->tanggal_lainnya,
                "nomor_lainnya"         => $input->nomor_lainnya,
                "jumlah_lainnya"        => $input->jumlah_lainnya,
                "tahun_lainnya"         => $input->tahun_lainnya,
                "asal_lainnya"          => $input->asal_lainnya,
                "harga_lainnya"         => $input->harga_lainnya,
            ];
            $updateDetail = $this->lain->update($dataUpdateDetail, $input->id_detail);
            if ($updateDetail) {
                $this->session->set_flashdata('sukses', 'Data berhasil diperbaharui!');
                redirect('lain');
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
            redirect(base_url("lain"));
        }

        $delete = $this->barang->delete($cekBarang->id_barang);
        if ($delete) {
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus!');
        }
        redirect('lain');
    }
}
