<?php

require_once 'ConfigDB.php';
        
class DB_Connect {
 
    var $mysqli;
    
    function __construct() {
         
    }
 
    function __destruct() {
    }
 
    public function connect() {
        
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        return $this->mysqli;
        
    }
 
    public function close() {
        mysqli_close($this->mysqli);
    }
 
}
 
?>
