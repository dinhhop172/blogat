<?php 

class HomeModel  extends Database{
    private $conn;

    public function __construct() {
        $this->conn = $this->getConnect();
    }

    public function login()
    {
        try{
            $sql = "SELECT * FROM {$this->table}";
            $rs = $this->query($sql);
            return $rs;
        }catch(Exception $e){  
            die($e->getMessage());
        }
    }
}

?>