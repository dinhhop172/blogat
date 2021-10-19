<?php 

class PostModel extends Database{

    private $table = 'posts';
    public $conn;

    public function __construct() {
        $this->conn = $this->getConnect();
    }

    public function index(){
        try{
            $sql = "SELECT * FROM {$this->table}";
            $result = $this->query($sql);
            return $result;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function store($data)
    {
        try{
            $sql = "INSERT INTO {$this->table} (cat_id, user_id, title, img, slug, content, status) VALUES (?, ?, ?, ?, ?, ?, 'inactive')";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(1, $data['cat_id'], PDO::PARAM_INT);
            $pre->bindParam(2, $data['user_id'], PDO::PARAM_INT);
            $pre->bindParam(3, $data['title'], PDO::PARAM_STR);
            $pre->bindParam(4, $data['img'], PDO::PARAM_STR);
            $pre->bindParam(5, $data['slug'], PDO::PARAM_STR);
            $pre->bindParam(6, $data['content'], PDO::PARAM_STR);
            $result = $pre->execute();
            return $result;
        }catch(Exception $e){
            die("Error post->store() " . $e->getMessage());
        }
    }

    public function find($id)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id = ?";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(1, $id, PDO::PARAM_INT);
            $pre->execute();
            return $pre->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update($data)
    {
        try{
            $sql = "UPDATE {$this->table} SET cat_id=?, user_id=?, title=?, img=?, slug=?, content=?, status=? WHERE id=?";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(1, $data['cat_id'], PDO::PARAM_INT);
            $pre->bindParam(2, $data['user_id'], PDO::PARAM_INT);
            $pre->bindParam(3, $data['title'], PDO::PARAM_STR);
            $pre->bindParam(4, $data['img'], PDO::PARAM_STR);
            $pre->bindParam(5, $data['slug'], PDO::PARAM_STR);
            $pre->bindParam(6, $data['content'], PDO::PARAM_STR);
            $pre->bindParam(7, $data['status'], PDO::PARAM_STR);
            $pre->bindParam(8, $data['id'], PDO::PARAM_INT);
            $result = $pre->execute();
            return $result;
        }catch(Exception $e){
            die("Error post->update() " . $e->getMessage());
        }
    }

    public function showByCate($id)
    {
        try {
            // $sql = "SELECT posts.* FROM posts INNER JOIN categories ON posts.cat_id = categories.id
            // WHERE categories.id = ? AND posts.status = 'active'";
            $sql = "SELECT posts.* FROM categories INNER JOIN posts ON categories.id = posts.cat_id 
            WHERE categories.id = ?";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(1, $id, PDO::PARAM_INT);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die("loi: " . $e->getMessage());
        }
    }

    public function delete($id){
        try{
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(':id', $id, PDO::PARAM_INT);
            return $pre->execute();
        }catch(Exception $e){
            die("Error post->delete() " . $e->getMessage());
        }
    }
}

?>