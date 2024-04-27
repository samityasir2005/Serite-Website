<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <title>About Us</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Serite</title>
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" />
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
                    <a href="#" class="navbar__links">About</a>

                </li>


                <?php
                include 'config.php';


                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
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
        <div class="section">
            <div class="container">
                <div class="content-section">
                    <div class="title">
                        <h1>About Us</h1>
                    </div>
                    <div class="content">
                        <h3>Our Vision</h3>
                        <p>Our website is designed to help students of all ages and levels improve their study skills and achieve better grades. We offer a variety of tools and resources, including study tips, time management strategies, and practice quizzes, to help students learn more effectively and efficiently.

                            Our website also features a number of different study methods, such as flashcards, summarization, and pomodoro timer, to help students find the approach that works best for them.</p>
                    </div>
                    <div class="content">
                        <h3>The science behind studying</h3>
                        <p>There is a science to studying effectively, and there are many strategies and techniques that can help you learn more efficiently and retain more of the information that you are studying. Here are a few key principles to keep in mind when it comes to studying effectively: Effective studying involves a combination of several factors that can help you retain and understand new information. Here are some key principles of effective studying:

                            Start early: Don't wait until the last minute to start studying. It's easier to retain new information when you have more time to review and practice.

                            Create a study schedule: Divide your study time into smaller, more manageable blocks, and spread them out over a period of time. Serite offer the solutions and tools that help with different methods of studying for everyone! </p>
                    </div>
                    <div class="social">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="image-section">
                    <img src="serite-imgs/S v2.png">
                </div>
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
</body>

</html>