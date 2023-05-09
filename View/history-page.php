
<?php
//include '/Applications/XAMPP/xamppfiles/htdocs/web/VideoSharing/Controller/Database.php';
//include '/Applications/XAMPP/xamppfiles/htdocs/web/VideoSharing/Model/Video.php';
// include '../Model/User.php';
// include '../Model/History.php';
require_once '../Controller/ManageHistory.php';
?>
<?php 
    session_start(); 
    $result = $_SESSION["userID"];
?>


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
   include 'header.php';
   ?>
   <!--nav-->
   <?php
   include 'nav.php';
   ?>
         <div id="content-wrapper">
            <div class="container-fluid">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div class="btn-group float-right right-action">
                           <button onclick="triggerWeewFunction('<?= $result ?>'); location.reload();" type="button" class="btn btn-outline-danger">Clear History</button>
                           </div>
                           <h6>Watch History</h6>
                        </div>
                     </div>

         <?php
          $h = new ManageHistory();
          
         // Retrieve the videos for the user
          $theHistory = $h->retrive( $result);
          
         ?>
         <?php if(empty($theHistory)):?>
            <div id="content-wrapper">
                  <div class="container-fluid">
                   <div class="row">
                      <div class="col-md-8 mx-auto text-center  pt-4 pb-5">
                         <h1>Your History is empty.</h1>
                         <div class="mt-5">
                            <a class="btn btn-outline-primary" href="index.php"><i class="mdi mdi-home"></i> GO TO HOME PAGE</a>
                         </div>
                      </div>
                   </div>
                </div>
          <?php endif ?>
         <!-- Loop through the videos and generate HTML markup -->
         <?php foreach ($theHistory as $a): ?>
             <div class="col-xl-3 col-sm-6 mb-3">
                 <div class="video-card history-video">
                     <div class="video-card-image"  onclick="goToVideoPage('<?= $a['video']->getID(); ?>', '<?php echo $a['video']->getUserID(); ?>')">
                         <a onclick="triggerWowFunction('<?= $a['video']->getUserID();  ?>', '<?php echo $a['video']->getID(); ?>'); location.reload(); " class="video-close" href="#"><i class="fas fa-times-circle"></i></a> </button>
                         <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                         <a href="#"><img class="img-fluid" src="<?php echo $a['video']->getThumbnail(); ?>" alt=""></a>
                         <div class="time">3 </div>
                     </div>
                     <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $a['history']->getelapsedTime(); ?></div>
                      </div>
                     <div class="video-card-body">
                         <div class="video-title">
                             <a href="#"><?php echo $a['video']->getTitle(); ?></a>
                         </div>
                         <div class="video-page text-success">
                             <?php echo $a['video']->getCategory(); ?>

                         </div>
                         <div class="video-view">
                             <?php echo $a['video']->getViews(); ?> views &nbsp;<i class="fas fa-calendar-alt"></i> <?php echo $a['history']->getwatchDate(); ?>
                         </div>
                     </div>
                 </div>
             </div>
             <?php endforeach;?>
            </div>

                  </div>
<div>    
<nav aria-label="Page navigation example">
                     <ul class="pagination justify-content-center pagination-sm mb-0">
                        <li class="page-item disabled">
                           <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                           <a class="page-link" href="#">Next</a>
                        </li>
                     </ul>
                  </nav>
</div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            <footer class="sticky-footer">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-6 col-sm-6">
                <p class="mt-1 mb-0"><strong class="text-dark">Vidoe</strong>.
                    <small class="mt-0 mb-0"><a class="text-primary" target="_blank" href="https://templatespoint.net/">TemplatesPoint</a>
                    </small>
                </p>
            </div>
            <div class="col-lg-6 col-sm-6 text-right">
                <div class="app">
                    <a href="#"><img alt="" src="img/google.png"></a>
                    <a href="#"><img alt="" src="img/apple.png"></a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- /.content-wrapper -->
</div>
         <!-- /.content-wrapper -->
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
<!-- Bootstrap core JavaScript-->
<script>
                 function goToVideoPage(videoId, userId) {
                     window.location.href = 'video-page.php?video_id=' + videoId + '&user_id=' + userId;
                 }
             </script>
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