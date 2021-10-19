<?php 

class TagModel extends Database{
    private $table = 'tags';
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

    public function store($name)
    {
        try{
            $sql = "INSERT INTO {$this->table} (name) VALUES (:name)";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(':name', $name, PDO::PARAM_STR);
            $pre->execute();
            return $pre;
        }catch(Exception $e){
            die("Error tag->store() " . $e->getMessage());
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
            $sql = "UPDATE {$this->table} SET name=?, where id=?";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(1, $data['name'], PDO::PARAM_STR);
            $pre->bindParam(2, $data['id'], PDO::PARAM_INT);
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
            die("Error tag->delete() " . $e->getMessage());
        }
    }

    public function deleteWithName($name){
        try{
            $sql = "DELETE FROM {$this->table} WHERE name = :name";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(':name', $name, PDO::PARAM_STR);
            return $pre->execute();
        }catch(Exception $e){
            die("Error tag->delete() " . $e->getMessage());
        }
    }

    public function selectIdByName($name)
    {
        try {
            $sql = "SELECT id FROM {$this->table} WHERE name = ?";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(1, $name, PDO::PARAM_STR);
            $pre->execute();
            return $pre->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function checkNameExist($name){
        try{
            $sql = "SELECT name FROM {$this->table} WHERE name = :name";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(':name', $name, PDO::PARAM_STR);
            return $pre->execute();
        }catch(Exception $e){
            die("Error tag->delete() " . $e->getMessage());
        }
    }

    public function countId($num)
    {
        try{
            $sql = "SELECT {$this->table}.id FROM {$this->table} ORDER BY {$this->table}.id DESC LIMIT ?";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam('1', $num, PDO::PARAM_INT);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>