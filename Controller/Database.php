<?php

class Database
{
    private $host;
    private $username;
    private $password;
    private $database;
    private  $conn;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'video_sharing';

        // Create connection
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * @return mysqli
     */
    public  function getConn(): mysqli
    {
        return $this->conn;
    }
}