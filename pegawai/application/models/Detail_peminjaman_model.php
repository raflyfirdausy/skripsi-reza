<?php

class Detail_peminjaman_model extends Custom_model
{
    public $table           = 'detail_peminjaman';
    public $primary_key     = 'id_detail_peminjaman';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "object";

    public function __construct()
    {            
        parent::__construct();
        $this->has_one['peminjaman'] = array(
            'foreign_model'     => 'Peminjaman_model',
            'foreign_table'     => 'peminjaman',
            'foreign_key'       => 'id_peminjaman',
            'local_key'         => 'id_peminjaman'
        );    
        $this->has_one['barang'] = array(
            'foreign_model'     => 'Barang_model',
            'foreign_table'     => 'barang',
            'foreign_key'       => 'id_barang',
            'local_key'         => 'id_barang'
        );    
    }
}
