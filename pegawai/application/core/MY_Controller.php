<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
    
        $userData   = $CI->m_data->select(["user.*", "jabatan.nama_jabatan"]);
        $userData   = $CI->m_data->getWhere("id_user", $CI->session->userdata("login_pegawai")->id_user);
        $userData   = $CI->m_data->getJoin("jabatan", "user.id_jabatan = jabatan.id_jabatan", "LEFT");
        $userData   = $CI->m_data->getData("user")->row();
        
        $this->global_data = [
            "app_name"          => "Sistem Administrasi Pegawai",
            "app_complete_name" => "Sistem Administrasi Pegawai RSUD Bumiayu",
            "CI"                => $CI,
            "aktif"             => NULL,
            "user_data"         => $userData,
            "title"             => ucwords(str_replace("_", " ", $this->router->fetch_class()))
        ];    
        
    }

    public function loadView($view = NULL, $local_data = array(), $asData = FALSE){        
        $data = array_merge($this->global_data, $local_data);
        return $this->load->view($view, $data, $asData);
    }
}