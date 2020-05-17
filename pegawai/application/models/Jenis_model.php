<?php

class Jenis_model extends Custom_model
{
    public $table           = 'jenis';
    public $primary_key     = 'id_jenis';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "object";

    public function __construct()
    {            
        parent::__construct();        
    }
}
