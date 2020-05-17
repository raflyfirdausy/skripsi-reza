<?php

class Peminjaman_model extends Custom_model
{
    public $table           = 'peminjaman';
    public $primary_key     = 'id_peminjaman';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "object";

    public function __construct()
    {            
        parent::__construct();        
        $this->has_many['detail'] = array(
            'foreign_model'     => 'Detail_peminjaman_model',
            'foreign_table'     => 'detail_peminjaman',
            'foreign_key'       => 'id_peminjaman',
            'local_key'         => 'id_peminjaman'
        );    
    }
}
