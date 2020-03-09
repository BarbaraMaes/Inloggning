<?php

require "../Models/User.php";
use App\Models\User as User;


if (isset($_POST["logout"])) {
    User::Logout();
}

?>