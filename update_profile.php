<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);


   $old_pass = mysqli_real_escape_string($conn, ($_POST['old_pass']));
   $update_pass = mysqli_real_escape_string($conn, ($_POST['update_pass']));

   if (!empty($update_pass) || !empty($old_pass)) {
      if ($update_pass == $old_pass) {
         $message[] = 'Successfully updated profile';
         mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');
      } else {
         $message[] = 'incorrect password. Try agin.';
      }
   }


   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/' . $update_image;

   if (!empty($update_image) && $update_pass == $old_pass) {
      if ($update_image_size > 2000000) {
         $message[] = 'image is too large';
      } else {
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if ($image_update_query) {
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
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
   <title>update profile</title>

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
            $user_id = $_SESSION['user_id'];

            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
               // If the user is logged in, show the button
               echo "<br/><a href='profile.php?id=" . $user_id . "' class='navbar__links'>Profile</a>";
               echo "<br/><a href='dashboard.php' class='navbar__links'>Dashboard</a>";
            } else {
               echo "<br/><a href='login.php' class='navbar__links'>Sign In</a>";
            }
            ?>
         </ul>
      </div>
   </nav>

   <div class="update-profile">

      <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if (mysqli_num_rows($select) > 0) {
         $fetch = mysqli_fetch_assoc($select);
      }
      ?>

      <form action="" method="post" enctype="multipart/form-data">
         <?php
         if ($fetch['image'] == '') {
            echo '<img src="images/default-avatar.png">';
         } else {
            echo '<img src="uploaded_img/' . $fetch['image'] . '">';
         }
         if (isset($message)) {
            foreach ($message as $message) {
               echo '<div class="message">' . $message . '</div>';
            }
         }
         ?>
         <div class="flex">
            <div class="inputBox">
               <span>username :</span>
               <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
               <span>your email :</span>
               <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
               <span>update your pic :</span>
               <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
            </div>
            <div class="inputBox">
               <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
               <span>Enter your password :</span>
               <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            </div>
         </div>
         <input type="submit" value="update profile" name="update_profile" class="btn">
         <a href="profile.php" class="delete-btn">go back</a>
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
      <script src="/js/app.js"></script>
</body>

</html>