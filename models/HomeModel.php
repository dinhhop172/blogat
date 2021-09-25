<?php 

class HomeModel  extends Database{
    public $conn;
    private $table = 'users';

    public function __construct() {
        $this->conn = $this->getConnect();
    }

    
    public function register($data)
    {
        try{
            $sql = "INSERT INTO {$this->table} (name, email, password, role) VALUES (:name, :email, :password, 'user')";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $pre->bindParam(':email', $data['email'], PDO::PARAM_STR);
            $pre->bindParam(':password', $data['password'], PDO::PARAM_STR);
            return $pre->execute();
        }catch(Exception $e){  
            die("Error home->register() " . $e->getMessage());
        }
    }
}

?>