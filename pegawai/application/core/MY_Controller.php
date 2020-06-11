<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
        $CI->load->model("Admin_model", "admin");            
        $userData   = $CI->admin->get($CI->session->userdata("login_pegawai")->id_admin);
        $this->global_data = [
            "app_name"          => "Sistem Inventaris Aset",
            "app_complete_name" => "Sistem Inventaris Aset Desa Kabunderan",
            "CI"                => $CI,
            "aktif"             => NULL,
            "user_data"         => $userData,
            "title"             => ucwords(str_replace("_", " ", $this->router->fetch_class())),
            "SidebarType"       => "full",
        ];
    }

    public function loadView($view = NULL, $local_data = array(), $asData = FALSE)
    {
        $data = array_merge($this->global_data, $local_data);
        return $this->load->view($view, $data, $asData);
    }
}
