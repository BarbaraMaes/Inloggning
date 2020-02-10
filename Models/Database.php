<?php

require_once '../vendor/autoload.php';

class Database 
{
    public $pdo;

    function __construct()
    {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $host = getenv("DB_HOST");
        $user = getenv("DB_USER");
        $password = getenv("DB_PASSWORD");
        $dbname = getenv("DB_DBNAME");

        //Set DSN 
        $dsn = 'mysql:host=' . $host. ';dbname='. $dbname;
        //Set Options 
        $options = array(
            PDO::ATTR_PERSISTENT => true, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // new PDO instance 
        try {
            $this->pdo = new PDO($dsn, $user, $password, $options);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }
}

?>