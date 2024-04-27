<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
};

if (isset($_GET['logout'])) {
    unset($user_id);
    $_SESSION['loggedin'] = false;
    session_destroy();
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

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
                    echo "<br/><a href='survey.php' class='navbar__links'>Dashboard</a>";
                } else {
                    echo "<br/><a href='login.php' class='navbar__links'>Sign In</a>";
                }
                ?>
            </ul>
        </div>
    </nav>
    <div class="main">
        <div class="main__container">
            <div id="timer">
                <span id="hours">00</span>:<span id="minutes">25</span>:<span id="seconds">00</span>
            </div>
            <div id="label">Study</div>
            <button id="start-button" class="start-button">Start</button>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

            <button id="fullscreen-button" onclick="toggleFullscreen()">
                <i class="material-icons">fullscreen</i> Click to full screen
            </button>

            <script src="/js/study-timer.js"></script>
            <script>
                function toggleFullscreen() {
                    var elem = document.documentElement;
                    if (document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement) {
                        if (document.exitFullscreen) {
                            document.exitFullscreen();
                        } else if (document.mozCancelFullScreen) {
                            /* Firefox */
                            document.mozCancelFullScreen();
                        } else if (document.webkitExitFullscreen) {
                            /* Chrome, Safari and Opera */
                            document.webkitExitFullscreen();
                        } else if (document.msExitFullscreen) {
                            /* IE/Edge */
                            document.msExitFullscreen();
                        }
                    } else {
                        if (elem.requestFullscreen) {
                            elem.requestFullscreen();
                        } else if (elem.mozRequestFullScreen) {
                            /* Firefox */
                            elem.mozRequestFullScreen();
                        } else if (elem.webkitRequestFullscreen) {
                            /* Chrome, Safari and Opera */
                            elem.webkitRequestFullscreen();
                        } else if (elem.msRequestFullscreen) {
                            /* IE/Edge */
                            elem.msRequestFullscreen();
                        }
                    }
                }
            </script>

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
        <script src="/js/app.js"></script>
</body>

</html>