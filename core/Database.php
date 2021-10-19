<?php 

    class Database{
        private $host = 'localhost';
        private $username = 'keira';
        private $password = 'Keira@296';
        private $dbname = 'blogat';

        // public $conn = null;
        protected static $instance;
        
        public function getConnect() {
            try {
                if (empty(self::$instance)) {
                    self::$instance = new PDO(
                        "mysql:host=$this->host;dbname=$this->dbname","$this->username","$this->password",
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                                PDO::MYSQL_ATTR_FOUND_ROWS => true)
                    );
                    // echo 'haha';
                }
                return self::$instance;
            } catch (Exception $e) {
                echo die('err :'. $e->getMessage());
            }
            
        }

        protected function query($sql){
            $pre = $this->getConnect()->prepare($sql);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>