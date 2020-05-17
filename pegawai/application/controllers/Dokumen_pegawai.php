<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen_pegawai extends Admin_Controller
{
    private $user;
    public function __construct()
    {
        parent::__construct();
        $this->user = $this->global_data['user_data'];
    }

    public function index()
    {

        redirect("dokumen-pegawai/detail");
    }

    public function detail($username = NULL)
    {

        if (empty($username)) {
            if ($this->user->level_user == 3) {
                redirect(base_url("dokumen-pegawai/detail/" . $this->user->username_user));
            } else {
                redirect("daftar-pegawai");
            }
        } else {

            $cekUser    = $this->m_data->select(["user.*", "jabatan.nama_jabatan"]);
            $cekUser    = $this->m_data->getJoin("jabatan", "user.id_jabatan = jabatan.id_jabatan", "LEFT");
            $cekUser    = $this->m_data->getWhere("username_user", $username);
            $cekUser    = $this->m_data->getData("user")->row();

            if (!$cekUser) {
                redirect("daftar-pegawai");
            } else {
                if ($this->user->level_user == 3) {
                    if ($username != $this->user->username_user) {
                        redirect("dokumen-pegawai/detail");
                    }
                }
            }
        }        

        $dokumen        = $this->m_data->getWhere("id_user", $cekUser->id_user);
        $dokumen        = $this->m_data->getData("file")->result();

        $foto           = $this->m_data->getWhere("id_user", $cekUser->id_user);
        $foto           = $this->m_data->getWhere("jenis_file", "foto_formal");
        $foto           = $this->m_data->getData("file")->row();

        $data["user_detail"]    = $cekUser;
        $data["dokumen"]        = $dokumen;
        $data["foto"]           = $foto ? base_url("assets/dokumen/" . $foto->lokasi_file) : "";

        $this->loadViewAdmin("dashboard/detail_dokumen", $data);
    }

    public function lengkapi($username = NULL)
    {
        if ($this->user->level_user == 3) {
            if (empty($username)) {
                redirect(base_url("dokumen-pegawai/lengkapi/" . $this->user->username_user));
            } else {
                $cekUser    = $this->m_data->getWhere("username_user", $username);
                $cekUser    = $this->m_data->getData("user")->row();
                if (!$cekUser) {
                    redirect(base_url("dokumen-pegawai/lengkapi/" . $this->user->username_user));
                } else {
                    if ($username != $this->user->username_user) {
                        redirect(base_url("dokumen-pegawai/lengkapi/" . $this->user->username_user));
                    }
                }
            }
        } else {
            redirect("daftar-pegawai");
        }


        $user_detail    = $this->m_data->getWhere("username_user", $username);
        $user_detail    = $this->m_data->getData("user")->row();

        $data["user_detail"]    = $user_detail;
        $this->loadViewAdmin("dashboard/lengkapi_dokumen", $data);
    }

    public function update_dokumen()
    {
        $dataSukses = array();
        $dataGagal  = array();
        foreach ($_FILES as $key => $value) {
            if ($key != "sertifikat" && $key != "surat_keterangan") {
                if (!empty($value['name'])) {
                    $namafile = $this->user->username_user . "_" . $key . "_" . time() . "." . pathinfo($value['name'], PATHINFO_EXTENSION);

                    $config  = [
                        "upload_path"       => "assets/dokumen/",
                        "allowed_types"     => 'pdf|gif|jpg|jpeg|png',
                        "max_size"          => 2048,
                        "file_ext_tolower"  => FALSE,
                        "overwrite"         => TRUE,
                        "remove_spaces"     => TRUE,
                        "file_name"         => $namafile
                    ];

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload($key)) {
                        //PROSES UPDATE DATA DI DB      
                        $cekDatabase    = $this->m_data->getWhere("id_user", $this->user->id_user);
                        $cekDatabase    = $this->m_data->getWhere("jenis_file", $key);
                        $cekDatabase    = $this->m_data->getData("file")->row();

                        $dataInsertUpdate   = array(
                            "id_user"       => $this->user->id_user,
                            "nama_file"     => ucwords(strtolower(str_replace("_", " ", $key))),
                            "jenis_file"    => $key,
                            "lokasi_file"   => str_replace(" ", "_", $namafile)
                        );

                        if ($cekDatabase) {   //ada => update
                            $this->m_data->update("file", $dataInsertUpdate, ["id_file" => $cekDatabase->id_file]);
                            if (is_file(FCPATH . "assets/dokumen/" . $cekDatabase->lokasi_file)) {
                                unlink(FCPATH . "assets/dokumen/" . $cekDatabase->lokasi_file);
                            }
                        } else { // ga ada => insert
                            $this->m_data->insert("file", $dataInsertUpdate);
                        }
                        array_push($dataSukses, "Sukses Upload : " . ucwords(strtolower(str_replace("_", " ", $key))));
                    } else {
                        array_push($dataGagal, "Gagal Upload " . ucwords(strtolower(str_replace("_", " ", $key))) . " : " . $this->upload->display_errors("", ""));
                    }
                }
            } else {
                $index = 0;
                foreach ($value["name"] as $d) {
                    $data = [
                        "name"      => $_FILES[$key]['name'][$index][$key],
                        "type"      => $_FILES[$key]['type'][$index][$key],
                        "tmp_name"  => $_FILES[$key]['tmp_name'][$index][$key],
                        "error"     => $_FILES[$key]['error'][$index][$key],
                        "size"      => $_FILES[$key]['size'][$index][$key],
                    ];
                    $_FILES['x']    = $data;

                    $namafile = $this->user->username_user . "_" .
                        strtolower(str_replace("_", " ", $_POST[$key][$index]["nama_" . $key])) . "_" .
                        time() . "." . pathinfo($d[$key], PATHINFO_EXTENSION);

                    $config  = [
                        "upload_path"       => "assets/dokumen/",
                        "allowed_types"     => 'pdf|gif|jpg|jpeg|png',
                        "max_size"          => 2048,
                        "file_ext_tolower"  => FALSE,
                        "overwrite"         => TRUE,
                        "remove_spaces"     => TRUE,
                        "file_name"         => $namafile
                    ];
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('x')) {
                        $dataInsert  = array(
                            "id_user"       => $this->user->id_user,
                            "nama_file"     => $_POST[$key][$index]["nama_" . $key],
                            "jenis_file"    => $key,
                            "lokasi_file"   => str_replace(" ", "_", $namafile)
                        );
                        $this->m_data->insert("file", $dataInsert);
                        array_push($dataSukses, "Sukses Upload : " . ucwords(strtolower($_POST[$key][$index]["nama_" . $key])));
                    } else {
                        array_push($dataGagal, "Gagal Upload " . ucwords(strtolower($_POST[$key][$index]["nama_" . $key])) . " : " . $this->upload->display_errors("", ""));
                    }
                    $index++;
                }
            }
        }
        $this->session->set_flashdata("dataSukses", $dataSukses);
        $this->session->set_flashdata("dataGagal", $dataGagal);
        redirect("dokumen-pegawai/lengkapi/" . $this->user->username_user);
    }

    public function hapus()
    {
        $id_file    = $this->input->post('id_file');

        $hapus      = $this->m_data->delete(["id_file" => $id_file], "file");

        if ($hapus > 0) {
            $this->session->set_flashdata("sukses", "Sukses Menghapus Dokumen pada database!");
        } else {
            $this->session->set_flashdata("gagal", "Gagal Menghapus Dokumen pada database!");
        }
        // redirect(base_url('dokumen-pegawai/detail/') . $this->user->username_user);
        redirect(current_url());
    }
}
