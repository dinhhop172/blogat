<?php


class UserModel extends Database
{
    private $table = 'users';
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
    public function store($data){
        try{
            $sql = "INSERT INTO {$this->table} (name, email, password, role) VALUES(?, ?, ?, ?)";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(1, $data['name'], PDO::PARAM_STR);
            $pre->bindParam(2, $data['email'], PDO::PARAM_STR);
            $pre->bindParam(3, $data['password'], PDO::PARAM_STR);
            $pre->bindParam(4, $data['role'], PDO::PARAM_STR);
            return $pre->execute();
        }catch(Exception $e){
            die("Error User->store() " . $e->getMessage());
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

    public function update($data){
        try {
            $sql = "UPDATE {$this->table} SET name = ?, email = ?, role = ? WHERE id = ?";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(1, $data['name'], PDO::PARAM_STR);
            $pre->bindParam(2, $data['email'], PDO::PARAM_STR);
            $pre->bindParam(3, $data['role'], PDO::PARAM_STR);
            $pre->bindParam(4, $data['id'], PDO::PARAM_INT);
            return $pre->execute();
        } catch (Exception $e) {
            die("Error User->update() " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = ?";
            $pre = $this->conn->prepare($sql);
            $pre->bindParam(1, $id, PDO::PARAM_INT);
            return $pre->execute();
        } catch (Exception $e) {
            die("Error User->delete() " . $e->getMessage());
        }
    }
}