<?php

class Database {

    private $host = "localhost"; 
    private $user = "root";
    private $password = "1234";
    private $dbname = "inloggning";

    public $pdo;

    /*private $pdo; 
    private $error; 
    private $stmt; */

    public function __construct(){
        //Set DSN 
        $dsn = 'mysql:host=' . $this->host. ';dbname='. $this->dbname;
        //Set Options 
        $options = array(
            PDO::ATTR_PERSISTENT => true, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // new PDO instance 
        try{
            $this->pdo = new PDO($dsn, $this->user, $this->password, $options);
        }catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }

    /*public function query($sql){
        $this->stmt = $this->pdo->prepare($sql);
    }

    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value): 
                    $type = PDO::PARAM_INT;
                break; 

                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break; 

                case is_null($value): 
                    $type = PDO::PARAM_NULL;
                break; 

                default: 
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function resultset(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }*/
}

?>