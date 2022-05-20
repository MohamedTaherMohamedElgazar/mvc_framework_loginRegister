<?php

class Database {
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;

    // for preparing statements
    private $dbStatement;
    // for using statements
    private $dbHandler;
    // for handling errors
    private $dbError;

    // creating construct method that handle all of these by try&catch through PDO
    public function __construct() {
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
        $options = array(
            // for cashing
            PDO::ATTR_PERSISTENT => true,
            // for errors
            PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // try&catch PDO
        try {
            // instaniate PDO 
            $this->dbHandler = new PDO($conn,$this->dbUser,$this->dbPass,$options);
        }catch (PDOException $e) {
            $this->dbError = $e->getMessage();
            echo $this->dbError;
        }
    }

    // wriring queries
    public function query($sql){
        // prepare statement
        $this->statement = $this->dbHandler->prepare($sql);
    }

    public function bind($parameter,$value,$type = null){
        // bind parameters to values
        switch(is_null($type)){
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type =PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($parameter,$value,$type);
    }


    public function execute(){
        // excute
        return $this->statement->execute();
    }

    public function result(){
        // result array
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }


    public function singleResult(){
        // just one row
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }


    public function rowCount(){
        // counting row
        return $this->statement->rowCount();
    }
}



?>