<?php
    require "classes/Database.php";

    $db = new Database();

    $db->query("SELECT * FROM users WHERE id = :id");
    $db->bind(":id", 1);
    $rows = $db->resultset();
    print_r($rows);

?>