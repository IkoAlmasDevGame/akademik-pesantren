<?php 
namespace model;

class people {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
}

?>