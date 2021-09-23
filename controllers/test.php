<?php 

class test extends Database{
    public $as;

    public function __construct()
    {
       $this->as = new Database();
       $this->as->getConnect();
    }
}

?>