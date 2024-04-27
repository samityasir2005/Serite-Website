<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);
   $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
   $name = stripslashes($name);
   $email = stripslashes($email);
   $pass = stripslashes($pass);
   $cpass = stripslashes($cpass);

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed 1');
   $error = false;
   $sql = "SELECT name FROM user_form WHERE name = '$name'";
   $checkSQL = mysqli_query($conn, $sql);
   if (mysqli_num_rows($checkSQL) != 0) {
      $error = true;
      $message[] = 'Username taken.';
   } else {
      if ($pass != $cpass) {
         $message[] = 'confirm password not matched!';
      } else {
         $insert = mysqli_prepare($conn, "INSERT INTO user_form (name, email, password) VALUES (?, ?, ?)");
         mysqli_stmt_bind_param($insert, "sss", $name, $email, $pass);
         mysqli_stmt_execute($insert);
         mysqli_stmt_close($insert); // Changed $stinsertmt to $insert
         if ($insert) {
            $message[] = 'registered successfully!';
            header('location:login.php');
         } else {
            $message[] = 'registration failed!';
         }
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>
   <!-- Navbar Section -->
   <nav class="navbar">
      <div class="navbar__container">
         <a class="navbar-brand" href="/">
            <div class="logo-image">
               <img src="/serite-imgs/S v3.png" width="100" height="auto" class="img-fluid" />
            </div>
         </a>
         <!--  <a href="/" id="navbar__logo"><i class="fas"></i>Serite</a>  -->

         <div class="navbar__toggle" id="mobile-menu">
            <span class="bar"></span> <span class="bar"></span>
            <span class="bar"></span>
         </div>
         <ul class="navbar__menu">
            <li class="navbar__item">
               <a href="index.php" class="navbar__links">Home</a>
            </li>
            <li class="navbar__item">
               <a href="about.php" class="navbar__links">About</a>
            </li>


            <?php
            include 'config.php';
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
               header('location:index.php');
            } else {
               echo "<br/><a href='login.php' class='navbar__links'>Sign In</a>";
            }
            ?>

         </ul>
      </div>
   </nav>

   <div class="form-container">

      <form action="" method="post" enctype="multipart/form-data">
         <h3>register now</h3>
         <?php
         if (isset($message)) {
            foreach ($message as $message) {
               echo '<div class="message">' . $message . '</div>';
            }
         }
         ?>
         <input type="text" name="name" placeholder="enter username" class="box" required>
         <input type="email" name="email" placeholder="enter email" class="box" required>
         <input type="password" name="password" placeholder="enter password" class="box" required>
         <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
         <input type="submit" name="submit" value="register now" class="btn">
         <p>already have an account? <a href="login.php">login now</a></p>
      </form>

   </div>
   <!-- Footer Section -->
   <div class="footer__container">
      <div class="footer__links">
         <div class="footer__link--wrapper">
            <div class="footer__link--items">
               <h2>About Us</h2>
               <a href="/sign__up">How it works</a> <a href="/">Testimonials</a>
               <a href="/">Careers</a> <a href="/">Investments</a>
               <a href="/">Terms of Service</a>
            </div>
            <div class="footer__link--items">
               <h2>Contact Us</h2>
               <a href="/">Contact</a> <a href="/">Support</a>
               <a href="/">Destinations</a> <a href="/">Sponsorships</a>
            </div>
         </div>
         <div class="footer__link--wrapper">
            <div class="footer__link--items">
               <h2>Videos</h2>
               <a href="/">Submit Video</a> <a href="/">Ambassadors</a>
               <a href="/">Agency</a> <a href="/">Influencer</a>
            </div>
            <div class="footer__link--items">
               <h2>Social Media</h2>
               <a href="/">Instagram</a> <a href="/">Facebook</a>
               <a href="/">Youtube</a> <a href="/">Twitter</a>
            </div>
         </div>
      </div>
      <section class="social__media">
         <div class="social__media--wrap">
            <div class="footer__logo">
               <a href="/" id="footer__logo"><i class="fas"></i>Serite</a>
            </div>
            <p class="website__rights">© Serite 2023. All rights reserved</p>
            <div class="social__icons">
               <a class="social__icon--link" href="/" target="_blank" aria-label="Facebook">
                  <i class="fab fa-facebook"></i>
               </a>
               <a class="social__icon--link" href="/" target="_blank" aria-label="Instagram">
                  <i class="fab fa-instagram"></i>
               </a>
               <a class="social__icon--link" href="/" target="_blank" aria-label="Youtube">
                  <i class="fab fa-youtube"></i>
               </a>
               <a class="social__icon--link" href="/" target="_blank" aria-label="Twitter">
                  <i class="fab fa-twitter"></i>
               </a>
               <a class="social__icon--link" href="/" target="_blank" aria-label="LinkedIn">
                  <i class="fab fa-linkedin"></i>
               </a>
            </div>
         </div>
      </section>
   </div>
   <script src="/js/app.js"></script>
</body>

</html>