<?php
include 'CRUD.php';
include 'Database.php';
include '../Model/Playlist.php';
include '../Model/User.php';
include '../Model/Video.php';
include '../Model/VideoPlaylist.php';
include '../Controller/AuthController.php';
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
     $database = new Database();
     $conn = $database->getConn();

     $query="DELETE FROM playlist where ID = '$id'";
    // $query1 = "DELETE FROM videoplaylist where PlaylistID = '$id'";

     if ($conn->query($query) === TRUE) {
         echo "Playlist Deleted successfully";
     } else {
         echo "Error: " . $query . "<br>" . $conn->error;
     }
     $conn->close();
    }
    /**
     * Summary of retrive
     * @param mixed $id
     * @return void
     */
    public function retrive($PlaylistID){
        $database = new Database();
        $conn = $database->getConn();
        $query = "SELECT*
        FROM playlist
        inner join videoplaylist
        on playlist.ID = videoplaylist.PlaylistID
        inner join video 
        on videoplaylist.VideoID = video.ID
        where playlist.ID = '$PlaylistID'";
        $result = $conn->query($query);
        $thePlaylist = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $video = new Video(
                   $row['ID'],
                   $row['Title'],
                   $row['Category'],
                   $row['Description'],
                   $row['ThumbNail'],
                   $row['Date'],
                   $row['Status'],
                   $row['Views'],
                   $row['URL'],
                   $row['ID']
                );

                $playlist = new Playlist(
                    $row['ID'],
                   $row['numOfVideos'],
                   $row['name'],
                   $row['UserID'],
                );

                $videoPlaylist = new VideoPlaylist(
                   $row['VideoID'],
                   $row['PlaylistID']
                );
                
                $arr = array(
                    'playlist' => $playlist,
                    'videoplaylist' => $videoPlaylist,
                    'video' => $video
                );

                array_push($thePlaylist,$arr);
                
    }
}
    $conn->close();
    return $thePlaylist;
}  
    /**
     * Summary of update
     * @param mixed $Playlist
     * @return void
     */
    public function update($Playlist){
     // TODO: Implement update() method. 
        $database = new Database();
        $conn = $database->getConn();

        $PlaylistID = $Playlist->getPlaylistID();
        $numOfVideosPlaylist = $Playlist->getNumOfVideosPlaylist();
        $PlaylistName = $Playlist->getPlaylistName();
        $description = $Playlist->getDescription();
        $userID = $Playlist->getUserID();

        $query = "UPDATE Playlist SET numOfVideos='$numOfVideosPlaylist', Description='$description', name='$PlaylistName',UserID='$userID' WHERE ID='$PlaylistID'";
        if ($conn->query($query) === TRUE) {
            echo "Updated successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
public function remove($playlistID,$videoID){
    $database = new Database();
    $conn = $database->getConn();
    $query = "Delete FROM videoplaylist where VideoID = '$videoID' and PlaylistID='$playlistID'";
    if ($conn->query($query) === TRUE) {
        echo "Video removed!";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
    $conn->close();
}

}
$manage = new ManagePlaylist();
$manage->retrive(1);