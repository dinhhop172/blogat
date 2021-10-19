<?php 

class CategoryModel extends Database{
    private $table = 'categories';
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

    public function store($data)
    {
        try{
            $sql = "INSERT INTO {$this->table} (name, slug) VALUES (:name, :slug)";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $pre->bindParam(':slug', $data['slug'], PDO::PARAM_STR);
            $result = $pre->execute();
            return $result;
        }catch(Exception $e){
            die("Error cate->store() " . $e->getMessage());
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
        try {
            $sql = "UPDATE {$this->table} SET name=?, slug=? where id=?";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(1, $data['name'], PDO::PARAM_STR);
            $pre->bindParam(2, $data['slug'], PDO::PARAM_STR);
            $pre->bindParam(3, $data['id'], PDO::PARAM_INT);
            return $pre->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function delete($id){
        try{
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            // $sql = "DELETE categories, posts FROM {$this->table}  INNER JOIN posts
            //         ON categories.id = posts.cat_id
            //         WHERE categories.id = :id";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(':id', $id, PDO::PARAM_INT);
            return $pre->execute();
        }catch(Exception $e){
            die("Error cate->delete() " . $e->getMessage());
        }
    }
}
?>