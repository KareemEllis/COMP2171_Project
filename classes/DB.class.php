<?php

class DB {
    private $host = 'db4free.net';
    private $username = 'swenstar';
    private $password = 'ihatecomsci123';
    private $dbname = 'georgealleyne';

    public function connect() {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4", $this->username, $this->password);

        return $conn;
    }
 
    public function checkConnection($conn){
        if ($conn === false){
            die("ERROR: Could not connect.");
            return true;
        }
        return true;
    }

    
}