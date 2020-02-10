<?php

require "../Models/User.php";

$name = $email = $password = $confirm = "";

if (isset($_POST["register"])) {
  //get vars
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirm = $_POST["confirm"];

  $data = ["name" => $name, "email" => $email, "password" => $password, "confirm" => $confirm];

  $user = new User();
  $user->createUser($data);
}

?>