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
                    "luas_jalan"            => $input->luas_jalan,
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
        redirect(base_url("jalan"));
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
                "luas_jalan"            => $input->luas_jalan,
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

    public function export()
    {
        $jalan  = $this->jalan->show2();
        $inputFileType  = 'Xlsx';
        $inputFileName  = "assets/template/jalan.xlsx";
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

        // d($jalan);
    
        $baris  = 7;
        $awal   = $baris;
        $no     = 1;
        $jumlahHarga = 0;
        foreach ($jalan as $data) {
            if (isset($data["barang"])) {
                $data["barang"] = (array) $data["barang"];
                $worksheet->getCell('A' . $baris)->setValue($no++);
                $worksheet->getCell('B' . $baris)->setValue($data["barang"]["nama_barang"]);
                $worksheet->getCell('C' . $baris)->setValue($data["barang"]["kode_barang"]);
                $worksheet->getCell('D' . $baris)->setValue($data["barang"]["register_barang"]);
                $worksheet->getCell('E' . $baris)->setValue($data["konstruksi_jalan"]);                
                $worksheet->getCell('F' . $baris)->setValue($data["panjang_jalan"]);
                $worksheet->getCell('G' . $baris)->setValue($data["lebar_jalan"]);
                $worksheet->getCell('H' . $baris)->setValue($data["luas_jalan"]);
                $worksheet->getCell('I' . $baris)->setValue($data["letak_jalan"]);
                $worksheet->getCell('J' . $baris)->setValue($data["dokumentanggal_jalan"]);
                $worksheet->getCell('K' . $baris)->setValue($data["dokumenno_jalan"]);
                $worksheet->getCell('L' . $baris)->setValue($data["statustanah_jalan"]);
                $worksheet->getCell('M' . $baris)->setValue($data["nokodetanah_jalan"]);
                $worksheet->getCell('N' . $baris)->setValue($data["asal_jalan"]);
                $worksheet->getCell('O' . $baris)->setValue($data["harga_jalan"]);
                $worksheet->getCell('P' . $baris)->setValue($data["kondisi_jalan"]);
                $worksheet->getCell('Q' . $baris)->setValue($data["barang"]["keterangan_barang"]);
                $jumlahHarga += $data["harga_jalan"];
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
        $fileName   = "KARTU_INVENTARIS_JALAN_exported_" . date("Y.m.d.H.i.s");

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
