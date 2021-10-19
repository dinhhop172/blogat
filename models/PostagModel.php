<?php 

class PostagModel extends Database{
    private $table = 'post_tags';

    public $conn;

    public function __construct() {
        $this->conn = $this->getConnect();
    }

    public function index()
    {
        try{
            $sql = "SELECT * FROM {$this->table}";
            $rs = $this->query($sql);
            return $rs;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function store($post_id, $tag_id){
        try{
            $sql = "INSERT INTO {$this->table} (post_id, tag_id) VALUES (:post_id, :tag_id)";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(':post_id', $post_id, PDO::PARAM_INT);
            $pre->bindParam(':tag_id', $tag_id, PDO::PARAM_INT);
            $result = $pre->execute();
            return $result;
        }catch(Exception $e){
            die("Error postag->store() " . $e->getMessage());
        }
    }
    
}
?>