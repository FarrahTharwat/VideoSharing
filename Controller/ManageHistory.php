
<?php
require_once 'CRUD.php';
require_once 'Database.php';
require_once '../Model/Video.php';
require_once '../Model/User.php';
require_once '../Model/History.php';

/**
 * Summary of ManageHistory
 */
class ManageHistory implements CRUD{
    /**
     * Summary of create
     * @param mixed $History
     * @return void
     */
    //Till we finish the front, dont forget the add and remove (can implement the function multiple times?)
    function create($History){
        //Get database connection
        //theres no creation of history
    }
    function update($History){

    }
    /**
     * Summary of delete
     * @param mixed $userID
     * @return void
     */
    public function delete($userID){
     // TODO: Implement delete() method.
     // delete -> deletes all history
         $database = new Database();
         $conn = $database->getConn();
 
         $query="DELETE FROM history where UserID = '$userID'";
 
         if ($conn->query($query) === TRUE) {
             echo "History Deleted successfully";
         } else {
             echo "Error: " . $query . "<br>" . $conn->error;
         }
     }
    /**
     * Summary of retrive
     * @param mixed $id
     * @return array
     */
    public function retrive($UserID){
     // TODO: Implement retrive() method.
        $database = new Database();
        $conn = $database->getConn();

        $query = "SELECT*
        FROM video
        inner join history
        on video.ID = history.VideoID
        where history.UserID = '$UserID'";
        $result = $conn->query($query);
        $theHistory = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $video = new Video(
                   $ID =  $row['ID'],
                   $Title= $row['Title'],
                   $Category= $row['Category'],
                   $Description = $row['Description'],
                   $Thumbnail = $row['ThumbNail'],
                   $Date = $row['Date'],
                   $Status = $row['Status'],
                   $Views = $row['Views'],
                   $Url = $row['URL'],
                   $USERID = $UserID

                );

                $history = new History(
                    $WatchDate = $row['WatchDate'],
                    $ElapsedTime = $row['ElapsedTime'],
                    $UID = $UserID
                );
                $arr = array(
                    'history' => $history,
                    'video' => $video
                );
                array_push($theHistory,$arr);
            }
        }
            $conn->close();
            return $theHistory;

    }
    /**
     * Summary of update
     * @param mixed $videoID
     * @return void
     */
    public function updateH($videoID,$userID){
     // TODO: Implement update() method. 
    
         $database = new Database();
         $conn = $database->getConn();
         $query= "INSERT INTO `history` (VideoID, UserID, WatchDate,ElapsedTime) VALUES ('$videoID','$userID',current_timestamp(),'300') ON DUPLICATE KEY UPDATE `WatchDate` = current_timestamp()";
         if ($conn->query($query) === TRUE) {
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
    public function remove($userID,$videoID){
        $database = new Database();
        $conn = $database->getConn();
        $query = "Delete FROM history where VideoID = '$videoID' and UserID='$userID'";
        if ($conn->query($query) === TRUE) {
            echo "Video removed!";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
        $conn->close();
    }
}