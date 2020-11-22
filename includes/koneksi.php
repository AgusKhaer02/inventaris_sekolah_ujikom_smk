<?php

class PDOConnection{
    private $dns;
    private $user;
    private $pass;

    public function getConn(){
        $this->dns = "mysql:host=localhost;dbname=116170352";
        $this->user = "root";
        $this->pass = "";
        
        try{
            $conn = new PDO($this->dns, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $ex){
            die("Error : ".$ex->getMessage());
        }
    }
}
?>