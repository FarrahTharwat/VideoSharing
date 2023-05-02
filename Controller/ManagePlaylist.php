<?php
include 'CRUD.php';
include 'Database.php';
include'../Model/Playlist.php';
include'../Model/user.php';
include'../Model/Video.php';

/**
 * Summary of ManagePlaylist
 */
class ManagePlaylist implements CRUD{
    /**
     * Summary of create
     * @param mixed $Playlist
     * @return void
     */
    //Till we finish the front, dont forget the add and remove (can implement the function multiple times?)
    function create($Playlist){
        //Get database connection
        $database = new Database();
        $conn = $database->getConn();
       
        $PlaylistName = $Playlist->getPlaylistName();
        $userID = $Playlist->getuserID();
        $videoID = $Playlist->getvideoID();
        $numOfVideosPlaylist = 1;
        $description = $Playlist->getDescription();
        $query = "INSERT INTO playlist (name, UserID, numOfVideos,Description) VALUES ('$PlaylistName', '$userID', '$numOfVideosPlaylist','$description')";
        $PlaylistID = $Playlist->getPlaylistID();  
        $query1 = "INSERT INTO videoplaylist (VideoID, PlaylistID) VALUES ('$videoID', '$PlaylistID')";
        // Execute the query
        if ($conn->query($query) === TRUE || $conn->query($query1) === TRUE )  {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
    /**
     * Summary of delete
     * @param mixed $id
     * @return void
     */
    public function delete($id){
     // TODO: Implement delete() method.
     $database = new Database();
     $conn = $database->getConn();

     $query="DELETE FROM playlist where ID = '$id'";
     $query1 = "DELETE FROM videoplaylist where PlaylistID = '$id'";

     if ($conn->query($query) === TRUE || $conn->query($query1) === TRUE) {
         echo "Playlist Deleted successfully";
     } else {
         echo "Error: " . $query . "<br>" . $conn->error;
     }
    }
    /**
     * Summary of retrive
     * @param mixed $id
     * @return void
     */
    public function retrive($id)
    {
     // TODO: Implement retrive() method.
    }
    /**
     * Summary of update
     * @param mixed $Playlist
     * @return void
     */
    public function update($Playlist){
     // TODO: Implement update() method. 
    }
}