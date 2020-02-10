<?php

require "../Models/User.php";


if (isset($_POST["logout"])) {
    User::Logout();
}

?>