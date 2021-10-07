<?php 

class PostReviewModel extends Database{
    private $table = 'post_reviews';

    public function __construct() {
        parent::getConnect();
    }

    public function index()
    {
        try{
            $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
            $rs = $this->query($sql);
            return $rs;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function store($data)
    {
        try{
            $sql = "INSERT INTO {$this->table} (name, rating, review, created_at) VALUES (:name, :rating, :review, :created_at)";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(':name', $data['name'], PDO::PARAM_STR);
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