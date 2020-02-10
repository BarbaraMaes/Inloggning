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
            if ($data["password"] != $data["confirm"]) {
                $_SESSION["Error"] = "Passwords don't match"; 
                return;
            }
            else {
                //check if user exits 
                $sql = "SELECT * FROM users WHERE email = :email";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue("email", htmlspecialchars($data["email"]), FILTER_SANITIZE_STRING);
                $stmt->execute();
                $user = $stmt->fetch();
                
                if ($user) {
                    $_SESSION["Exists"] = "User already exists"; 
                    return;
                }
                //hash password 
                $hash = password_hash($data["password"], PASSWORD_DEFAULT);

                //passwords match -> create user
                $sql = "INSERT INTO users(username, email, password) VALUES (:username, :email, :password)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue("username", htmlspecialchars($data["name"], FILTER_SANITIZE_STRING));
                $stmt->bindValue("email", htmlspecialchars($data["email"], FILTER_SANITIZE_STRING));
                $stmt->bindValue("password", $hash, FILTER_SANITIZE_STRING);
                $stmt->execute();

                header("Location: ../views/login.php");
            }
        }

        public function login($email, $password)
        {
            //find the user 
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue("email", htmlspecialchars($email), FILTER_SANITIZE_STRING);
            $stmt->execute();
            $user = $stmt->fetch();

            //if user doesn't exist -> redirect to register
            if (!$user) {
                $_SESSION["Exists"] = "User doesn't exist. Please register first";
                //echo "user doesn't exist Please register first";
                return;
            }

            //check password
            if (password_verify($password, $user["password"])) {
                session_start();
                $_SESSION["auth"] = $user;
                header("Location: ../views/home.php");
                
            } else {
                $_SESSION["pwd"] = "Password Incorrect";
            }
        }

        public static function Logout()
        {
            //unset session 
            session_unset();

            //redirect to login
            header("Location: ../views/login.php");
        }
    }
?>

