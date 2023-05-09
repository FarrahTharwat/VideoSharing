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
    function name($userID){
        $database = new Database();
        $conn = $database->getConn();
        $query = "SELECT Name FROM user WHERE ID ='$userID'";
        $result = $conn->query($query);
        $result = mysqli_fetch_assoc($result);
        return $result['Name'];
     }


     function searchVideos($searchQuery) {
        // Define the MySQL SELECT statement to retrieve the relevant videos
        $query = "SELECT ID, ThumbNail, Title, URL , Category , Description , Date ,Views ,UserID FROM video WHERE Title LIKE '%$searchQuery%'";
        
        // Execute the query and retrieve the results as an array
        $result = $this->conn->query($query);
        $videos = $result->fetch_all(MYSQLI_ASSOC);
        
        // Return the search results
        return $videos;
     }

     public function getNotificationsForCurrentUser() {
        $userID = $_SESSION['userID'];
        $notificationsQuery = "SELECT * FROM notification WHERE UserID = $userID ORDER BY ID desc LIMIT 5";
        $notificationsResult = $this->conn->query($notificationsQuery);
    
        $notifications = [];
        if ($notificationsResult->num_rows > 0) {
          while ($row = $notificationsResult->fetch_assoc()) {
            $notificationID = $row['ID'];
            $notificationContent = $row['Content'];
            $notificationURL = "notification.php?id=$notificationID";
            $notifications[] = [
              'id' => $notificationID,
              'content' => $notificationContent,
              'url' => $notificationURL,
            ];
          }
        }
        return $notifications;
      }
    }
     


