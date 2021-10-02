<?php 

class HomeModel  extends Database{
    public $conn;
    private $table = 'users';
    private $posts = 'posts';

    public function __construct() {
        $this->conn = $this->getConnect();
    }

    public function index(){
        try{
            $sql = "SELECT * FROM {$this->posts} WHERE {$this->posts}.status = 'active'";
            $result = $this->query($sql);
            return $result;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    

    public function cates()
    {
        try{
            $sql = "SELECT categories.* FROM `categories` INNER JOIN posts
                    ON categories.id = posts.cat_id AND posts.status = 'active'
                    GROUP BY categories.id";
                    $result = $this->query($sql);
                    return $result;
        }catch(Exception $e){
            die($e->getMessage());
        }
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
            $sql = "SELECT {$this->posts}.* FROM {$this->posts} INNER JOIN categories 
                    ON {$this->posts}.cat_id = categories.id
                    WHERE categories.id = ? AND {$this->posts}.status = 'active'";
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
            $sql = "SELECT * FROM {$this->posts} WHERE {$this->posts}.id = ?";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam('1', $id, PDO::PARAM_INT);
            $pre->execute();
            return $pre->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){  
            die("Error home->findPost() " . $e->getMessage());
        }
    }

    public function searchPost($data)
    {
        try{
            $sql = "SELECT {$this->posts}.* FROM {$this->posts} WHERE ({$this->posts}.status = 'active') AND ({$this->posts}.title LIKE '%$data%' OR {$this->posts}.content LIKE '%$data%')";
            $pre = $this->conn->prepare($sql);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){  
            die("Error home->searchPost() " . $e->getMessage());
        }
    }
    public function popular()
    {
        try{
            $sql = "SELECT * FROM {$this->posts} WHERE {$this->posts}.status = 'active' ORDER BY {$this->posts}.id DESC LIMIT 3 ";
            $pre = $this->conn->prepare($sql);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){  
            die("Error home->searchPost() " . $e->getMessage());
        }
    }
}

?>