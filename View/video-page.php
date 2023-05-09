<!DOCTYPE html>
<html lang="en">
<?php
include_once '../Controller/ManageVideo.php';
require_once '../Controller/ManageHistory.php';

?>
<?php
session_start();
$watcher = $_SESSION['userID'];

?>
<?php
// Retrieve the video ID and user ID from the URL query parameters
$videoId = $_GET['video_id'];
$userId = $_GET['user_id'];
$theHistory = new ManageHistory();
$theHistory->updateH($videoId, $watcher);

$video = ManageVideo::getInstance();
$VideoAttribute = $video->RetriveForVideoPage($videoId, $userId);
//$title= $VideoAttribute->getTitle();
//$description=$VideoAttribute->getDescription();
//$date=$VideoAttribute->getDate();
//$view=$VideoAttribute->getViews();
//$category=$VideoAttribute->getCategory();
$video1 = $VideoAttribute->getUrl();
$video1 = pathinfo($video1, PATHINFO_FILENAME);
$video1 = "../View/Videos/" . $video1 . "/" . $video1 . "_360.mp4";

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
<!--header-->

<?php
include 'header.php';
?>
<!--nav-->
<?php
include 'nav.php';
?>
    <div id="content-wrapper">
        <div class="container-fluid pb-0">
            <div class="video-block section-padding">
                <div class="row">
                    <div class="col-md-8">
                        <div class="single-video-left">
                            <div class="video-player">
                                <video class="video" width="100%" height="315" src=<?php echo "$video1" ?> frameborder="0" autoplay encrypted-media allowfullscreen></video>

                                <div class="player-controls">
                                    <div class="video-progress">
                                        <div class="video-progress-filled"></div>
                                    </div>

                                    <div class="inner-player-controls">
                                        <button class="play-button" title="Play" style="font-size:large;">►</button>

                                        <button class="mute control-button">
                                            <div class="mute muted slash"></div>
                                            <img src="img/volume.png"></img>
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

                                            <select class="control-button" style="color: white;">
                                                <option value="360p" style="color: black;">360p</option>
                                                <option value="240p" style="color: black;">240p</option>
                                                <option value="144p" style="color: black;">144p</option>
                                                </img>
                                            </select>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <a href="#" title="Play video" class="play"></a>
                            <span class="headline"></span>
                            <a href="https://twitter.com/stevenfabre" title="Follow me on twitter"
                               class="social">@stevenfabre</a>
                            <a href="http://stevenfabre.com" title="Read my blog" class="social">stevenfabre.com</a>
                        </div>
                        <div class="single-video-title boxx mb-3;" style="margin-bottom:-10%;">
                            <h2><a href="#"><?php echo $VideoAttribute->getTitle(); ?></a></h2>
                            <p class="mb-0"><i class="fas fa-eye"></i> <?php echo $VideoAttribute->getViews(); ?> views</p>

                            <div class="wrrapper">
                                <div class="like">

                                    <i onclick=" triggerLikeFunction('<?php echo $watcher; ?>','<?php echo $videoId; ?>',1); like();" id="li" id="wi" class="fas fa-thumbs-up fa-2xl"></i>

                                </div>
                                <p style="color: white; font-size: 27px; margin-top: -5px; ">|</p>
                                <div class="dislike">
                                    <i onclick="triggerLikeFunction('<?php echo $watcher; ?>','<?php echo $videoId; ?>',2); dislike();" id="di" class="fas fa-thumbs-down"></i>
                                </div>
                            </div>
                            <div class="wrraapper" style="margin-bottom: 10%; margin-left: 30%; margin-top:-5%;">
                                <p style="font-size: large; color: white; font-weight: 400;">+Save</p>
                                </select>
                            </div>
                        </div>
                        <div class="single-video-title boxx mb-3">
                            <div class="single-video-author boxx mb-3" style="margin-bottom:-50%;">
                                <div class="float-right">
                                    <button onclick="triggerSubscribeFunction('<?= $watcher;?>','<?= $userId?>')" id="subscribeBtn" class="btn btn-danger" type="button"><span>Subscribe </span><strong>1.4M</strong></button>
                                    <button class="btn btn btn-outline-danger" type="button" onclick="triggerBellFunction('<?= $watcher;?>','<?= $userId?>')">
                                        <i class="fas fa-bell"></i>
                                    </button>
                                </div>
                                <img class="img-fluid" src="img/s4.png" alt="">
                                <p><a href="#"><strong>Osahan Channel</strong></a> <span title="" data-placement="top"
                                                                                         data-toggle="tooltip" data-original-title="Verified"><i
                                                class="fas fa-check-circle text-success"></i></span></p>
                                <small>Published on Aug <?php echo $VideoAttribute->getDate(); ?> </small>
                            </div>
                            <div class="single-video-info-content box" style="box-sizing: 20%;">
                                <h6>Category :</h6>
                                <p><?php echo $VideoAttribute->getCategory(); ?> </p>
                                <h6>Description :</h6>
                                <p><?php echo $VideoAttribute->getDescription(); ?>  </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-video-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-title">
                                        <div class="btn-group float-right right-action">
                                            <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top
                                                    Rated</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp;
                                                    Viewed</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i>
                                                    &nbsp;
                                                    Close</a>
                                            </div>
                                        </div>
                                        <h6>Up Next</h6>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="video-cardd video-card-list">
                                        <div class="deo-card-image">
                                            <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                            <a href="#"><img class="img-fluid" src="img/v1.png" alt=""></a>
                                            <div class="time">3:50</div>
                                        </div>
                                        <div class="video-card-body">
                                            <div class="btn-group float-right right-action">
                                                <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top
                                                        Rated</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp;
                                                        Viewed</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i>
                                                        &nbsp;
                                                        Close</a>
                                                </div>
                                            </div>
                                            <div class="video-title">
                                                <a href="#">Here are many variati of passages of Lorem</a>
                                            </div>
                                            <div class="video-page text-success">
                                                Education <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                                             data-original-title="Verified"><i
                                                            class="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div class="video-view">
                                                1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video-card video-card-list">
                                        <div class="video-card-image">
                                            <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                            <a href="#"><img class="img-fluid" src="img/v2.png" alt=""></a>
                                            <div class="time">3:50</div>
                                        </div>
                                        <div class="video-card-body">
                                            <div class="btn-group float-right right-action">
                                                <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top
                                                        Rated</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp;
                                                        Viewed</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i>
                                                        &nbsp;
                                                        Close</a>
                                                </div>
                                            </div>
                                            <div class="video-title">
                                                <a href="#">Duis aute irure dolor in reprehenderit in.</a>
                                            </div>
                                            <div class="video-page text-success">
                                                Education <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                                             data-original-title="Verified"><i
                                                            class="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div class="video-view">
                                                1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video-card video-card-list">
                                        <div class="video-card-image">
                                            <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                            <a href="#"><img class="img-fluid" src="img/v3.png" alt=""></a>
                                            <div class="time">3:50</div>
                                        </div>
                                        <div class="video-card-body">
                                            <div class="btn-group float-right right-action">
                                                <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top
                                                        Rated</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp;
                                                        Viewed</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i>
                                                        &nbsp;
                                                        Close</a>
                                                </div>
                                            </div>
                                            <div class="video-title">
                                                <a href="#">Culpa qui officia deserunt mollit anim</a>
                                            </div>
                                            <div class="video-page text-success">
                                                Education <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                                             data-original-title="Verified"><i
                                                            class="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div class="video-view">
                                                1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video-card video-card-list">
                                        <div class="video-card-image">
                                            <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                            <a href="#"><img class="img-fluid" src="img/v4.png" alt=""></a>
                                            <div class="time">3:50</div>
                                        </div>
                                        <div class="video-card-body">
                                            <div class="btn-group float-right right-action">
                                                <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top
                                                        Rated</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp;
                                                        Viewed</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i>
                                                        &nbsp;
                                                        Close</a>
                                                </div>
                                            </div>
                                            <div class="video-title">
                                                <a href="#">Deserunt mollit anim id est laborum.</a>
                                            </div>
                                            <div class="video-page text-success">
                                                Education <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                                             data-original-title="Verified"><i
                                                            class="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div class="video-view">
                                                1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video-card video-card-list">
                                        <div class="video-card-image">
                                            <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                            <a href="#"><img class="img-fluid" src="img/v5.png" alt=""></a>
                                            <div class="time">3:50</div>
                                        </div>
                                        <div class="video-card-body">
                                            <div class="btn-group float-right right-action">
                                                <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top
                                                        Rated</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp;
                                                        Viewed</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i>
                                                        &nbsp;
                                                        Close</a>
                                                </div>
                                            </div>
                                            <div class="video-title">
                                                <a href="#">Exercitation ullamco laboris nisi ut.</a>
                                            </div>
                                            <div class="video-page text-success">
                                                Education <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                                             data-original-title="Verified"><i
                                                            class="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div class="video-view">
                                                1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video-card video-card-list">
                                        <div class="video-card-image">
                                            <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                            <a href="#"><img class="img-fluid" src="img/v6.png" alt=""></a>
                                            <div class="time">3:50</div>
                                        </div>
                                        <div class="video-card-body">
                                            <div class="btn-group float-right right-action">
                                                <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top
                                                        Rated</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp;
                                                        Viewed</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i>
                                                        &nbsp;
                                                        Close</a>
                                                </div>
                                            </div>
                                            <div class="video-title">
                                                <a href="#">There are many variations of passages of Lorem</a>
                                            </div>
                                            <div class="video-page text-success">
                                                Education <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                                             data-original-title="Verified"><i
                                                            class="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div class="video-view">
                                                1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video-card video-card-list">
                                        <div class="video-card-image">
                                            <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                            <a href="#"><img class="img-fluid" src="img/v2.png" alt=""></a>
                                            <div class="time">3:50</div>
                                        </div>
                                        <div class="video-card-body">
                                            <div class="btn-group float-right right-action">
                                                <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top
                                                        Rated</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp;
                                                        Viewed</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i>
                                                        &nbsp;
                                                        Close</a>
                                                </div>
                                            </div>
                                            <div class="video-title">
                                                <a href="#">Duis aute irure dolor in reprehenderit in.</a>
                                            </div>
                                            <div class="video-page text-success">
                                                Education <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                                             data-original-title="Verified"><i
                                                            class="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div class="video-view">
                                                1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                            </div>
                                        </div>
                                    </div>
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
<!-- Display the video and user IDs on the page -->
<script>
    const subscribeBtn = document.getElementById("subscribeBtn");
    subscribeBtn.addEventListener("click", function() {
        const textSpan = subscribeBtn.querySelector("span");
        if (textSpan.textContent === "Subscribe ") {
            textSpan.textContent = "Subscribed ";
            subscribeBtn.classList.remove("btn-danger");
            subscribeBtn.classList.add("btn-success");
        } else {
            textSpan.textContent = "Subscribe ";
            subscribeBtn.classList.remove("btn-success");
            subscribeBtn.classList.add("btn-danger");
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
<script src="js/ajax.js"></script>
<script src="js/subscribe.js"></script>

<script src="js/bell.js">
  <script src="js/toggleReact">


</script>

</body>

</html>