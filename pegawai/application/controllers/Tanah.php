<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tanah extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Detail_tanah_model", "tanah");
    }

    public function index()
    {
        $data["tanah"]  = $this->tanah->show();
        // d($data);
        $this->loadViewAdmin("tanah/index", $data);
    }

    public function tambah()
    {
        $this->loadViewAdmin("tanah/tambah");
    }

    public function proses_tambah()
    {
        $input      = (object) $this->input->post();
        $cekBarang  = $this->barang->where(["kode_barang" => $input->kode_barang])->get();


        if (!$cekBarang) {
            //* TODO : INSERT INTO TABLE BARANG
            $dataInsertBarang = [
                "id_jenis"          => "1",
                "nama_barang"       => $input->nama_barang,
                // "kode_barang"       => $input->kode_barang,
                "register_barang"   => $input->register_barang,
                "keterangan_barang" => $input->keterangan_barang,
            ];
            $insertBarang = $this->barang->insert($dataInsertBarang);
            if ($insertBarang) {
                $dataInsertTanah = [
                    "id_barang"         => $insertBarang,
                    "luas_tanah"        => $input->luas_tanah,
                    "tahun_pengadaan"   => $input->tahun_pengadaan,
                    "letak_tanah"       => $input->letak_tanah,
                    "hak_tanah"         => $input->hak_tanah,
                    "tanggal_tanah"     => $input->tanggal_tanah,
                    "nomor_tanah"       => $input->nomor_tanah,
                    "penggunaan_tanah"  => $input->penggunaan_tanah,
                    "asal_tanah"        => $input->asal_tanah,
                    "harga_tanah"       => $input->harga_tanah,
                ];
                $insertTanah = $this->tanah->insert($dataInsertTanah);
                if ($insertTanah) {
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
        redirect(base_url("tanah/tambah"));
    }

    public function edit($kode = null)
    {
        $cekBarang  = $this->barang->where(["kode_barang" => $kode])->get();
        if (!$cekBarang) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan!');
            redirect(base_url("tanah"));
        }
        $data["tanah"]  = $this->tanah->show($cekBarang->id_barang);
        $this->loadViewAdmin("tanah/edit", $data);
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
            //TODO : UPDATE DETAIL BARANG
            $dataUpdateDetail = [
                "luas_tanah"        => $input->luas_tanah,
                "tahun_pengadaan"   => $input->tahun_pengadaan,
                "letak_tanah"       => $input->letak_tanah,
                "hak_tanah"         => $input->hak_tanah,
                "tanggal_tanah"     => $input->tanggal_tanah,
                "nomor_tanah"       => $input->nomor_tanah,
                "penggunaan_tanah"  => $input->penggunaan_tanah,
                "asal_tanah"        => $input->asal_tanah,
                "harga_tanah"       => $input->harga_tanah,
            ];
            $updateDetail = $this->tanah->update($dataUpdateDetail, $input->id_detail);
            if ($updateDetail) {
                $this->session->set_flashdata('sukses', 'Data berhasil diperbaharui!');
                redirect('tanah');
            } else {
                $this->session->set_flashdata('gagal', 'Data gagal diperbarui');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal diperbarui, Kode barang tidak boleh sama dengan yang lain!');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function detail($kode = null)
    {
        $cekBarang  = $this->barang->where(["kode_barang" => $kode])->get();
        if (!$cekBarang) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan!');
            redirect(base_url("tanah"));
        }
        $data["tanah"]  = $this->tanah->show($cekBarang->id_barang);
        $this->loadViewAdmin("tanah/detail", $data);
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
        redirect('tanah');
    }
}
