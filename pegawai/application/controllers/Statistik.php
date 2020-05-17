<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistik extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $user = $this->m_data->getWhere("level_user", 3);
        $user = $this->m_data->getData("user")->result();

        $jabatan = $this->m_data->getData("jabatan")->result();

        // d($user);
        $agama  = [
            "ISLAM"     => 0,
            "KRISTEN"   => 0,
            "KATHOLIK"  => 0,
            "HINDU"     => 0,
            "BUDHA"     => 0,
            "KONGHUCU"  => 0,
        ];
        foreach ($user as $u) {
            $agama[$u->agama_user]++;
        }
        $strAgama = "[";
        foreach ($agama as $a) {
            $strAgama .= $a . ", ";
        }
        $strAgama .= "]";

        //! =================================================================

        $pendidikan = array();
        foreach (pendidikan_terakhir() as $pt) {
            $pendidikan[$pt] = 0;
        }

        foreach ($user as $u) {
            $pendidikan[$u->pendidikan_user]++;
        }

        $strPendidikan = "[";
        foreach ($pendidikan as $pd) {
            $strPendidikan .= $pd . ", ";
        }
        $strPendidikan .= "]";

        //! ===================================================================        
        $arrJabatan = [];
        $strJabatan = "[";
        foreach ($jabatan as $jb) {
            $strJabatan .= "\"" . $jb->nama_jabatan  . "\", ";
            $arrJabatan[$jb->id_jabatan] = 0;
        }
        $strJabatan .= "]";

        foreach ($user as $dataUser) {
            $arrJabatan[$dataUser->id_jabatan]++;
        }

        $strJmlJabatan = "[";
        foreach ($arrJabatan as $aj) {
            $strJmlJabatan .= $aj . ", ";
        }
        $strJmlJabatan .= "]";

        //! KECAMATAN==========================================================================
        $kecamatan = $this->m_data->select("kecamatan");
        $kecamatan = $this->m_data->distinct();
        $kecamatan = $this->m_data->getData("user")->result();

        $strKecamatan = "[";
        $strJumlahKec = "[";
        foreach ($kecamatan as $kec) {
            $namaKec = "";
            if ($kec->kecamatan == null) {
                $namaKec = "Belum Diisi";
            } else {
                $namaKec = ucwords(strtolower($kec->kecamatan));
            }
            $strKecamatan .= "\"" . $namaKec  . "\", ";
            $jmlKec = $this->m_data->getWhere("kecamatan", $kec->kecamatan);
            $jmlKec = $this->m_data->getData("user")->num_rows();
            $strJumlahKec .= $jmlKec . ",";
        }
        $strKecamatan .= "]";
        $strJumlahKec .= "]";

        $data["agama"]          = $strAgama;
        $data["pendidikan"]     = $strPendidikan;
        $data["nama_jabatan"]   = $strJabatan;
        $data["jmlJabatan"]     = $strJmlJabatan;
        $data["nama_kecamatan"] = $strKecamatan;
        $data["jmlKecamatan"]   = $strJumlahKec;
        $this->loadViewAdmin("dashboard/statistik", $data);
    }
}
