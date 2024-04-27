<?php session_start();

?>
<!DOCTYPE html>
<html>


<head>
    <title>Serite</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Serite</title>
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
                    // If the user is logged in, show the button
                    $user_id = $_SESSION['user_id'];
                    echo "<br/><a href='profile.php?id=" . $user_id . "' class='navbar__links'>Profile</a>";
                    echo "<br/><a href='dashboard.php' class='navbar__links'>Dashboard</a>";
                } else {
                    echo "<br/><a href='login.php' class='navbar__links'>Sign In</a>";
                }
                ?>



            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="main">
        <div class="main__container">
            <div class="main__content">
                <h1 class="animate__animated animate__fadeIn">Serite</h1>
                <p class="animate__animated animate__fadeIn">Ace your exams with ease using our study tools.</p>
                <button class="main__btn" id="foo">
                    <a href="signup.php">Get Started</a>
                </button>
            </div>
            <div class="main__img--container">
                <img id="main__img" src="/images/animated_graphic.gif" />
            </div>
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
    <script src="/js/test.js"></script>
</body>

</html>