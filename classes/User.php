<?php
    include_once "Database.php";


    class User 
    {
        private $db; 

        public function __construct()
        {
            $obj = new Database();
            $this->db = $obj->pdo;
        }

        public function createUser($data)
        {
            //passwords match
            if($data["password"] != $data["confirm"])
            {
                $_SESSION["Error"] = "Passwords don't match"; 
                echo "passwords don't match";
                return;
            }
            else 
            {
                //passwords match -> create user
                $sql = "INSERT INTO users(username, email, password) VALUES (:username, :email, :password)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue("username", htmlspecialchars($data["name"], FILTER_SANITIZE_STRING));
                $stmt->bindValue("email", htmlspecialchars($data["email"], FILTER_SANITIZE_STRING));
                $stmt->bindValue("password", htmlspecialchars($data["password"], FILTER_SANITIZE_STRING));
                $stmt->execute();

                header("Location: ../views/login.php");
            }
        }

        public function login()
        {

        }
    }
?>

