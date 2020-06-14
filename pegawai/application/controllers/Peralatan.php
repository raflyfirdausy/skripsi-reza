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
            // "kode_barang"       => $input->kode_barang,
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
            redirect(base_url("peralatan"));
        }

        $delete = $this->barang->delete($cekBarang->id_barang);
        if ($delete) {
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus!');
        }
        redirect('peralatan');
    }

    public function export()
    {
        $alat  = $this->alat->show2();
        $inputFileType  = 'Xlsx';
        $inputFileName  = "assets/template/alat.xlsx";
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

        // d($alat);
    
        $baris  = 8;
        $awal   = $baris;
        $no     = 1;
        $jumlahHarga = 0;
        foreach ($alat as $data) {
            if (isset($data["barang"])) {
                $data["barang"] = (array) $data["barang"];
                $worksheet->getCell('A' . $baris)->setValue($no++);
                $worksheet->getCell('B' . $baris)->setValue($data["barang"]["nama_barang"]);
                $worksheet->getCell('C' . $baris)->setValue($data["barang"]["kode_barang"]);
                $worksheet->getCell('D' . $baris)->setValue($data["barang"]["register_barang"]);
                $worksheet->getCell('E' . $baris)->setValue($data["merk_peralatan"]);
                $worksheet->getCell('F' . $baris)->setValue($data["ukuran_peralatan"]);
                $worksheet->getCell('G' . $baris)->setValue($data["bahan_peralatan"]);
                $worksheet->getCell('H' . $baris)->setValue($data["tahun_peralatan"]);
                $worksheet->getCell('I' . $baris)->setValue($data["nopabrik_peralatan"]);
                $worksheet->getCell('J' . $baris)->setValue($data["norangka_peralatan"]);
                $worksheet->getCell('K' . $baris)->setValue($data["nomesin_peralatan"]);
                $worksheet->getCell('L' . $baris)->setValue($data["nopolisi_peralatan"]);
                $worksheet->getCell('M' . $baris)->setValue($data["nobpkb_peralatan"]);
                $worksheet->getCell('N' . $baris)->setValue($data["asal_peralatan"]);
                $worksheet->getCell('O' . $baris)->setValue($data["harga_peralatan"]);
                $worksheet->getCell('P' . $baris)->setValue($data["barang"]["keterangan_barang"]);
                $jumlahHarga += $data["harga_peralatan"];
                $baris++;
            }
        }

        $spreadsheet->getActiveSheet()->mergeCells("A" . $baris . ":N" . $baris);
        $worksheet->getCell('A' . $baris)->setValue("Jumlah");
        $worksheet->getCell('O' . $baris)->setValue($jumlahHarga);
        $spreadsheet->getActiveSheet()->getStyle('A' . $baris)->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);;

        $kolomAkhir = $worksheet->getHighestDataColumn();
        $barisAkhir = $worksheet->getHighestRow();

        $worksheet->getStyle('A' . $awal . ':' .
            $kolomAkhir . $barisAkhir)
            ->applyFromArray($styleBorder);

        $spreadsheet->getActiveSheet()->mergeCells("B" . ($baris + 3) . ":D" . ($baris + 3));
        $spreadsheet->getActiveSheet()->getStyle('B' . ($baris + 3))->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
        $worksheet->getCell('B' . ($baris + 3))->setValue("Mengetahui");

        $spreadsheet->getActiveSheet()->mergeCells("B" . ($baris + 4) . ":D" . ($baris + 4));
        $spreadsheet->getActiveSheet()->getStyle('B' . ($baris + 4))->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
        $worksheet->getCell('B' . ($baris + 4))->setValue("Kepala SKPD");

        $spreadsheet->getActiveSheet()->mergeCells("B" . ($baris + 9) . ":D" . ($baris + 9));
        $spreadsheet->getActiveSheet()->getStyle('B' . ($baris + 9))->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
        $worksheet->getCell('B' . ($baris + 9))->setValue("(...........................................)");

        $spreadsheet->getActiveSheet()->mergeCells("B" . ($baris + 10) . ":D" . ($baris + 10));
        $spreadsheet->getActiveSheet()->getStyle('B' . ($baris + 10))->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
        $worksheet->getCell('B' . ($baris + 10))->setValue("NIP: ..................................");

        $spreadsheet->getActiveSheet()->mergeCells("N" . ($baris + 2) . ":P" . ($baris + 2));
        $spreadsheet->getActiveSheet()->getStyle('N' . ($baris + 2))->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
        $worksheet->getCell('N' . ($baris + 2))->setValue("Kabunderan, " . date("j M Y"));

        $spreadsheet->getActiveSheet()->mergeCells("N" . ($baris + 4) . ":P" . ($baris + 4));
        $spreadsheet->getActiveSheet()->getStyle('N' . ($baris + 4))->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
        $worksheet->getCell('N' . ($baris + 4))->setValue("Pengurus Barang");

        $spreadsheet->getActiveSheet()->mergeCells("N" . ($baris + 9) . ":P" . ($baris + 9));
        $spreadsheet->getActiveSheet()->getStyle('N' . ($baris + 9))->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
        $worksheet->getCell('N' . ($baris + 9))->setValue("(...........................................)");

        $spreadsheet->getActiveSheet()->mergeCells("N" . ($baris + 10) . ":P" . ($baris + 10));
        $spreadsheet->getActiveSheet()->getStyle('N' . ($baris + 10))->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
        $worksheet->getCell('N' . ($baris + 10))->setValue("NIP: ..................................");

        //TODO : WRITE AND DOWNLOAD
        $fileName   = "KARTU_INVENTARIS_PERALATAN_exported_" . date("Y.m.d.H.i.s");

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
