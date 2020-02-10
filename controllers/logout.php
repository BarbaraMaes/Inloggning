<?php

require "../classes/User.php";


if(isset($_POST["logout"]))
{

    /*$user = new User();
    $user->login($email,$password);*/

    User::logout();
}

?>