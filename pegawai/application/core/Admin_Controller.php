<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('login_pegawai')) {
            redirect(base_url("auth/login"));
        }
    }

    protected function loadViewAdmin($view = NULL, $local_data = array(), $asData = FALSE){
        $this->loadView("template/header", $local_data, $asData);
        $this->loadView("template/sidebar", $local_data, $asData);
        $this->loadView($view, $local_data, $asData);
        $this->loadView("template/footer", $local_data, $asData);  
    }
}