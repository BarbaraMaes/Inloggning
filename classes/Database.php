<?php

class Database {

    private $host = "localhost"; 
    private $user = "root";
    private $password = "1234";
    private $dbname = "inloggning";

    private $dbh; 
    private $error; 
    private $stmt; 

    public function __construct(){
        //Set DSN 
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";
        //Set Options 
        $options = array(
            PDO:ATTR_PERSISTENT => true, 
            PDO:ATTR_ERRMOTDE => PDO::ERRMODE_EXCEPTION
        );
        // new PDO instance 
        try{

        }catch(){
            
        }
    }

}

?>