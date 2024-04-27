<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM user_form WHERE id = '$user_id'";
$checkSQL = mysqli_query($conn, $sql);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected buttons
    $selectedButtons = $_POST['selectedButton'];
    $grade = $_POST['grade'];
    // Check if there are 3 buttons selected
    if (count($selectedButtons) == 3) {
        $subject1 = $selectedButtons[0];
        $subject2 = $selectedButtons[1];
        $subject3 = $selectedButtons[2];

        // Insert the subjects into the database
        $query = "UPDATE `user_form` SET subject1 = '$subject1', subject2 = '$subject2', subject3='$subject3' WHERE id = '$user_id'";
        mysqli_query($conn, $query) or die('query failed');
    } else {
        // Handle the case where less than 3 buttons are selected
    }
}

// Check if there are 3 buttons selected
if (!empty($grade)) {

    // Insert the subjects into the database
    $query = "UPDATE `user_form` SET grade = '$grade' WHERE id = '$user_id'";
    header('Location: survey.php?back=2');
    mysqli_query($conn, $query) or die('query failed');
} else {
    // Handle the case where less than 3 buttons are selected
}

if (mysqli_num_rows($checkSQL) !== 0) {
    $row = $checkSQL->fetch_assoc();
    if (!empty($row['grade'])) {
        header('Location: studyguide.php?back=3');
    }
}
$sql = "SELECT * FROM user_form WHERE id = '$user_id'";
$checkSQL = mysqli_query($conn, $sql);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
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
                $user_id = $_SESSION['user_id'];

                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    // If the user is logged in, show the button
                    echo "<br/><a href='profile.php?id=" . $user_id . "' class='navbar__links'>Profile</a>";
                    echo "<br/><a href='dashboard.php' class='navbar__links'>Dashboard</a>";
                } else {
                    header('location:login.php');
                }
                ?>



            </ul>
        </div>
    </nav>
    <div id="dashboard">
        <div id="user-panel">

            <form id="myForm" action="" method="post" autocomplete="off">
                <h1 align="center">Lets us get to know you.</h1>
                <br>
                <div style="text-align: center">
                    <span class="step" id="step-1">1</span>
                    <span class="step" id="step-2">2</span>
                    <span class="step" id="step-3">3</span>
                </div>

                <div class="tab" id="tab-1">
                    <label for="subjects">Select your school subjects select 3:</label><br />

                    <div class="cat action">
                        <label>
                            <input type="checkbox" value="Math" class="redirect-button" name="selectedButton[]" onclick="selectButton(this)" /><span>Math</span>
                        </label>
                    </div>

                    <div class="cat action">
                        <label>
                            <input type="checkbox" value="Science" class="redirect-button" name="selectedButton[]" onclick="selectButton(this)" /><span>Science</span>
                        </label>
                    </div>

                    <div class="cat action">
                        <label>
                            <input type="checkbox" value="English" class="redirect-button" name="selectedButton[]" onclick="selectButton(this)" /><span>English</span>
                        </label>
                    </div>

                    <div class="cat action">
                        <label>
                            <input type="checkbox" value="History" class="redirect-button" name="selectedButton[]" onclick="selectButton(this)" /><span>History</span>
                        </label>
                    </div>

                    <div class="cat action">
                        <label>
                            <input type="checkbox" value="Advanced Math" class="redirect-button" name="selectedButton[]" onclick="selectButton(this)" /><span>Advanced Math</span>
                        </label>
                    </div>

                    <div class="cat action">
                        <label>
                            <input type="checkbox" value="Other" class="redirect-button" name="selectedButton[]" onclick="selectButton(this)" /><span>Other</span>
                        </label>
                    </div>

                    <div class="index-btn-wrapper">
                        <div class="index-btn" onclick="run(1, 2);">Next</div>
                    </div>
                </div>

                <div class="tab" id="tab-2">
                    <label for="subjects">Select your grade:</label><br />
                    <?php
                    $grades = [9 => 'Grade 9', 10 => 'Grade 10', 11 => 'Grade 11', 12 => 'Grade 12', 'uni' => 'University'];

                    foreach ($grades as $grade => $grade_label) {
                        echo '<div class="cat action">';
                        echo '<label>';
                        echo '<input type="radio" value="' . $grade . '" name="grade"><span>' . $grade_label . '</span>';
                        echo '</label>';
                        echo '</div>';
                    }
                    ?>

                    <br>
                    <br>
                    <?php
                    echo isset($_POST['submit']) && empty($grade) ? 'Please select grade and then click submit' : '';
                    ?>
                    <div class="index-btn-wrapper">
                        <div class="index-btn" onclick="run(2, 1);">Previous</div>
                        <div class="index-btn" onclick="run(2, 3);">Next</div>
                    </div>
                </div>

                <div class="tab" id="tab-3">
                    <div class="index-btn-wrapper">
                        <div class="index-btn" onclick="run(3, 2);">Previous</div>
                        <button class="index-btn" type="submit" name="submit" style="background: blue">
                            Submit
                        </button>
                    </div>
                </div>
            </form>

            <script>
                // Default tab
                $(".tab").css("display", "none");
                $("#tab-1").css("display", "block");

                function run(hideTab, showTab) {
                    if (hideTab < showTab) {
                        // If not press previous button
                        // Validation if press next button
                        var currentTab = 0;
                        x = $("#tab-" + hideTab);
                        y = $(x).find("input");
                        for (i = 0; i < y.length; i++) {
                            if (y[i].value == "") {
                                $(y[i]).css("background", "#ffdddd");
                                return false;
                            }
                        }
                    }

                    // Progress bar
                    for (i = 1; i < showTab; i++) {
                        $("#step-" + i).css("opacity", "1");
                    }

                    // Switch tab
                    $("#tab-" + hideTab).css("display", "none");
                    $("#tab-" + showTab).css("display", "block");
                    $("input").css("background", "#fff");
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
    </div>
    <script src="js/study.js"></script>
</body>

</html>