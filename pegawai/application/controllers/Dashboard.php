<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model("Barang_model", "barang");
        $this->load->model("Peminjaman_model", "peminjaman");

    }

    public function index()
    {
        $data["barang"]     = $this->barang->count_rows();
        $data["peminjaman"] = $this->peminjaman->count_rows();

        $this->loadViewAdmin("dashboard/index", $data);
    }

    
}
