<!DOCTYPE html>
<html lang="en">
<?php

//include_once '../Controller/ManageVideo.php';
//include_once '../Model/Video.php';
include_once '../Controller/VideoUploaderFacade.php';

session_start();
?>
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
    <
    <link rel="stylesheet" type="text/css" href="css/upload%20video.css">
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
         <div class="container-fluid upload-details">
            <div class="row">
               <div class="col-lg-12">
                  <div class="main-title">
                     <h6>Upload Details</h6>
                  </div>
               </div>
               <div class="col-lg-2">
                  <div class="imgplace"></div>
               </div>
               <div class="col-lg-10">
                  <div class="osahan-title">Contrary to popular belief, Lorem Ipsum (2019) is not.</div>
                  <div class="osahan-size">102.6 MB . 2:13 MIN Remaining</div>
                  <div class="osahan-progress">
                     <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                     </div>
                     <div class="osahan-close">
                        <a href="#"><i class="fas fa-times-circle"></i></a>
                     </div>
                  </div>
                  <div class="osahan-desc">Your Video is still uploading, please keep this page open until it's done.</div>
               </div>
            </div>
            <hr>

             <form action="upload-video.php" method="POST" enctype="multipart/form-data">
            <div class="row">
               <div class="col-lg-12">
                  <div class="osahan-form">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label  for="title">Video Title</label>
                              <input name="title"   type="text" placeholder="Contrary to popular belief, Lorem Ipsum (2019) is not." id="title" class="form-control" required >
                           </div>
                        </div>

                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="description">About</label>
                              <textarea rows="3" id="description" name="description" class="form-control" placeholder="write description" required></textarea>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="thumbnail" class="file-upload-label">
                                    <span> Thumbnail:Choose a image</span>
                                    <i class="fas fa-upload"></i>
                                </label>
                                <input  type="file" id="thumbnail" name="thumbnail" accept="image/*" class="file-upload-input" required>
                                <div class="file-upload-preview"></div>
                            </div>


                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="video" class="file-upload-label-video">
                                    <span>Video: Choose a file</span>
                                    <i class="fas fa-upload"></i>
                                </label>
                                <input type="file" id="video" name="video" accept="video/*" class="file-upload-input-video" required>
                                <div class="file-upload-preview"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">

                        </div>
                     </div>
                     <div class="row ">
                        <div class="col-lg-12">
                           <div class="main-title">
                              <h6>Category ( you can select upto 1 categories )</h6>
                           </div>
                        </div>
                     </div>
                     <div class="row category-checkbox">
                        <!-- checkbox 1col -->
                        <div class="col-lg-2 col-xs-6 col-4">
                           <div class="custom-control custom-checkbox">
                              <input type="radio" name="category"  class="custom-control-input" id="category" value="Podcast">
                              <label class="custom-control-label" for="category">Podcast</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="radio" name="category" class="custom-control-input" id="category2" value="Education">
                              <label class="custom-control-label" for="category2">Education</label>
                           </div>

                        </div>
                        <!-- checkbox 2col -->
                        <div class="col-lg-2 col-xs-6 col-4">
                           <div class="custom-control custom-checkbox">
                              <input type="radio" name="category" class="custom-control-input" id="category3" value="Sounds" >
                              <label class="custom-control-label" for="category3">Sounds</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="radio" name="category" class="custom-control-input" id="category4" value="Sport">
                              <label class="custom-control-label" for="category4">Sport</label>
                           </div>

                        </div>
                        <!-- checkbox 3col -->
                        <div class="col-lg-2 col-xs-6 col-4">
                           <div class="custom-control custom-checkbox">
                              <input type="radio" name="category" class="custom-control-input" id="category5" value="Gaming">
                              <label class="custom-control-label" for="category5">Gaming</label>
                           </div>
                        </div>


                        <!-- checkbox 3col -->

                     </div>
                  </div>
                  <div class="osahan-area text-center mt-3">
                     <button class="btn btn-outline-primary">Upload</button>

                      <?php

                      //echo $_FILES['video-file']['name'];
                      if ($_SERVER["REQUEST_METHOD"] === "POST") {
                          $facade = new VideoUploaderFacade();
                          $result = $facade->uploadVideo($_POST['title'], $_POST['description'], $_POST['category'], $_FILES['thumbnail'], $_FILES['video']);

                          if ($result === true) {
                              echo "<script>window.location.replace('http://localhost/VideoSharing/View/upload-video.php');</script>";
                              exit;
                          } else {

                          }
                      }
                      ?>
                  </div>
                  <hr>
                  <div class="terms text-center">
                     <p class="mb-0">There are many variations of passages of Lorem Ipsum available, but the majority <a href="#">Terms of Service</a> and <a href="#">Community Guidelines</a>.</p>
                     <p class="hidden-xs mb-0">Ipsum is therefore always free from repetition, injected humour, or non</p>
                  </div>
               </div>
            </div>
             </form>
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
              // Get the input element and button element

              const inputElementVideo = document.getElementById('video');
              const buttonElementVideo = document.querySelector('.file-upload-label-video');

              // Add event listener to input element to detect file selection
              inputElementVideo.addEventListener('change', () => {
                  // Get the file name
                  const fileName = inputElementVideo.files[0].name;

                  // Set the file name as the text of the button
                  buttonElementVideo.textContent = `Video: ${fileName}`;

              });
          </script>
          <script>
              // Get the input element and button element
              const inputElementThumbnail = document.getElementById('thumbnail');
              const buttonElementThumbnail = document.querySelector('.file-upload-label');

              // Add event listener to input element to detect file selection
              inputElementThumbnail.addEventListener('change', () => {
                  // Get the file name
                  const fileName = inputElementThumbnail.files[0].name;

                  // Set the file name as the text of the button
                  buttonElementThumbnail.textContent = `Thumbnail: ${fileName}`;
              });
          </script>
<!--title constraints-->
          <script>
              const titleInput = document.getElementById("title");

              titleInput.addEventListener("input", function(event) {
                  const titleValue = event.target.value;

                  // Check if the title is too long (more than 50 characters)
                  if (titleValue.length > 50) {
                      event.target.setCustomValidity("Title is too long. Maximum length is 50 characters.");
                  }
                  // Check if the title is empty
                  else if (!titleValue.trim()) {
                      event.target.setCustomValidity("Please enter a title.");
                  }
                  else {
                      event.target.setCustomValidity("");
                  }
              });
          </script>

          <!-- desciption constraints-->



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
