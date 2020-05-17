<?php

class Detail_bangunan_model extends Custom_model
{
    public $table           = 'detail_bangunan';
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
}
