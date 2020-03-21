<?php
session_start();
require_once "dbh.inc.php";
$username = $_SESSION['userName'];
#Login confirmation message 
if (!isset($_SESSION['userName'])) {
    header("Location: ../login.php?");
    exit();
}
?>
<html>

<head>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <meta http-equiv="Location" content="upload.php">
    <title>Teachers Home Page</title>
    <!--thumnail-->
    <link rel="shortcut icon" href="../../images/thumbnail/teacher.png" type="image/x-icon">
    <link rel="stylesheet" href="teacher.css">
    <style>
        .bg {
            background: url("../images/b1.png") no-repeat center center/cover;
            background-attachment: fixed;
        }

        html {
            scroll-behavior: smooth;
        }
        *{
            padding:0;
            margin:0;
            box-sizing:border-box;
        }
    </style>
</head>

<body>
    <!--Navbar-->
    <nav class="navbar-fixed deep-orange lighten-1">
        <div class="nav-wrapper">
            <div class="container">
                <a href="#" class="brand-logo nssv-tit hide-on-med-and-down" style="font-size:3rem;"> Department of Cs</a>
                <a href="#" class="brand-logo nav-tit hide-on-large-only left">Department of CS</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="../../index.php">Home</a></li>
                    <li><a href="../../aboutus.php">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="logout.inc.php">Logout</a></li>
                    <li><a class="dropdown-trigger white-text" href="#!" data-activates="dropdown1">Sign up<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <a href="#" data-activates="slide-out" class="button-collapse right"><i class="material-icons">menu</i></a>
            </div>
        </div>
    </nav>
    <ul id="dropdown1" class="dropdown-content" style="margin-top:4rem;">
        <li><a href="../signup_stud.php" class="deep-orange-text">Student</a></li>
        <li class="divider"></li>
        <li><a href="../signup_tea.php" class="deep-orange-text">Professor</a></li>
    </ul>
    <div class="hamburger">
        <ul id="slide-out" class="side-nav">
            <center>
                <li><a class="subheader">Computer Science</a></li>
                <br />
                <br />
                <li><a href="../../index.php" class="waves-effect">Home</a></li>
                <li><a href="../../aboutus.php" class="waves-effect">About Us</a></li>
                <li><a href="logout.inc.php" class="waves-effect">Logout</a></li>
                <br />
                <li><a class="subheader">Sign Up</a></li>
                <li><a class="waves-effect" href="../signup_stud.php">1. Students</a></li>
                <li><a class="waves-effect" href="../signup_tea.php">2. Professors</a></li>
            </center>
        </ul>
    </div>

    <!--footer-->
    <footer class="page-footer blue-grey darken-4">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="orange-text">Our Vision</h5>
                    <p class="grey-text text-lighten-4">Bishop Heber College, A great Institution of higher education set in beautiful surroundings, seeks to function through
                        mutual love and respect and with efficiency and creativity, catering to the educational needs of all, especially the
                        poor, the needy and the under-privileged, inspired by the love of our Lord Jesus Christ.
                    </p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="orange-text">Connect Us</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Instagram</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Gmail</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container" id="footer-copyright">
                © 2020 Department of CS. All Rights Reserved.
                <a class="grey-text text-lighten-4 right" href="http://bhc.edu.in/">Bishop Heber College</a>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                indicators: true,
                duration: 500,
            });
            $(".button-collapse").sideNav();
            $('select').material_select();
            $(".dropdown-trigger").dropdown();
        });
    </script>
</body>

</html>