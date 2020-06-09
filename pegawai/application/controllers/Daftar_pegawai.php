<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_pegawai extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $level_user = $this->global_data['user_data']->level_user;

        if ($level_user == 3) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $jenis = $this->input->get('jenis');
        $dataPegawai    = $this->m_data->getJoin("jabatan", "user.id_jabatan = jabatan.id_jabatan", "LEFT");
        $dataPegawai    = $this->m_data->getWhere("user.level_user", "3");
        if (!empty($jenis) && $jenis != "semua") {
            $dataPegawai    = $this->m_data->getWhere("user.id_jabatan", $jenis);
        }
        $dataPegawai    = $this->m_data->order_by("user.id_user", "DESC");
        $dataPegawai    = $this->m_data->getData("user")->result();

        $jabatan        = $this->m_data->order_by("nama_jabatan", "ASC");
        $jabatan        = $this->m_data->getData("jabatan")->result();

        $data["jabatan"]        = $jabatan;
        $data["dataPegawai"]    = $dataPegawai;
        $this->loadViewAdmin("dashboard/daftar_pegawai", $data);    
    }

    public function export()
    {
        $jenis = $this->input->get('jenis');
        $dataPegawai    = $this->m_data->getJoin("jabatan", "user.id_jabatan = jabatan.id_jabatan", "LEFT");
        $dataPegawai    = $this->m_data->getWhere("user.level_user", "3");
        if (!empty($jenis) && $jenis != "semua") {
            $dataPegawai    = $this->m_data->getWhere("user.id_jabatan", $jenis);
        }
        $dataPegawai    = $this->m_data->order_by("user.id_user", "DESC");
        $dataPegawai    = $this->m_data->getData("user")->result();

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

        $styleCenter = [
            'alignment' => [
                'horizontal'    => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'      => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ]
        ];

        $inputFileType  = 'Xlsx';
        $inputFileName  = "assets/template/pegawai.xlsx";
        $reader         = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $spreadsheet    = $reader->load($inputFileName);
        $worksheet      = $spreadsheet->getActiveSheet();

        $baris  = 4;
        $awal   = $baris;
        $no     = 1;
        foreach ($dataPegawai as $user_detail) {
            $worksheet->getCell('A' . $baris)->setValue($no++);
            $worksheet->getCell('B' . $baris)->setValue($user_detail->gelardepan_user . " " . ucwords(strtolower($user_detail->nama_user)) . " " . $user_detail->gelarbelakang_user);
            $worksheet->getCell('C' . $baris)->setValue(shortdate_indo($user_detail->tanggallahir_user));
            $worksheet->getCell('D' . $baris)->setValue($user_detail->pendidikan_user);
            $worksheet->getCell('E' . $baris)->setValue($user_detail->agama_user);
            $worksheet->getCell('F' . $baris)->setValue($user_detail->no_hp);
            $worksheet->getCell('G' . $baris)->setValue($user_detail->jalan . ", Desa "
                . $user_detail->desa . " RT " .
                $user_detail->rt . " RW " .
                $user_detail->rw . ", Kec." .
                $user_detail->kecamatan . ", Kab. " .
                $user_detail->kabupaten . ", " .
                $user_detail->provinsi);
            $worksheet->getCell('H' . $baris)->setValue($user_detail->nama_jabatan);
            $baris++;
        }

        //TODO : AMBIL KOLOM DAN BARIS TERAKHIR
        $kolomTerakhir = $worksheet->getHighestDataColumn();
        $barisTerakhir = $worksheet->getHighestRow();

        $worksheet->getStyle('A' . $awal . ':' .
            $worksheet->getHighestDataColumn() .
            $worksheet->getHighestRow())
            ->applyFromArray($styleBorder);

        $fileName   = "EXPORT_DATA_PEGAWAI_RSUD_BUMIAYU_" . date("Y.m.d.H.i.s");
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function tambah_pegawai()
    {
        $nama_pegawai    = $this->input->post("nama_lengkap");
        $pecah          = explode(' ', $nama_pegawai);
        $username       = strtolower($pecah[0] . $pecah[1]);

        $data = [
            "gelardepan_user"       => $this->input->post('gelar_depan'),
            "nama_user"             => $this->input->post("nama_lengkap"),
            "gelarbelakang_user"    => $this->input->post('gelar_belakang'),
            "tanggallahir_user"     => $this->input->post('tanggal_lahir'),
            "pendidikan_user"       => $this->input->post('pendidikan_pegawai'),
            "agama_user"            => $this->input->post('agama_pegawai'),
            "username_user"         => strtolower($this->getUniqueUsername($username)),
            "password_user"         => md5("12345678"), //password default 12345678
            "id_jabatan"            => $this->input->post("jabatan_pegawai"),
            "no_hp"                 => $this->input->post('no_hp'),
            "jalan"                 => $this->input->post('jalan'),
            "rt"                    => $this->input->post('rt'),
            "rw"                    => $this->input->post('rw'),
            "desa"                  => $this->input->post('desa'),
            "kecamatan"             => $this->input->post('kecamatan'),
            "kabupaten"             => $this->input->post('kabupaten'),
            "provinsi"              => $this->input->post('provinsi'),
            "level_user"            => 3
        ];

        $insert = $this->m_data->insert("user", $data);
        if ($insert > 0) {
            $this->session->set_flashdata("sukses", "Berhasil menambah data pegawai dengan username <b>" . $data["username_user"] . "</b> pada database");
        } else {
            $this->session->set_flashdata("gagal", "Gagal menambah data pegawai pada database : " . $this->m_data->getError());
        }
        redirect(base_url('daftar-pegawai'));
    }


    public function getUniqueUsername($username, $percobaan = 1)
    {
        $cekUsername    = $this->m_data->getWhere("username_user", $username);
        $cekUsername    = $this->m_data->getData("user")->row();
        if ($cekUsername) {
            $username = preg_replace('/[^a-zA-Z]/i', '', $username);
            return $this->getUniqueUsername($username . " " . $percobaan, ++$percobaan);
        } else {
            return $username;
        }
    }

    public function ubah_data()
    {
        // d($_POST);
        $id_pegawai     = $this->input->post('id_pegawai');
        $password       = $this->input->post('password');

        $dataUpdate = [
            "gelardepan_user"       => $this->input->post('gelar_depan'),
            "nama_user"             => $this->input->post('nama_lengkap'),
            "gelarbelakang_user"    => $this->input->post('gelar_belakang'),
            "tanggallahir_user"     => $this->input->post('tanggal_lahir'),
            "pendidikan_user"       => $this->input->post('pendidikan_pegawai'),
            "agama_user"            => $this->input->post('agama_pegawai'),
            "no_hp"                 => $this->input->post('no_hp'),
            "jalan"                 => $this->input->post('jalan'),
            "rt"                    => $this->input->post('rt'),
            "rw"                    => $this->input->post('rw'),
            "desa"                  => $this->input->post('desa'),
            "kecamatan"             => $this->input->post('kecamatan'),
            "kabupaten"             => $this->input->post('kabupaten'),
            "provinsi"              => $this->input->post('provinsi'),
            "id_jabatan"            => $this->input->post("jabatan_pegawai"),
            "level_user"            => 3
        ];

        // $dataUpdate     = [
        //     "nama_user"     => $nama_pegawai,
        //     "id_jabatan"    => $jabatan_user
        // ];

        if (!empty($password)) {
            $dataUpdate["password_user"] = md5($password);
        }

        $update     = $this->m_data->update("user", $dataUpdate, ["id_user" => $id_pegawai]);
        if ($update > 0) {
            $this->session->set_flashdata("sukses", "Berhasil mengubah data pegawai " . $dataUpdate["nama_user"] . " pada database");
        } else {
            $this->session->set_flashdata("gagal", "Gagal mengubah data pegawai pada database");
        }
        redirect(base_url('daftar-pegawai'));
    }

    public function hapus_data()
    {
        $id_pegawai     = $this->input->post('id_pegawai');

        $delete     = $this->m_data->delete(["id_user" => $id_pegawai], "user");
        if ($delete > 0) {
            $this->session->set_flashdata("sukses", "Berhasil menghapus data pegawai pada database");
        } else {
            $this->session->set_flashdata("gagal", "Tidak bisa menghapus data pegawai karena masih ada dokumen yang tersimpan, Silahkan hapus semua dokumen terlebih dahulu sebelum menghapus data pegawai");
        }
        redirect(base_url('daftar-pegawai'));
    }
}
