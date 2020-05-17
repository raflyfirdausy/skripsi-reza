<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $level_user = $this->global_data['user_data']->level_user;
        if ($level_user == 3) {
            redirect(base_url('dokumen-pegawai'));
        } else {
            redirect(base_url('daftar-pegawai'));
        }
    }

    public function index()
    {
        $this->loadViewAdmin("dashboard/index");
    }
}
