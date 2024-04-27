<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css" />
    <title>Dashboard</title>
</head>
<br>
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
                $user_id = $_SESSION['user_id'];
                echo "<br/><a href='profile.php?id=" . $user_id . "' class='navbar__links'>Profile</a>";
                echo "<br/><a href='dashboard.php' class='navbar__links'>Dashboard</a>";
            } else {
                header('location:index.php');
            }
            ?>



        </ul>
    </div>
</nav>

<body>
    <?php
    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
    }
    ?>
    <div id="dashboard">
        <div id="user-panel">
            <h1>User Panel</h1>
            <h3>Logged in as <?php echo $fetch['name']; ?>!</h3>
            <br>
            <button class="redirect-button" onclick="window.location.href='survey.php'">Study guides</button>
            <br>
            <button class="redirect-button" onclick="window.location.href='study-timer.php?id=<?php echo md5($user_id); ?>'">Study Timer</button>


        </div>
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