<?php

class Admin_model extends Custom_model
{
    public $table           = 'admin';
    public $primary_key     = 'id_admin';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "object";

    public function __construct()
    {            
        parent::__construct();        
    }
}
