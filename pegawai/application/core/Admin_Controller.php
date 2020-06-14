<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Controller extends MY_Controller
{
    public $userData;
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Barang_model", "barang");
        if (!$this->session->has_userdata('login_pegawai')) {
            redirect(base_url("auth/login"));
        }
        $this->userData = $this->session->userdata("login_pegawai");
    }

    protected function loadViewAdmin($view = NULL, $local_data = array(), $asData = FALSE){
        $this->loadView("template/header", $local_data, $asData);
        $this->loadView("template/sidebar", $local_data, $asData);
        $this->loadView($view, $local_data, $asData);
        $this->loadView("template/footer", $local_data, $asData);  
    }
}