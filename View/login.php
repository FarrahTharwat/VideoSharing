<?php

require_once '../Model/User.php';
require_once '../Controller/AuthController.php';

session_start();

$errMsg = "";

if(isset($_POST['email']) && isset($_POST['password']))
{
   if(!empty($_POST['email']) && !empty($_POST['password']))
   {
      $user = new User();
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      $user->setEmail($email);
      $user->setPassword($password);

      $auth = new AuthController();
      $loginResult = $auth->login($user);

      if(!$loginResult)
      {         
         $errMsg = $_SESSION["errMsg"];
      }
      else
      {         
         $_SESSION["userID"] = $loginResult["ID"];
         $_SESSION["userEmail"] = $loginResult["Email"];
         $_SESSION["userName"] = $loginResult["Name"];
         $errMsg = "No Error";
         header("location: index.php");
      }
   }
   
   else
   {
      $errMsg = "Please fill all the fields";
   }
}



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
   <body class="login-main-body">
      <section class="login-main-wrapper">
         <div class="container-fluid pl-0 pr-0">
            <div class="row no-gutters">
               <div class="col-md-5 p-5 bg-white full-height">
                  <div class="login-main-left">
                     <div class="text-center mb-5 login-main-left-header pt-4">
                        <img src="img/favicon.png" class="img-fluid" alt="LOGO">
                        <h5 class="mt-3 mb-3">Welcome to Vidoe</h5>
                     </div>

                     <?php
                        if($errMsg!="")
                        {
                           ?>
                           <div class="alert alert-danger" role="alert">
                              <?php echo $errMsg ?>
                           </div>
                           <?php

                        }
                     ?>
                     <form action="login.php" method="POST">
                        <div class="form-group">
                           <label>Email</label>
                           <div class="login-icons">
                              <i class="fas fa-regular fa-envelope login-icon"></i>
                              <input type="text" name="email" class="form-control login-form" placeholder="Enter your email">
                           </div>
                        </div>

                        <!-- <div class="input-group">
                           <div class="input-group-append">
                              <button class="btn btn-light" type="button">
                              <i class="fas fa-solid fa-lock login-icon"></i>
                              </button>
                           </div>
                           <input type="password" class="form-control" placeholder="Enter your password">
                        </div>
 -->

                        <div class="form-group">
                           <label>Password</label>
                           <div class="login-icons">
                              <i class="fas fa-solid fa-lock login-icon"></i>
                              <input type="password" name="password" class="form-control login-form" placeholder="Enter your password">
                           </div>
                        </div>
                        <div class="mt-4">
                           <div class="row">
                              <div class="col-12">
                                 <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Sign In</button>
                              </div>
                           </div>
                        </div>
                     </form>
                     <div class="text-center mt-5">
                        <p class="light-gray">Don’t have an account? <a href="register.php">Sign Up</a></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="login-main-right bg-white p-5 mt-5 mb-5">
                     <div class="owl-carousel owl-carousel-login">
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">​Watch videos offline</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Download videos effortlessly</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Create GIFs</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
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