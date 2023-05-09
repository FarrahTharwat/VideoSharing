<?php


// Include the necessary files and classes
require_once '../Controller/Database.php';
require_once '../Controller/VideoController.php';
require_once '../Model/VideoModel.php';
require_once '../Model/Video.php';

// Create an instance of the controller


?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Askbootstrap">
   <meta name="author" content="Askbootstrap">
   <title>VIDEO - Video Streaming Website HTML Template</title>
   <!-- Favicon Icon -->
   <link rel="icon" type="image/png" href="img/favicon.png">
   <!-- Bootstrap core CSS-->
   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!-- Custom fonts for this template-->
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <!-- Custom styles for this template-->

    <link rel="stylesheet" type="text/css" href="css/uploadVideoButtonVideo.css">
    <link rel="stylesheet" type="text/css" href="css/upload%20video.css">
    <link href="css/osahan.css" rel="stylesheet">

   <!-- Owl Carousel -->
   <link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css">
   <link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css">

    <link rel="stylesheet" type="text/css" href="css/searchResult.css">

</head>

<body>
    <!--header-->
    

<?php
include 'headers.php';

       

include 'nav.php';
    
?>
    <!-- <h1>Search Results</h1> -->

    <?php
    // check if there are any search results to display
    //$video=new Video();
    //var_dump($_GET);
    //var_dump($searchResults);



    // Create a new Video object
    $video = new Video();





    class View
    {
        // ...
    
        public function displaySearchResults($searchResults)
        {
            // Check if there are any search results to display
            // Check if there are any search results to display
           if ($searchResults !== null && count($searchResults) > 0) {
             // Open a container for the grid
              $html = '<div class="container">';
              $html .= '<div class="row">';
               // Iterate over the search results and display them in a 2-column grid
                $count = 0;
                  foreach ($searchResults as $video) {
                if ($count % 2 == 0 && $count > 0) {
            // Close the previous row and open a new row every 2 videos
                   $html .= '</div><div class="row">';
                  }
        $html .= '<div class="col-sm-6">';
        $html .= '<div class="video">';
        $html .= '<a href="' . $video['URL'] . '">';
        $html .= '<img src="' . $video['ThumbNail'] . '" alt="' . $video['Title'] . '">';
        $html .= '<h2>' . $video['Title'] . '</h2>';
        $html .= '</a>';
        $html .= '<p>' . $video['Description'] . '</p>';
        $html .= '<p>Date: ' . $video['Date'] . '</p>';
        // Call the getUserById() function to get the user name by ID
        $controller = new VideoController(new View(), new Database());
        //$user = $controller->getUserById($video['UserID']);
       // $html .= '<p>User: ' . $user['Username'] . '</p>';
        $html .= '</div>';
        $html .= '</div>';
        $count++;
    }
    // Close the last row and the container
    $html .= '</div>';
    $html .= '</div>';
    echo $html;
} 
    // Display a message if no search results were found
    else {
        // Display a message if no search results were found
        $noResult = "No search results found.";
        echo '<div class="noresult">' . $noResult . '</div>';
    }
    

        }
        

    }
    
    $controller = new VideoController(new View(), new Database());
    $controller->search();







    ?>

</body>

</html>