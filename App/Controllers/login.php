<?php

require "../Models/User.php";
use App\Models\User as User;

$email = $password = "";

if (isset($_POST["login"])) {
    //get vars
    $email = $_POST["email"];
    $password = $_POST["password"];
  
    $data = ["email" => $email, "password" => $password];
    $user = new User();
    $user->login($email,$password);
}

?>