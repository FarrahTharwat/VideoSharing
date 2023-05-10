<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$watcher = $_SESSION["userID"];
$playlist = $_SESSION["playlistID"];
require_once '../Controller/ManagePlaylist.php';
$theUser = new Database();
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
   <?php 
   include 'header.php'; 
   include 'nav.php';?>
      <div id="content-wrapper">
         <div class="container-fluid pb-0">
            <div class="video-block section-padding">
               <div class="row">
                  <?php
                   $Playlist = new ManagePlaylist();
          
                   // Retrieve the videos for the user
                    $thePlaylist = $Playlist->retrive( $playlist);?>
                    <?php if(empty($thePlaylist)):?>
            <div id="content-wrapper">
                  <div class="container-fluid">
                   <div class="row">
                      <div class="col-md-8 mx-auto text-center  pt-4 pb-5">
                         <h1>Your Playlist is empty.</h1>
                         <div class="mt-5">
                            <a class="btn btn-outline-primary" href="index.php"><i class="mdi mdi-home"></i> GO TO HOME PAGE</a>
                         </div>
                      </div>
                   </div>
                </div>
          <?php endif ?>
          <?php
                    $firstvideo =$thePlaylist[0];
                    array_splice($thePlaylist,0,1);
                  ?>
                  <div class="col-md-8">
                     <div class="single-video-left">
                        <div class="video-player">
                           <video src=" <?php echo $firstvideo['video']->getUrl(); ?>" class="video"></video>

                           <div class="player-controls">
                              <div class="video-progress">
                                 <div class="video-progress-filled"></div>
                              </div>

                              <div class="inner-player-controls">
                                 <button class="play-button" title="Play">►</button>

                                 <button class="mute control-button">
                                    <div class="mute muted slash"></div>
                                    <img src=" <?php echo $firstvideo['video']->getThumbnail(); ?>"></img>
                                 </button>
                                 <input type="range" class="volume" min="0" max="1" step="0.01" value="1" />

                                 <div class="timee">
                                    <span class="current">0:00</span> / <span class="duration">0:00</span>
                                 </div>

                                 <button id="fullscreen-button" class="control-button" onclick="toggleFullscreen()"
                                    style="margin-left:215px">
                                    <img src="img/expand.png" style="background-color: transparent;"></img>
                                 </button>

                                 <button class="control-button">
                                    <img src="img/settings.png" style="margin-top:5px ;">
                                    <select class="control-button" style="color: white;">
                                       <option value="auto" style="color: black;">auto</option>
                                       <option value="720p" style="color: black;">720p</option>
                                       <option value="480p" style="color: black;">480p</option>
                                       <option value="360p" style="color: black;">360p</option>
                                       </img>
                                    </select>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <a href="#" title="Play video" class="play"></a>
                     </div>
                     <div class="single-video-title boxx mb-3;" style="margin-bottom:-2%;">
                        <h2><a href="#"><?php echo $firstvideo['video']->getTitle(); ?></a></h2>

                        <div class="wrrapper">
                           <div class="like">
                              <i onclick="like()" id="li" id="wi" class="fas fa-thumbs-up fa-2xl"></i>
                           </div>
                           <p style="color: white; font-size: 27px; margin-top: -5\px; ">|</p>
                           <div class="dislike">
                              <i onclick="dislike()" id="di" class="fas fa-thumbs-down"></i>
                           </div>
                        </div>
                        <div>
                        <div class="wrraapper" style="margin-bottom: 10%; margin-left: 30%; margin-top:-5%;">
                           <div> <p style="font-size: large; color: white; font-weight: 400;"> +Save </p> </div>
                           </select>
                        </div>
                        </div>
                     </div>
                     <div class="single-video-title boxx mb-3">
                        <div class="single-video-author boxx mb-3" style="margin-bottom:-50%;">
                           <div class="float-right"><button class="btn btn-danger" type="button">Subscribe
                                 <strong>1.4M</strong></button> <button class="btn btn btn-outline-danger"
                                 type="button"><i class="fas fa-bell"></i></button></div>
                           <img class="img-fluid" src="img/s4.png" alt="">
                           <p> <a href="#"><strong><?php  echo $theUser->name($firstvideo['video']->getUserID()); ?></strong></a> <span title="" data-placement="top"
                                 data-toggle="tooltip" data-original-title="Verified"><i
                                    class="fas fa-check-circle text-success"></i></span></p>
                           <small><?php echo $firstvideo['video']->getDate(); ?></small>
                        </div>
                        <div class="single-video-info-content box" style="box-sizing: 20%;">
                           <h6><?php echo $firstvideo['video']->getCategory(); ?></h6>
                           <p></p>
                           <h6>About :</h6>
                           <p><?php echo $firstvideo['video']->getDescription(); ?></p>
                        </div>
                     </div>
                  </div>
                  <div>
                  <div class="col-md-4">
                     <div class="single-video-right">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="main-title">
                            </div>
                        </div>
                     </div>
                     </div>
                  <!-- #region -->
                              <?php foreach ($thePlaylist as $firstvideo): ?>

                              <div class="video-card video-card-list">
                                 <div class="video-card-image">
                                   <a class="video-close" onclick="triggerREMOVEFunction(<?= $firstvideo['playlist']->getPlaylistID();  ?>, <?php echo $firstvideo['video']->getID(); ?>); echo $firstvideo['playlist']->getPlaylistID(), $firstvideo['video']->getID(); location.reload(); "><i class="fas fa-times-circle"></i></a>
                                    <a class="play-icon"  onclick="goToVideoPage('<?= $firstvideo['video']->getID(); ?>', '<?php echo $firstvideo['video']->getUserID(); ?>')"><i class="fas fa-play-circle" href=""></i></a>
                                    <a href="#"><img class="img-fluid" src=" <?php echo $firstvideo['video']->getThumbnail(); ?>" alt=""></a>
                                    <div class="time">3:50</div>
                                 </div>
                                 <div class="video-card-body">
                                    <div class="btn-group float-right right-action">
                                       
                              </div>
                                    <div class="video-title">
                                       <a href="#"><?php echo $firstvideo['video']->getTitle(); ?></a>
                                    </div>
                                    <div class="video-view">
                                    <?php echo $firstvideo['video']->getCategory(); ?>
                                    </div>
                                    </div>
                                 </div>
                              <?php endforeach;?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.container-fluid -->
         <!-- Sticky Footer -->
         <footer class="sticky-footer">
            <div class="container">
               <div class="row no-gutters">
                  <div class="col-lg-6 col-sm-6">
                     <p class="mt-1 mb-0"><strong class="text-dark">Vidoe</strong>.
                        <small class="mt-0 mb-0"><a class="text-primary" target="_blank"
                              href="https://templatespoint.net/">TemplatesPoint</a>
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
   <!-- /#wrapper -->
   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
   </a>
   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"></span>
               </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
               <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
         </div>
      </div>
   </div>
   <script>
                 function goToVideoPage(videoId, userId) {
                     window.location.href = 'video-page.php?video_id=' + videoId + '&user_id=' + userId;
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
   <script src="js/yarab.js"></script>
</body>

</html>