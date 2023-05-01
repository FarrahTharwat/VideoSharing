<?php

include_once '../Controller/ManageVideo.php';

?>
<?php
session_start();
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
         <div class="container-fluid pt-5 pb-5">
            <div class="row">
               <div class="col-md-8 mx-auto text-center upload-video pt-5 pb-5">
                  <h1><i class="fas fa-file-upload text-primary"></i></h1>
                  <h4 class="mt-5">Select Video files to upload</h4>
                  <section class="upload">
                     <h2 class="section-title">Upload Video</h2>
                     <form class="upload-form" enctype="multipart/form-data" method="POST">
                        <label for="video-file" class="upload-label">Choose a video to upload:</label>
                        <input type="file" id="video-file" class="upload-input" name="video-file">
                        <div class="mt-4">
                           <!-- <a class="btn btn-outline-primary" href="upload-video.php"></a> -->
                           <button class="btn btn-outline-primary">Upload Video</button>












                        </div>
                     </form>
                  </section>


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