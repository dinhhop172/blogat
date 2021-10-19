<?php 

class PostReviewModel extends Database{
    private $table = 'post_reviews';

    public $conn;

    public function __construct() {
        $this->conn = $this->getConnect();
    }

    public function index($id)
    {
        try{
            // $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
            $sql = "SELECT {$this->table}.id, {$this->table}.post_id, {$this->table}.name, {$this->table}.rating, {$this->table}.review, {$this->table}.created_at FROM {$this->table} right JOIN posts
            ON {$this->table}.post_id = posts.id
            WHERE posts.id = :id ORDER BY post_reviews.id DESC";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(':id', $id, PDO::PARAM_INT);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
            // $rs = $this->query($sql);
            // return $rs;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function store($data)
    {
        try{
            $sql = "INSERT INTO {$this->table} (name, post_id, rating, review, created_at) VALUES (:name, :post_id, :rating, :review, :created_at)";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $pre->bindParam(':post_id', $data['post_id'], PDO::PARAM_INT);
            $pre->bindParam(':rating', $data['rating'], PDO::PARAM_INT);
            $pre->bindParam(':review', $data['review'], PDO::PARAM_STR);
            $pre->bindParam(':created_at', $data['created_at'], PDO::PARAM_INT);
            return $pre->execute();
        }catch(Exception $e){  
            die("Error review->store() " . $e->getMessage());
        }
    }
}
?>