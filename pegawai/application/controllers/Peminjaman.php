<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends Admin_Controller
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
        $data["peminjaman"] = $this->peminjaman
            ->as_array()
            ->with_detail()
            ->order_by("created_at", "DESC")
            ->get_all();
        $this->loadViewAdmin("peminjaman/index", $data);
    }

    public function tambah()
    {
        $data["barang"] = $this->barang->get_all();
        $this->loadViewAdmin("peminjaman/tambah", $data);
    }

    public function proses_tambah()
    {
        $input = (object) $this->input->post();

        if (sizeof($input->barang) > 0) {
            //TODO : INPUT INTO TABLE PEMINJAMAN FOR GET ID
            $kodePeminjaman = "P" . now();
            $dataInput = [
                "kode_peminjaman"           => $kodePeminjaman,
                "nama_peminjaman"           => $input->nama_peminjaman,
                "keperluan_peminjaman"      => $input->keperluan_peminjaman,
                "waktupinjam_peminjaman"    => date("Y-m-d"),
                "waktukembali_peminjaman"   => $input->waktukembali_peminjaman,
                "status_peminjaman"         => 1, //? BELUM DI KEMBALIKAN            
            ];

            $insert = $this->peminjaman->insert($dataInput);
            if ($insert) {
                //TODO : INPUT INTO TABLE DETAIL PEMINJAMAN
                $dataDetail = [];
                $barang = $input->barang;
                foreach ($barang as $d) {
                    $item = [
                        "id_peminjaman"     => $insert,
                        "id_barang"         => $d["id"],
                        "banyak_barang"     => $d["banyak"]
                    ];
                    array_push($dataDetail, $item);
                }
                $insertDetail = $this->detail->insert($dataDetail);
                if ($insertDetail) {
                    $this->session->set_flashdata("sukses", "Berhasil menambahkan data peminjaman dengan kode peminjaman " . $kodePeminjaman);
                } else {
                    $this->session->set_flashdata("gagal", "Terjadi kesalahan saat menambahkan detail data peminjaman");
                }
            } else {
                $this->session->set_flashdata("gagal", "Terjadi kesalahan saat menambahkan data peminjaman");
            }
        } else {
            $this->session->set_flashdata("gagal", "Kamu belum memilih barang apapun");
        }
        redirect(base_url("peminjaman/tambah"));
    }

    public function detail($kode)
    {
        $cekPeminjaman  = $this->peminjaman->where(["kode_peminjaman" => $kode])->get();
        if (!$cekPeminjaman) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan!');
            redirect(base_url("peminjaman"));
        }

        $peminjaman = $this->peminjaman            
            ->with_detail(["with"  => ["relation"  => "barang"]])
            ->order_by("created_at", "DESC")
            ->where(["kode_peminjaman" => $kode])
            ->get();        

        $data["detail"] = $peminjaman;
        $this->loadViewAdmin("peminjaman/detail", $data);
    }

    public function hapus($kode)
    {
        $cekPeminjaman  = $this->peminjaman->where(["kode_peminjaman" => $kode])->get();
        if (!$cekPeminjaman) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan!');
            redirect(base_url("peminjaman"));
        }

        $delete = $this->peminjaman->delete($cekPeminjaman->id_peminjaman);
        if ($delete) {
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus!');
        }
        redirect('peminjaman');
    }
}
