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
            <div class="row">
               <div class="col-lg-12">
                  <div class="osahan-form">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="e1">Video Title</label>
                              <input type="text" placeholder="Contrary to popular belief, Lorem Ipsum (2019) is not." id="e1" class="form-control">
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="e2">About</label>
                              <textarea rows="3" id="e2" name="e2" class="form-control">Description</textarea>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail:</label>
                                <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
                                <div class="file-upload-preview"></div>
                            </div>


                        </div>
                        <div class="col-lg-4">
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
                              <input type="radio" name="category"  class="custom-control-input" id="customCheck1">
                              <label class="custom-control-label" for="customCheck1">Podcast</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="radio" name="category" class="custom-control-input" id="customCheck2">
                              <label class="custom-control-label" for="customCheck2">Education</label>
                           </div>

                        </div>
                        <!-- checkbox 2col -->
                        <div class="col-lg-2 col-xs-6 col-4">
                           <div class="custom-control custom-checkbox">
                              <input type="radio" name="category" class="custom-control-input" id="zcustomCheck1">
                              <label class="custom-control-label" for="zcustomCheck1">Sounds</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="radio" name="category" class="custom-control-input" id="zcustomCheck2">
                              <label class="custom-control-label" for="zcustomCheck2">Sport</label>
                           </div>

                        </div>
                        <!-- checkbox 3col -->
                        <div class="col-lg-2 col-xs-6 col-4">
                           <div class="custom-control custom-checkbox">
                              <input type="radio" name="category" class="custom-control-input" id="czcustomCheck1">
                              <label class="custom-control-label" for="czcustomCheck1">Gaming</label>
                           </div>
                        </div>


                        <!-- checkbox 3col -->

                     </div>
                  </div>
                  <div class="osahan-area text-center mt-3">
                     <button class="btn btn-outline-primary">Upload</button>
                  </div>
                  <hr>
                  <div class="terms text-center">
                     <p class="mb-0">There are many variations of passages of Lorem Ipsum available, but the majority <a href="#">Terms of Service</a> and <a href="#">Community Guidelines</a>.</p>
                     <p class="hidden-xs mb-0">Ipsum is therefore always free from repetition, injected humour, or non</p>
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
              const fileInput = document.getElementById('thumbnail');
              const preview = document.querySelector('.file-upload-preview');

              fileInput.addEventListener('change', function() {
                  const file = this.files[0];
                  if (file) {
                      const reader = new FileReader();
                      reader.onload = function() {
                          preview.style.backgroundImage = `url(${reader.result})`;
                      }
                      reader.readAsDataURL(file);
                  } else {
                      preview.style.backgroundImage = null;
                  }
              });
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