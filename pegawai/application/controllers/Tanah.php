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
                "kode_barang"       => $input->kode_barang,
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
        redirect(base_url("tanah"));
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
            // "kode_barang"       => $input->kode_barang,
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

    public function export()
    {
        $tanah  = $this->tanah->show2();
        $inputFileType  = 'Xlsx';
        $inputFileName  = "assets/template/tanah.xlsx";
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

        $baris  = 9;
        $awal   = $baris;
        $no     = 1;
        $jumlahHarga = 0;
        foreach ($tanah as $data) {
            if (isset($data["barang"])) {
                $data["barang"] = (array) $data["barang"];
                $worksheet->getCell('A' . $baris)->setValue($no++);
                $worksheet->getCell('B' . $baris)->setValue($data["barang"]["nama_barang"]);
                $worksheet->getCell('C' . $baris)->setValue($data["barang"]["kode_barang"]);
                $worksheet->getCell('D' . $baris)->setValue($data["barang"]["register_barang"]);
                $worksheet->getCell('E' . $baris)->setValue($data["luas_tanah"]);
                $worksheet->getCell('F' . $baris)->setValue($data["tahun_pengadaan"]);
                $worksheet->getCell('G' . $baris)->setValue($data["letak_tanah"]);
                $worksheet->getCell('H' . $baris)->setValue($data["hak_tanah"]);
                $worksheet->getCell('I' . $baris)->setValue($data["tanggal_tanah"]);
                $worksheet->getCell('J' . $baris)->setValue($data["nomor_tanah"]);
                $worksheet->getCell('K' . $baris)->setValue($data["penggunaan_tanah"]);
                $worksheet->getCell('L' . $baris)->setValue($data["asal_tanah"]);
                $worksheet->getCell('M' . $baris)->setValue($data["harga_tanah"]);
                $worksheet->getCell('N' . $baris)->setValue($data["barang"]["keterangan_barang"]);
                $jumlahHarga += $data["harga_tanah"];
                $baris++;
            }
        }

        $spreadsheet->getActiveSheet()->mergeCells("A" . $baris . ":L" . $baris);
        $worksheet->getCell('A' . $baris)->setValue("Jumlah");
        $worksheet->getCell('M' . $baris)->setValue($jumlahHarga);
        $spreadsheet->getActiveSheet()->getStyle('A' . $baris)->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);;

        $kolomAkhir = $worksheet->getHighestDataColumn();
        $barisAkhir = $worksheet->getHighestRow();

        $worksheet->getStyle('A' . $awal . ':' .
            $kolomAkhir . $barisAkhir)
            ->applyFromArray($styleBorder);


        $spreadsheet->getActiveSheet()->mergeCells("K" . ($baris + 2) . ":M" . ($baris + 2));
        $spreadsheet->getActiveSheet()->getStyle('K' . ($baris + 2))->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
        $worksheet->getCell('K' . ($baris + 2))->setValue("Kabunderan, " . date("j M Y"));

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

        $spreadsheet->getActiveSheet()->mergeCells("K" . ($baris + 4) . ":M" . ($baris + 4));
        $spreadsheet->getActiveSheet()->getStyle('K' . ($baris + 4))->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
        $worksheet->getCell('K' . ($baris + 4))->setValue("Pengurus Barang");

        $spreadsheet->getActiveSheet()->mergeCells("K" . ($baris + 9) . ":M" . ($baris + 9));
        $spreadsheet->getActiveSheet()->getStyle('K' . ($baris + 9))->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
        $worksheet->getCell('K' . ($baris + 9))->setValue("(...........................................)");

        $spreadsheet->getActiveSheet()->mergeCells("K" . ($baris + 10) . ":M" . ($baris + 10));
        $spreadsheet->getActiveSheet()->getStyle('K' . ($baris + 10))->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
        $worksheet->getCell('K' . ($baris + 10))->setValue("NIP: ..................................");

        //TODO : WRITE AND DOWNLOAD
        $fileName   = "KARTU_INVENTARIS_TANAH_exported_" . date("Y.m.d.H.i.s");

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
