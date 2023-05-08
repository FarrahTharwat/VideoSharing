    <?php
    include 'Database.php';
    class ManageReact
    {
        public function addReact($videoID, $userID, $reactType)
        {
            $database = new Database();
            $conn = $database->getConn();

            $query = "INSERT INTO lookup values ('$videoID','$userID','$reactType')";
            if ($conn->query($query) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
            }

            // Close the database connection
            $conn->close();
        }
        public function deleteReact($videoID, $userID)
        {
            $database = new Database();
            $conn = $database->getConn();

            $query = "DELETE FROM lookup WHERE UserID='$userID' and VideoID='$videoID'";
            if ($conn->query($query) === TRUE) {
                echo "record Deleted successfully";
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
            }

            // Close the database connection
            $conn->close();
        }
    }
$manage= new ManageReact();
     echo "wokring";

