<?php
require_once '../Model/User.php';
require_once '../Controller/Database.php';
require_once '../Controller/AuthController.php';

// Start the session
session_start();


// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $country = $_POST['country'];

    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid email format';
        header('Location: register.php');
        exit();
    }

    // Validate the password
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password)) {
        $_SESSION['error'] = 'Password must be at least 8 characters long, contain at least one lowercase letter, one uppercase letter, and one number';
        header('Location: register.php');
        exit();
    }

    // Check if the password and confirm password match
    if ($password !== $confirm_password) {
        $_SESSION['error'] = 'Passwords do not match';
        header('Location: register.php');
        exit();
    }
    
    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    

      $user=new user('',$name,$email,$hashed_password,$country);
       $auth=new AuthController;
    

      if($auth->register($user)) {
         echo '<script>alert("You have signed up successfully!"); window.location.href = "index.php";</script>';
     }


      else {
         // registration failed
         // display error message
         
         if(isset($_SESSION['errMsg'])) {
             echo "<div class='error'>" . $_SESSION['errMsg'] . "</div>";
             unset($_SESSION['errMsg']);
         } 
        
         
   }
          if (isset($_SESSION['error'])) {
      
           header('Location: register.php');
           exit();
          echo '<p class="error">' . $_SESSION['error'] . '</p>';

           unset($_SESSION['error']);

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
                     <?php
                         

                          if(isset($_SESSION['error'])) {
                               echo '<p class="error" >' . $_SESSION['error'] . '</p>';
                                     unset($_SESSION['error']);
   
                                   }  
                          
                                        
                                 


                     ?>
                  </div>
                  <form  id="signup-form" action="#" method="POST">
                     <div class="form-group">
                        <label> Email </label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Your Email" required>
                     </div>
                     <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="name"class="form-control" placeholder="Enter YourName"  required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password"  required>
                     </div>
                     <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password"  required>
                     </div>
                     <div class="form-group"> 
                     <label>Select your country</label>
                     <select class="form-select" id="country" name="country"  required>
                        <option value="">country</option>
                        <option value="Egypt">Egypt</option>
                   
                     </select>
                     </div>
                     
                      
                     <div class="mt-4">
                        <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Sign Up</button>
                     </div>
                  </form>
                  <div class="text-center mt-5">
                     <p class="light-gray">Already have an Account? <a href="login.php">Sign In</a></p>
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
