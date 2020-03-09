<?php

namespace App\Models;
use App\Models\Database as Database;

include_once "Database.php";

    class User 
    {
        private $db; 
        protected $username;
        protected $email;

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
                $this->username = htmlspecialchars($data["name"]);
                $this->email = htmlspecialchars($data["email"]);
                $sql = "INSERT INTO users(username, email, password) VALUES (:username, :email, :password)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue("username", $this->username, FILTER_SANITIZE_STRING);
                $stmt->bindValue("email", $this->email, FILTER_SANITIZE_STRING);
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

        public function setUserName($user_name) {

            $this->username = trim($user_name);
        }

        public function getUserName() {
            
            return $this->username;
        }

        public function setEmail($email) {
            $this->email = trim($email);
        }

        public function getEmail() {
            return $this->email;
        }

        public function getEmailVariables() {
            return [
                'user_name' => $this->getUserName(),
                'email' => $this->getEmail()
            ];
        }
    }
?>

