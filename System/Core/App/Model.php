<?php
namespace Core\App;

abstract class Model {
    protected Database $db;

    public function __construct(){
        $this->db = new Database();
    }
}