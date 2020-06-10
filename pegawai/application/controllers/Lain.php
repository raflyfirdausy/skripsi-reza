<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lain extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Detail_lainnya_model", "lain");
    }

    public function index()
    {
        $data["lain"]  = $this->lain->show();
        // d($data);
        $this->loadViewAdmin("lain/index", $data);
    }
}