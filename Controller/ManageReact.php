
    <?php
    require_once 'Database.php';
    class ManageReact
    {
       /* public function addReact($videoID, $userID, $reactType)
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
        }*/
        private function deleteReact($videoID, $userID) {
            $database = new Database();
            $conn = $database->getConn();

            $deleteQuery = "DELETE FROM lookup WHERE UserID='$userID' AND VideoID='$videoID'";
            if ($conn->query($deleteQuery) === TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error: " . $deleteQuery . "<br>" . $conn->error;
            }

            $conn->close();
        }
        private function addNewReact($videoID, $userID, $reactType) {
            $database = new Database();
            $conn = $database->getConn();

            $addQuery = "INSERT INTO lookup VALUES ('$videoID','$userID','$reactType')";
            if ($conn->query($addQuery) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $addQuery . "<br>" . $conn->error;
            }

            $conn->close();
        }
        private function checkIfReactExists($videoID, $userID) {
            $database = new Database();
            $conn = $database->getConn();

            $checkQuery = "SELECT * FROM lookup WHERE UserID='$userID' AND VideoID='$videoID'";
            $result = $conn->query($checkQuery);

            $conn->close();

            return $result->num_rows > 0;
        }
        private function updateReact($videoID, $userID, $reactType) {
            $database = new Database();
            $conn = $database->getConn();

            $updateQuery = "UPDATE lookup SET ReactType='$reactType' WHERE UserID='$userID' AND VideoID='$videoID'";
            if ($conn->query($updateQuery) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . $updateQuery . "<br>" . $conn->error;
            }

            $conn->close();
        }
        public function toggleReact($videoID, $userID, $reactType) {
            $recordExists = $this->checkIfReactExists($videoID, $userID);

            if ($recordExists) {
                $existingReactTypeQuery = "SELECT ReactType FROM lookup WHERE UserID='$userID' AND VideoID='$videoID'";
                $database = new Database();
                $conn = $database->getConn();
                $result = $conn->query($existingReactTypeQuery);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $existingReactType = $row["ReactType"];

                    if ($existingReactType == $reactType) {
                        $this->deleteReact($videoID, $userID);
                    } else {
                        $this->updateReact($videoID, $userID, $reactType);
                    }
                }

                $conn->close();
            } else {
                $this->addNewReact($videoID, $userID, $reactType);
            }
        }
    }
