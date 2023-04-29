<?php
include 'CRUD.php';
include 'Database.php';
include'../Model/Video.php';


class ManageVideo implements CRUD
{

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
                $video = array(
                    'id' => $row['ID'],
                    'category' => $row['Category'],
                    'title' => $row['Title'],
                    'description' => $row['Description'],
                    'thumbnail' => $row['Thumbnail'],
                    'date' => $row['Date'],
                    'status' => $row['Status'],
                    'views' => $row['Views'],
                    'url' => $row['Url']
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
}
 $manage = new ManageVideo();
$videos = $manage->retrive(1);

// Loop through the videos and display their information
foreach ($videos as $video) {
    echo "ID: " . $video['id'] . "<br>";
    echo "Category: " . $video['category'] . "<br>";
    echo "Title: " . $video['title'] . "<br>";
    echo "Description: " . $video['description'] . "<br>";
    echo "Thumbnail: " . $video['thumbnail'] . "<br>";
    echo "Date: " . $video['date'] . "<br>";
    echo "Status: " . $video['status'] . "<br>";
    echo "Views: " . $video['views'] . "<br>";
    echo "URL: " . $video['url'] . "<br><br>";
}
