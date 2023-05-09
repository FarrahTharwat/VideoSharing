<?php
include 'CRUD.php';
include 'Database.php';
include'../Model/Video.php';


class ManageVideo implements CRUD
{
    private static $instance = null;
    private function __construct()
    {
    }

    /**
     * @return null
     */
    public static function getInstance()
    {       if(self::$instance==null) {
        self::$instance = new ManageVideo();
    }
        return self::$instance;
    }
    public function create($video)
    {    //Get database connection
        $database = new Database();
        $conn = $database->getConn();

        //Get video attribute to insert
        $category = $video->getCategory();
        $title = $video->getTitle();
        $description = $video->getDescription();
        $thumbnail = $video->getThumbnail();
        $date = $video->getDate();
        $status = $video->getState();
        $views = $video->getViews();
        $url = $video->getUrl();
        $userID = $video->getUserID();
        $query = "INSERT INTO video (Category, Title, Description, ThumbNail, Date, Status, Views, URL, UserID) VALUES ('$category', '$title', '$description', '$thumbnail', '$date', '$status', '$views', '$url', '$userID')";

// Execute the query
        if ($conn->query($query) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        //hamed part

        $query = "SELECT MAX(id) as max_id FROM video";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $maxId = $row['max_id'];

        //$video_id = mysqli_insert_id($conn);

        // Get the list of subscribers for the uploaded video's channel

        //$subscribersQuery = "SELECT subscriberID FROM subscribed WHERE ChannelID = {$_SESSION['userID']}";
        $subscribersQuery = "SELECT subscriberID FROM subscribed WHERE channelID = {$_SESSION['userID']}
                                      AND bell = 1";


        $subscribersResult = $conn->query($subscribersQuery);
        // var_dump($subscribersResult);

        if ($subscribersResult->num_rows > 0) {
            while ($row = $subscribersResult->fetch_assoc()) {
                $subscriberID = $row['subscriberID'];
                //var_dump($subscriberID);
                //var_dump($url);
                $message = "<a href=\"video-page.php?video=$maxId\">A new video ($title) uploaded to a channel </a>";


                // Insert a new notification for the subscriber
                $notificationQuery = "INSERT INTO notification (UserID, Content ) VALUES ('$subscriberID', '$message')";
                if ($conn->query($notificationQuery) === TRUE) {
                    echo "New notification created successfully";
                } else {
                    echo "Error: " . $notificationQuery . "<br>" . $conn->error;
                }
            }
        }






        // Close the database connection
        $conn->close();
    }

    public function delete($id)
    {
        $database = new Database();
        $conn = $database->getConn();

        $query="DELETE FROM video where ID = '$id'";

        if ($conn->query($query) === TRUE) {
            echo "Record Deleted successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }

    public function retrive($userId)
    {
        $database = new Database();
        $conn = $database->getConn();

        $query = "SELECT ID, Category, Title, Description, Thumbnail, Date, Status, Views, Url
              FROM video 
              WHERE UserID = '$userId'";

        $result = $conn->query($query);

        $videos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $video = new Video(
                    $row['ID'],
                    $row['Title'],
                    $row['Category'],
                    $row['Description'],
                    $row['Thumbnail'],
                    $row['Date'],
                    $row['Status'],
                    $row['Views'],
                    $row['Url'],
                    $userId

                );

                $videos[] = $video;
            }
        }

        return $videos;
    }


    public function update($video)
    {   $database = new Database();
        $conn = $database->getConn();


        $videoId = $video->getId();
        $category = $video->getCategory();
        $title = $video->getTitle();
        $description = $video->getDescription();
        $thumbnail = $video->getThumbnail();
        $date = $video->getDate();
        $status = $video->getState();
        $views = $video->getViews();
        $url = $video->getUrl();
        $userId = $video->getUserId();

        $query = "UPDATE video SET Category='$category', Title='$title', Description='$description', Thumbnail='$thumbnail', Date='$date', Status='$status', Views='$views', URL='$url', UserID='$userId' WHERE ID='$videoId'";
        if ($conn->query($query) === TRUE) {
            echo "New updated created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }

    public function checkExtension ($extenstion)
    {  $allowedExtenstion = array("wmv","avi","mp4");
        //Search in the allowed extenstion
        if(in_array($extenstion,$allowedExtenstion) )
            return true;
        else
            return false;

    }
    function divide_video_quality($videoName)
    {   $dirName = pathinfo($videoName,PATHINFO_FILENAME);
        $dirName=basename($dirName);
        $input_file='../View/Videos/'.$dirName.'/'.$videoName;
        $output_path='../View/Videos/'.$dirName;
        // Define the quality versions and their parameters
        $qualities = [
            [
                'width' => 640,
                'height' => 360,
                'bitrate' => '800k',
            ],
            [
                'width' => 256,
                'height' => 144,
                'bitrate' => '200k',
            ],
            [
                'width' => 426,
                'height' => 240,
                'bitrate' => '400k',
            ],
        ];

        // Loop through the quality versions and generate the output files
        foreach ($qualities as $quality) {
            $output_file = $output_path . '/' . $dirName .  '_' .$quality['height'] .  '.mp4';

            $cmd = 'ffmpeg -i ' . $input_file . ' -c:v libx264 -preset medium -crf 23 -b:v ' . $quality['bitrate'] . ' -maxrate ' . $quality['bitrate'] . ' -bufsize ' . (2 * (int)$quality['bitrate']) . ' -vf scale=w=' . $quality['width'] . ':h=\'(iw/2)*2\' -c:a aac -b:a 128k ' . $output_file;

            exec($cmd);

        }
    }
    public function RetriveForVideoPage($Id,$userID){
        $database = new Database();
        $conn = $database->getConn();

        $query = "SELECT  Category, Title, Description, Thumbnail, Date, Status, Views, Url
              FROM video 
              WHERE ID = '$Id'";

        $result = $conn->query($query);
        if ($result && mysqli_num_rows($result) > 0) {
            // Get the video data from the query result
            $row = mysqli_fetch_assoc($result);

            // Create a new Video object with the data
            $video = new Video($Id, $row['Title'], $row['Category'], $row['Description'], $row['Thumbnail'], $row['Date'], $row['Status'], $row['Views'], $row['Url'], $userID);
            return $video;
        } else {
            return null;
        }



    }


}