<?php

class Database {
    // Database connection configuration
    private $host = 'localhost';
    private $username = 'lawsjgfe_hamzaadnan';
    private $password = 'qwerty@hamza123adnan';
    private $database = 'lawsjgfe_cmslawyer';
    

    // Database connection
    private $conn;

    // Establish the database connection
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die('Database connection failed: ' . $this->conn->connect_error);
        }
    }

    // Execute a database query
    public function query($sql) {
        return $this->conn->query($sql);
    }

    // Get the last inserted ID
    public function getLastInsertedId() {
        return $this->conn->insert_id;
    }

    public function real_escape_string($string) {
        return mysqli_real_escape_string($this->conn, $string);
    }

    
}
?>
