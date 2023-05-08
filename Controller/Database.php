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
    public function closeConnection()
    {
        if ($this->conn !== null) {
            $this->conn->close();
            $this->conn = null;
        }
    }
     
    public function insert($qry)
    {
        $result=$this->conn->query($qry);
        if(!$result)
        {
            echo "Error ".mysqli_error($this->conn);
            return false;
        }
        else 
        {
           return $this->conn->insert_id;
        }

    }
    public function select($qry)
    {
        $result = $this->conn->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->conn);
            return false ;
        }
        else
        {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    
    }





}