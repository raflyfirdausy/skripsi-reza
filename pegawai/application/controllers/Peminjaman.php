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
            ->where(["status_peminjaman" => 1])
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
        redirect(base_url("peminjaman"));
    }

    public function bukti($kode)
    {
        $cekPeminjaman  = $this->peminjaman
            ->as_array()
            ->with_detail(["with"  => ["relation"  => "barang"]])
            ->where(["kode_peminjaman" => $kode, "status_peminjaman" => 1])
            ->get();
        if (!$cekPeminjaman) {
            $this->session->set_flashdata('gagal', 'Kode peminjaman ' . $kode . " tidak ditemukan!");
            redirect(base_url("pengembalian"));
        }

        for ($a = 0; $a < sizeof($cekPeminjaman["detail"]); $a++) {
            if (!isset($cekPeminjaman["detail"][$a]->barang)) {
                $barang = $this->barang
                    ->as_array()
                    ->where(["id_barang" => $cekPeminjaman["detail"][$a]->id_barang])
                    ->with_trashed()
                    ->get();
                $cekPeminjaman["detail"][$a]->barang = $barang;
            }
        }

        // d($cekPeminjaman);
        $nama_peminjam  = $cekPeminjaman["nama_peminjaman"];

        $inputFileType  = 'Xlsx';
        $inputFileName  = "assets/template/peminjaman.xlsx";
        $reader         = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $spreadsheet    = $reader->load($inputFileName);
        $worksheet      = $spreadsheet->getActiveSheet();

        $styleBorder = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'alignment' => [
                'vertical'      => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText'      => TRUE
            ]
        ];

        $worksheet->getCell('A7')->setValue("Kode Peminjaman : " . $kode);

        $worksheet->getCell('C14')->setValue(": " . $nama_peminjam);
        $worksheet->getCell('C15')->setValue(": " . $cekPeminjaman["keperluan_peminjaman"]);
        $worksheet->getCell('C16')->setValue(": " . $cekPeminjaman["waktupinjam_peminjaman"]);
        $worksheet->getCell('C17')->setValue(": " . $cekPeminjaman["waktukembali_peminjaman"]);

        $detail = (array) $cekPeminjaman["detail"];
        $baris  = 20;
        $awal   = $baris;
        $no     = 1;
        for ($x = 0; $x < sizeof($detail); $x++) {
            $barang = (array) $detail[$x]->barang;
            $worksheet->getCell('A' . $baris)->setValue($no++);
            $worksheet->getCell('B' . $baris)->setValue($barang["kode_barang"]);
            $worksheet->getCell('C' . $baris)->setValue($barang["nama_barang"]);
            $worksheet->getCell('D' . $baris)->setValue($detail[$x]->banyak_barang);
            $baris++;
        }

        $kolomAkhir = $worksheet->getHighestDataColumn();
        $barisAkhir = $worksheet->getHighestRow();

        $worksheet->getStyle('A' . $awal . ':' .
            $kolomAkhir . $barisAkhir)
            ->applyFromArray($styleBorder);

        $awalMerge  = "A" . ($barisAkhir + 2);
        $akhirMerge = "D" . ($barisAkhir + 3);
        $spreadsheet->getActiveSheet()->mergeCells($awalMerge . ":" . $akhirMerge);

        $worksheet->getCell('A' . $worksheet->getHighestRow())->setValue("Selanjutnya akan bertanggung jawab penuh terhadap barang-barang tersebut dan akan segera dikembalikan setelah kegiatan selesai.");
        $spreadsheet->getActiveSheet()->getStyle('A' . $worksheet->getHighestRow())->getAlignment()->setWrapText(true);

        $spreadsheet->getActiveSheet()->mergeCells('A' . ($barisAkhir + 4) . ":" . 'D' . ($barisAkhir + 4));
        $worksheet->getCell('A' . $worksheet->getHighestRow())->setValue("Demikian bukti peminjaman peralatan ini dibuat.");

        $spreadsheet->getActiveSheet()->mergeCells('C' . ($barisAkhir + 6) . ":" . 'D' . ($barisAkhir + 6));
        $worksheet->getCell('C' . $worksheet->getHighestRow())->setValue("Kabunderan " . date("j M Y"));
        $spreadsheet->getActiveSheet()->getStyle('C' . $worksheet->getHighestRow())->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);;

        $worksheet->getCell('B' . ($barisAkhir + 7))->setValue("Pemberi Pinjaman");
        $spreadsheet->getActiveSheet()->getStyle('B' . $worksheet->getHighestRow())->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
        $worksheet->getCell('D' . $worksheet->getHighestRow())->setValue("Peminjam");
        $spreadsheet->getActiveSheet()->getStyle('D' . $worksheet->getHighestRow())->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;

        $worksheet->getCell('B' . ($barisAkhir + 11))->setValue("___________________");
        $worksheet->getCell('D' . ($barisAkhir + 11))->setValue($nama_peminjam);
        $spreadsheet->getActiveSheet()->getStyle('B' . $worksheet->getHighestRow())->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
        $spreadsheet->getActiveSheet()->getStyle('D' . $worksheet->getHighestRow())->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;

        //TODO : WRITE AND DOWNLOAD
        $fileName   = "BUKTI_PEMINJAMAN_" . $kode . "_" . $nama_peminjam . "_" . date("Y.m.d.H.i.s");

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');

        // $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Dompdf');        
        // header('Content-Type: application/pdf');
        // header('Content-Disposition: attachment;filename="' . $fileName . '.pdf"');
        // header('Cache-Control: max-age=0');
        // $writer->save('php://output');
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

    public function export()
    {
        $peminjaman = $this->peminjaman
            ->where(["status_peminjaman" => 1])
            ->as_array()
            ->with_detail()
            ->order_by("created_at", "ASC")
            ->get_all();

        $inputFileType  = 'Xlsx';
        $inputFileName  = "assets/template/laporan_peminjaman.xlsx";
        $reader         = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $spreadsheet    = $reader->load($inputFileName);
        $worksheet      = $spreadsheet->getActiveSheet();

        $styleBorder = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'alignment' => [
                'vertical'      => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText'      => TRUE
            ]
        ];

        $baris  = 5;
        $awal   = $baris;
        $no     = 1;
        foreach ($peminjaman as $data) {
            $worksheet->getCell('A' . $baris)->setValue($no++);
            $worksheet->getCell('B' . $baris)->setValue($data["kode_peminjaman"]);
            $worksheet->getCell('C' . $baris)->setValue($data["nama_peminjaman"]);
            $worksheet->getCell('D' . $baris)->setValue($data["keperluan_peminjaman"]);
            $worksheet->getCell('E' . $baris)->setValue($data["waktupinjam_peminjaman"]);
            $worksheet->getCell('F' . $baris)->setValue($data["waktukembali_peminjaman"]);
            $worksheet->getCell('G' . $baris)->setValue(sizeof($data["detail"]));
            $baris++;
        }

        $kolomAkhir = $worksheet->getHighestDataColumn();
        $barisAkhir = $worksheet->getHighestRow();

        $worksheet->getStyle('A' . $awal . ':' .
            $kolomAkhir . $barisAkhir)
            ->applyFromArray($styleBorder);

        //TODO : WRITE AND DOWNLOAD
        $fileName   = "LAPORAN_PEMINJMANAN_exported_" . date("Y.m.d.H.i.s");

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
