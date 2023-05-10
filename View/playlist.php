 
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Askbootstrap">
   <meta name="author" content="Askbootstrap">
   <title>VIDOE - Video Streaming Website HTML Template</title>
   <!-- Favicon Icon -->
   <link rel="icon" type="image/png" href="img/favicon.png">
   <!-- Bootstrap core CSS-->
   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!-- Custom fonts for this template-->
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <!-- Custom styles for this template-->
   <link href="css/osahan.css" rel="stylesheet">
   <!-- Owl Carousel -->
   <link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css">
   <link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css">
</head>

<body id="page-top">
<!--header-->

<?php
session_start(); 
$watcher = $_SESSION["userID"];
require_once '../Controller/ManagePlaylist.php';
require_once '../Model/Playlist.php';
include 'header.php';
?>
<!--nav-->
<?php
include 'nav.php';
$theUser = new Database();
   
?>
      <div class="single-channel-page" id="content-wrapper">
         <div class="single-channel-image">
            <img class="img-fluid" alt="" src="img/channel-banner.png">
            <div class="channel-profile">
               <img class="channel-profile-img" alt="" src="img/s2.png">
               <div class="social hidden-xs">
                  Social &nbsp;
                  <a class="fb" href="#">Facebook</a>
                  <a class="tw" href="#">Twitter</a>
                  <a class="gp" href="#">Google</a>
               </div>
            </div>
         </div>
         <div class="single-channel-nav">
            <nav class="navbar navbar-expand-lg navbar-light">
               <a class="channel-brand" href="#"><?php echo $theUser->name($watcher) ; ?> <span title="" data-placement="top"
                     data-toggle="tooltip" data-original-title="Verified"><i
                        class="fas fa-check-circle text-success"></i></span></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item ">
                        <a class="nav-link" href="single-channel.php">Videos <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="#">Playlist <span class="sr-only">(current)</span></a>
                     </li>

                  </ul>

               </div>
            </nav>
         </div>
         <?php

//echo $_FILES['video-file']['name'];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $playlist = new ManagePlaylist();
    $zplaylist = new Playlist(' ',0,$_POST['PlaylistName'],' ',$watcher);
    $result = $playlist->createp($zplaylist, $_POST['VideoID']);
    if ($result === true) {
        echo "kkkk";
        exit;
    } else {

    }
}
?>
         <div class="container-fluid">
            <div class="video-block section-padding">
               <div class="row">
                  <div class="col-md-12">
                     <div class="main-title">
                     <div class="btn-group float-right right-action">
                           <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false">
                              + Create Playlist <i class="fa fa-caret-down" aria-hidden="true"></i>
                           </a>
                           <div class="dropdown-menu dropdown-menu-right">
                              <form style="color: rgb(248, 18, 18); font-size: x-small;"  method="post" action="playlist.php">
                                 <label for="name"> Playlist Name:</label><br>
                                 <input type="text" id="name" name="PlaylistName"><br>
                                 <label for="setvideo">Set Video:</label><br>
                                 <input type="text" id="name" name="VideoID"><br>
                              </form>
                              <button  type="submit" style="margin-left: 125px; margin-top: 10px; border: 2px; border-radius: 4px; color:rgb(238, 42, 42) ; background-color: bisque;">
                                 <h> Submit </h><br>
                              </button>
                           </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php
         // Set the user ID for which to retrieve videos
         $userId = $watcher;
         $theplaylist = new ManagePlaylist();
          // Retrieve the videos for the user
         $playlist = $theplaylist->retriveUserPlaylist($userId);
         ?>

         <?php if(empty($playlist)):?>
            <div id="content-wrapper">
                  <div class="container-fluid">
                   <div class="row">
                      <div class="col-md-8 mx-auto text-center  pt-4 pb-5">
                         <h1>You got no playlist.</h1>
                         <div class="mt-5">
                            <a class="btn btn-outline-primary" href="index.php"><i class="mdi mdi-home"></i> GO TO HOME PAGE</a>
                         </div>
                      </div>
                   </div>
                </div>
          <?php endif ?>
          <div class="container-fluid">
            <div class="video-block section-padding">
              
         <?php foreach ($playlist as $a): ?>
            <div class="video-block section-padding">
            <div class="row">
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="video-card">
                        <div class="video-card-image ">
                        <i><a class="video-close" onclick="triggerDELETEPLAYLISTFunction(<?=$a->getPlaylistID()?>); location.reload();" ><i class="fas fa-times-circle"></i></a>
                         <?php $_SESSION['playlistID']=$a->getPlaylistID();?>
                           <a class="play-icon" href="v1.php"><i class="fas fa-play-circle"></i></a>
                           <a href="#"><img class="img-fluid" src="img/v8.png" alt=""></a>
                        </div>
                        <div class="hover-element">
                           <a style="font-size:19px;"><?php echo $theplaylist->NumOfVideos( $a->getPlaylistID() ); ?></a>
                           <a> 
                           <i class="fa fa-list" style="margin-top:100%; margin-left: 25%; font-size: larger;"></i> 
                           </a>
                        </div>
                        <div class="video-card-body">
                           <div class="video-title">
                              <a href="#"><?php echo $a->getPlaylistName(); ?></a>
                           </div>
                           <div class="video-view">
                           <?php echo $a->getDescription(); ?>
                           </div>
                        </div>
                     </div>
                  </div>
            </div>
                  <?php endforeach;?>


                  <!-- Bootstrap core JavaScript-->
                  <script src="vendor/jquery/jquery.min.js"></script>
                  <script src="js/yarab.js"></script>
                  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                  <!-- Core plugin JavaScript-->
                  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
                  <!-- Owl Carousel -->
                  <script src="vendor/owl-carousel/owl.carousel.js"></script>
                  <!-- Custom scripts for all pages-->
                  <script src="js/custom.js"></script>
</body>
</html>