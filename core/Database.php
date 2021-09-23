<?php 

    class Database{
        private $host = 'localhost';
        private $username = 'keira';
        private $password = 'Keira@296';
        private $dbname = 'blogat';

        public $conn;
        // private static $instance;
        
        public function getConnect() {
            try {
                if (empty($this->conn)) {
                    $this->conn = new PDO(
                        "mysql:host=$this->host;dbname=$this->dbname","$this->username","$this->password",
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                    );
                }
            } catch (Exception $e) {
                echo die('err :'. $e->getMessage());
            }
            return $this->conn;
        }

        protected function query($sql){
            $pre = $this->conn->prepare($sql);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>