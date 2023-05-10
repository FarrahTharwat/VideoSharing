<!DOCTYPE html>
<html lang="en">
<?php

include_once '../Controller/ManageVideo.php';
require_once '../Controller/Database.php';

?>
<?php
session_start();
if(isset($_SESSION['userID'])){
    $watcher = $_SESSION['userID'];
}
else {
    $watcher = 1 ;
}
?>
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

<?php include 'header.php';?>


   <!--nav-->
   <?php
   include 'nav.php';
   echo 'wow';
   ?>


   <div id="content-wrapper">
       <div class="container-fluid">
           <div class="video-block section-padding">
               <div class="row">
                   <div class="col-md-12">
                       <div class="main-title">

                           <h6>Featured Videos</h6>
                       </div>
                   </div>
                      <?php
                      // Get an instance of the ManageVideo class
                      $manageVideo = ManageVideo::getInstance();

                      // Set the user ID for which to retrieve videos

                      $userId = $watcher;

                      // Retrieve the videos for the user
                      $videos = $manageVideo->retrive($userId);
                      ?>

                      <!-- Loop through the videos and generate HTML markup -->
                      <?php foreach ($videos as $video): ?>
                          <div class="col-xl-3 col-sm-6 mb-3">
                              <div class="video-card" onclick="goToVideoPage('<?php echo $video->getID(); ?>')">
                                  <div class="video-card-image">
                                      <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                      <a href="#"><img class="img-fluid" src="<?php echo $video->getThumbnail(); ?>" alt=""></a>
                                      <div class="time">3 </div>
                                  </div>
                                  <div class="video-card-body">
                                      <div class="video-title">
                                          <a href="#"><?php echo $video->getTitle(); ?></a>
                                      </div>
                                      <div class="video-page text-success">
                                          <?php echo $video->getCategory(); ?>

                                      </div>
                                      <div class="video-view">
                                          <?php echo $video->getViews(); ?> views &nbsp;<i class="fas fa-calendar-alt"></i> <?php echo $video->getdate(); ?>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      <?php endforeach; ?>

               <hr class="mt-0">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div class="btn-group float-right right-action">
                              <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                              </a>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
             <?php
             include 'footer.php';
             ?>
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="login.php">Logout</a>
               </div>
            </div>
         </div>
      </div>
             <script>
                 function goToVideoPage(videoId) {
                     window.location.href = 'video-page.php?video_id=' + videoId;
                 }
             </script>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Owl Carousel -->
      <script src="vendor/owl-carousel/owl.carousel.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/custom.js"></script>
   </body>

</html>