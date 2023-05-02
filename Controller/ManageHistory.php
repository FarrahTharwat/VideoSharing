<?php
include 'CRUD.php';
include 'Database.php';
include'../Model/Playlist.php';
include'../Model/Video.php';
include'../Model/User.php';
include'../Model/History.php';

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
 
         $query="DELETE FROM History where UserID = '$userID'";
 
         if ($conn->query($query) === TRUE) {
             echo "History Deleted successfully";
         } else {
             echo "Error: " . $query . "<br>" . $conn->error;
         }
     }
    /**
     * Summary of retrive
     * @param mixed $id
     * @return void
     */
    public function retrive($id){
     // TODO: Implement retrive() method.
         

    }
    /**
     * Summary of update
     * @param mixed $videoID
     * @return void
     */
    public function update($History){
     // TODO: Implement update() method. 
         $database = new Database();
         $conn = $database->getConn();
         $userID = $History->getUserID();
         $videoID = $History->getVideoID();
         $query= "DELETE FROM History where VideoID  = '$videoID' and UserID = '$userID'";
         if ($conn->query($query) === TRUE) {
            echo "Video Deleted successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
}