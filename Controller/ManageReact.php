<<<<<<< Updated upstream
    <?php
    require_once 'Database.php';
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
        public function toggleReact($videoID, $userID, $reactType)
        {
            $database = new Database();
            $conn = $database->getConn();

            // Check if the record already exists
            $checkQuery = "SELECT * FROM lookup WHERE UserID='$userID' AND VideoID='$videoID'";
            $result = $conn->query($checkQuery);

            if ($result->num_rows > 0) {
                // If the record exists, delete it
                $deleteQuery = "DELETE FROM lookup WHERE UserID='$userID' AND VideoID='$videoID'";
                if ($conn->query($deleteQuery) === TRUE) {
                    echo "Record deleted successfully";
                } else {
                    echo "Error: " . $deleteQuery . "<br>" . $conn->error;
                }
            } else {
                // If the record doesn't exist, add it
                $addQuery = "INSERT INTO lookup VALUES ('$videoID','$userID','$reactType')";
                if ($conn->query($addQuery) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $addQuery . "<br>" . $conn->error;
                }
            }

            // Close the database connection
            $conn->close();
        }
    }
