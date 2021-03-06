<?php

use function GuzzleHttp\json_encode;

class Detail_tanah_model extends Custom_model
{
    public $table           = 'detail_tanah';
    public $primary_key     = 'id_detail';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "object";

    public function __construct()
    {
        parent::__construct();
        $this->has_one['barang'] = array(
            'foreign_model'     => 'Barang_model',
            'foreign_table'     => 'barang',
            'foreign_key'       => 'id_barang',
            'local_key'         => 'id_barang'
        );
    }

    public function show($id_barang = null)
    {
        if (empty($id_barang)) {
            $data = $this->with_barang()->get_all();
            return $data;
        } else {
            $data = $this->where(["id_barang" => $id_barang])->with_barang()->get();
            if (empty($data->barang)) {
                return false;
            } else {
                return $data;
            }
        }
    }

    public function show2($id_barang = null)
    {
        if (empty($id_barang)) {
            $data = $this->with_barang()->as_array()->get_all();
            return $data;
        } else {
            $data = $this->where(["id_barang" => $id_barang])->with_barang()->get();
            if (empty($data->barang)) {
                return false;
            } else {
                return $data;
            }
        }
    }
}
