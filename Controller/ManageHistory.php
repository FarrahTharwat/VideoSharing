<?php
include 'CRUD.php';
include 'Database.php';
include '../Model/Playlist.php';
include '../Model/Video.php';
include '../Model/User.php';
include '../Model/History.php';
include '../Controller/AuthController.php'; 

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

                echo '
                <style>button.btn.btn-outline-secondary {
                  /* width: min-content; */
                  display: inherit;
                  /* position: initial; */
                  margin: -9% 4% -2% 89%;
                  padding: revert;
                    }</style>
                <div class="col-xl-3 col-sm-6 mb-3">
                <div class="video-card history-video">
                   <div class="video-card-image">
                      <a class="play-icon" href="/web/VideoSharing/View/video-page.php"><i class="fas fa-play-circle"></i></a>
                      <a href="/web/VideoSharing/View/video-page.php"><img class="img-fluid" src="'.$Thumbnail.'" alt=""></a>
                      <div class="time">videoTime</div>
                   </div>
                   <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$ElapsedTime.'</div>
                   </div>
                   <div class="video-card-body">
                      <div class="video-title">
                         <a href="/web/VideoSharing/View/video-page.php">'.$Title.'</a>
                      </div>
                      
                      <div class="video-page text-danger">'.$Category.'
                      </div>

                      <div class="video-view">'.$Views.'<br><i class="fas fa-calendar-alt"></i> ' .$WatchDate. '
            
                      </div>
                   </div>
                </div>
             </div>
          </div>
          </div>';

            }
        }
        else {
            echo'<div id="content-wrapper">
                <div class="container-fluid">
                   <div class="row">
                      <div class="col-md-8 mx-auto text-center  pt-4 pb-5">
                         <h1>Your History is empty.</h1>
                         <div class="mt-5">
                            <a class="btn btn-outline-primary" href="index.php"><i class="mdi mdi-home"></i> GO TO HOME PAGE</a>
                         </div>
                      </div>
                   </div>
                </div>';
        }

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