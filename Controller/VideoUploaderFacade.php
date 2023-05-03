<?php

// Define the Facade class
require_once 'ManageVideo.php';
class VideoUploaderFacade
{
    private $manage;

    public function __construct()
    {
        $this->manage = ManageVideo::getInstance();
    }

    public function uploadVideo($title, $description, $category, $thumbnailFile, $videoFile)
    {
        $thumbnailExtension = strtolower(pathinfo($thumbnailFile["name"], PATHINFO_EXTENSION));
        $videoExtension = strtolower(pathinfo($videoFile["name"], PATHINFO_EXTENSION));

        $errors = [];

        // Check file extensions
        $allowedThumbnailExtensions = ['jpg', 'jpeg', 'png'];
        $allowedVideoExtensions = ['mp4', 'avi', 'mov', 'wmv'];
        if (!in_array($thumbnailExtension, $allowedThumbnailExtensions)) {
            $errors[] = "Thumbnail file extension not allowed";
        }
        if (!in_array($videoExtension, $allowedVideoExtensions)) {
            $errors[] = "Video file extension not allowed";
        }

        // Check file size
        $maxThumbnailSize = 1000000; // 1 MB
        $maxVideoSize = 1000000000; // 1 GB
        if ($thumbnailFile["size"] > $maxThumbnailSize) {
            $errors[] = "Thumbnail file size too large";
        }
        if ($videoFile["size"] > $maxVideoSize) {
            $errors[] = "Video file size too large";
        }

        // Check file type
        $finfoThumbnail = new finfo(FILEINFO_MIME_TYPE);
        $finfoVideo = new finfo(FILEINFO_MIME_TYPE);
        $thumbnailMime = $finfoThumbnail->file($thumbnailFile["tmp_name"]);
        $videoMime = $finfoVideo->file($videoFile["tmp_name"]);
        $allowedThumbnailMimes = ['image/jpeg', 'image/png'];
        $allowedVideoMimes = ['video/mp4', 'video/avi', 'video/quicktime', 'video/x-ms-wmv'];
        if (!in_array($thumbnailMime, $allowedThumbnailMimes)) {
            $errors[] = "Thumbnail file type not allowed";
        }
        if (!in_array($videoMime, $allowedVideoMimes)) {
            $errors[] = "Video file type not allowed";
        }

        if (empty($title)) {
            $errors[] = "Title is required";
        }
        if (empty($description)) {
            $errors[] = "Description is required";
        }
        if (empty($category)) {
            $errors[] = "Category is required";
        }
        if ($thumbnailFile["error"] !== UPLOAD_ERR_OK) {
            $errors[] = "Thumbnail upload error";
        }
        if ($videoFile["error"] !== UPLOAD_ERR_OK) {
            $errors[] = "Video upload error";
        }

        if (count($errors) === 0) {
            // Save the thumbnail to a directory on the server

            $videoName = pathinfo($videoFile['name'], PATHINFO_FILENAME);
            $videoName = basename($videoName);

            //create new directory with video name
            $uploadDir = '../View/Videos/' . $videoName;
            mkdir($uploadDir);

            //move video to the directory
            $uploadVideoPath = $uploadDir . '/' . $videoFile['name'];
            move_uploaded_file($videoFile['tmp_name'], $uploadVideoPath);

            //divide video into qualities
            $this->manage->divide_video_quality($videoFile['name']);

            //remove the video and keep qualities only
            unlink($uploadVideoPath);
            $uploadThumbnailPath = $uploadDir . '/' . $_FILES['thumbnail']['name'];
            move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploadThumbnailPath);


            $videoObj = new Video(25, $title, $category, $description, $uploadThumbnailPath, "2023-05-01", "published", 100, $uploadVideoPath, 1);

            $this->ManageVideo = ManageVideo::getInstance();
            $this->ManageVideo->create($videoObj);


            return true;
        }
        return false;

    }
}



            //
