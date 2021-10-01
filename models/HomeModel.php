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

    public function finPostByCate($id)
    {
        try{
            $sql = "SELECT posts.* FROM posts INNER JOIN categories 
                    ON posts.cat_id = categories.id
                    WHERE categories.id = ?";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam('1', $id, PDO::PARAM_INT);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){  
            die("Error home->findPost() " . $e->getMessage());
        }
    }

    public function getNameCate($id)
    {
        try{
            $sql = "SELECT categories.name FROM categories WHERE categories.id = ?";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam('1', $id, PDO::PARAM_INT);
            $pre->execute();
            return $pre->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){  
            die("Error home->findPost() " . $e->getMessage());
        }
    }
    
    public function getPost($id)
    {
        try{
            $sql = "SELECT * FROM posts WHERE posts.id = ?";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam('1', $id, PDO::PARAM_INT);
            $pre->execute();
            return $pre->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){  
            die("Error home->findPost() " . $e->getMessage());
        }
    }
}

?>