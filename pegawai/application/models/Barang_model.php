<?php

class Barang_model extends Custom_model
{
    public $table           = 'barang';
    public $primary_key     = 'id_barang';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "object";

    public function __construct()
    {            
        parent::__construct();
        $this->has_one['jenis'] = array(
            'foreign_model'     => 'Jenis_model',
            'foreign_table'     => 'jenis',
            'foreign_key'       => 'id_jenis',
            'local_key'         => 'id_jenis'
        );    
    }
}
