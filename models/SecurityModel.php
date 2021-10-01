<?php 

class SecurityModel extends Database{

    public $conn;
    private $table = 'users';

    public function __construct() {
        $this->conn = $this->getConnect();
    }

    public function validateLogin($email)
    {
        try{
            $sql = "SELECT * FROM {$this->table} WHERE email = ?";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(1, $email, PDO::PARAM_STR);
            $pre->execute();
            $row = $pre->fetch(PDO::FETCH_ASSOC);
            return $row;
        }catch(Exception $e){  
            die($e->getMessage());
        }
    }

    public static function verifyUser(){
        if(!isset($_SESSION['admin'])) header('location:?a=login');
    }

    public function editor(){
        if($_SESSION['admin']['role'] == 'editor' || $_SESSION['admin']['role'] == 'admin'){
            return true;
        }else{
            return false;
        }
    }

    public function writer(){
        if($_SESSION['admin']['role'] == 'writer' || $_SESSION['admin']['role'] == 'admin'){
            return true;
        }else{
            return false;
        }
    }

    public function admin(){
        if($_SESSION['admin']['role'] == 'admin'){
            return true;
        }else{
            return false;
        }
    }

    public function user_exist($email){
        try{
            $sql = "SELECT * FROM {$this->table} WHERE email = ?";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(1, $email, PDO::PARAM_STR);
            $pre->execute();
            $row = $pre->fetch(PDO::FETCH_ASSOC);
            return $row;
        }catch(Exception $e){  
            die($e->getMessage());
        }
    }
}

?>