<?php
    include_once "Database.php";

    use \PDO;

    class User 
    {
        private $db; 

        public function __construct()
        {
            $obj = new Database();
            $this->db = $obj->pdo;
        }

        public function createUser()
        {
            
        }

        public function login()
        {

        }
    }
?>

