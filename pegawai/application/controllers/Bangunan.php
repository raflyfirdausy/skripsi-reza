<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bangunan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Detail_bangunan_model", "bangunan");
    }

    public function index()
    {
        $data["bangunan"]  = $this->bangunan->show();
        // d($data);
        $this->loadViewAdmin("bangunan/index", $data);
    }

    public function tambah()
    {
        $this->loadViewAdmin("bangunan/tambah");
    }

    public function proses_tambah()
    {
        $input      = (object) $this->input->post();
        $cekBarang  = $this->barang->where(["kode_barang" => $input->kode_barang])->get();

        if (!$cekBarang) {
            //* TODO : INSERT INTO TABLE BARANG
            $dataInsertBarang = [
                "id_jenis"          => "3",
                "nama_barang"       => $input->nama_barang,
                "kode_barang"       => $input->kode_barang,
                "register_barang"   => $input->register_barang,
                "keterangan_barang" => $input->keterangan_barang,
            ];
            $insertBarang = $this->barang->insert($dataInsertBarang);
            if ($insertBarang) {
                $dataInsert = [
                    "id_barang"                 => $insertBarang,
                    "kondisi_bangunan"          => $input->kondisi_bangunan,
                    "bertingkat_bangunan"       => $input->bertingkat_bangunan,
                    "beton_bangunan"            => $input->beton_bangunan,
                    "luaslantai_bangunan"       => $input->luaslantai_bangunan,
                    "letak_bangunan"            => $input->letak_bangunan,
                    "dokumentanggal_bangunan"   => $input->dokumentanggal_bangunan,
                    "dokumenno_bangunan"        => $input->dokumenno_bangunan,
                    "luastanah_bangunan"        => $input->luastanah_bangunan,
                    "statustanah_bangunan"      => $input->statustanah_bangunan,
                    "nomor_bangunan"            => $input->nomor_bangunan,
                    "asal_bangunan"             => $input->asal_bangunan,
                    "harga_bangunan"            => $input->harga_bangunan,
                ];
                $insert = $this->bangunan->insert($dataInsert);
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
        redirect(base_url("bangunan/tambah"));
    }

    public function detail($kode = null)
    {
        $cekBarang  = $this->barang->where(["kode_barang" => $kode])->get();
        if (!$cekBarang) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan!');
            redirect(base_url("bangunan"));
        }
        $data["bangunan"]  = $this->bangunan->show($cekBarang->id_barang);
        // d($data);
        $this->loadViewAdmin("bangunan/detail", $data);
    }

    public function edit($kode = null)
    {
        $cekBarang  = $this->barang->where(["kode_barang" => $kode])->get();
        if (!$cekBarang) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan!');
            redirect(base_url("bangunan"));
        }
        $data["bangunan"]  = $this->bangunan->show($cekBarang->id_barang);
        $this->loadViewAdmin("bangunan/edit", $data);
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
                "kondisi_bangunan"          => $input->kondisi_bangunan,
                "bertingkat_bangunan"       => $input->bertingkat_bangunan,
                "beton_bangunan"            => $input->beton_bangunan,
                "luaslantai_bangunan"       => $input->luaslantai_bangunan,
                "letak_bangunan"            => $input->letak_bangunan,
                "dokumentanggal_bangunan"   => $input->dokumentanggal_bangunan,
                "dokumenno_bangunan"        => $input->dokumenno_bangunan,
                "luastanah_bangunan"        => $input->luastanah_bangunan,
                "statustanah_bangunan"      => $input->statustanah_bangunan,
                "nomor_bangunan"            => $input->nomor_bangunan,
                "asal_bangunan"             => $input->asal_bangunan,
                "harga_bangunan"            => $input->harga_bangunan,
            ];
            $updateDetail = $this->bangunan->update($dataUpdateDetail, $input->id_detail);
            if ($updateDetail) {
                $this->session->set_flashdata('sukses', 'Data berhasil diperbaharui!');
                redirect('bangunan');
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
            redirect(base_url("bangunan"));
        }

        $delete = $this->barang->delete($cekBarang->id_barang);
        if ($delete) {
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus!');
        }
        redirect('bangunan');
    }
}
