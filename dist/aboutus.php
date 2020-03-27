<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="description" content="Computer Science Department Website">
    <meta name="keywords" content="Department_website,Department,BHC Computer Science,Computer Science,Department portal,
    CSDepartment">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <!--thumnail-->
    <link rel="shortcut icon" href="images/thumbnail/home.png" type="image/x-icon">
    <!--Responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <!--Materialize Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .modalform {
            text-decoration: none;
            color: black;
            font-family: 'Roboto', sans-serif;
            font-size: 2rem;
        }

        html {
            scroll-behavior: smooth;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        @media only screen and (max-width:600px) {

            .abt {
                margin-top: -3rem;
            }

        }
    </style>
</head>

<body>
    <!--Navbar-->
    <nav class="navbar-fixed deep-orange lighten-1">
        <div class="nav-wrapper">
            <div class="container">
                <a href="#" class="brand-logo nssv-tit hide-on-med-and-down" style="font-size:3rem;">Department of CS</a>
                <a href="#" class="brand-logo nav-tit hide-on-large-only left">Department of CS</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index">Home</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="LoginSystem/login">Log in</a></li>
                    <li><a class="dropdown-trigger white-text" href="#!" data-activates="dropdown1">Sign up<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <a href="#" data-activates="slide-out" class="button-collapse right"><i class="material-icons">menu</i></a>
            </div>
        </div>
    </nav>
    <ul id="dropdown1" class="dropdown-content" style="margin-top:4rem;">
        <li><a href="LoginSystem/signup_stud" class="deep-orange-text">Student</a></li>
        <li class="divider"></li>
        <li><a href="LoginSystem/signup_tea" class="deep-orange-text">Professor</a></li>
    </ul>
    <div class="hamburger">
        <ul id="slide-out" class="side-nav">
            <center>
                <li><a class="subheader">Computer Science</a></li>
                <br />
                <br />
                <li><a href="index" class="waves-effect">Home</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="LoginSystem/login" class="waves-effect">Log in</a></li>
                <br />
                <li><a class="subheader">Sign Up</a></li>
                <li><a class="waves-effect" href="LoginSystem/signup_stud">1. Students</a></li>
                <li><a class="waves-effect" href="LoginSystem/signup_tea">2. Professors</a></li>
            </center>
        </ul>
    </div>
    <!--about us content here -->
    <div class="container">
        <div class="row ">
            <div class="about-department col s12 l8" id="about">
                <h1 class="black-text abt" style="font-weight: bold;">About Department</h1>
                <br />
                <p class="abt-para black-text ">Computer Science is a broad field which encompasses all aspects of computers, including the design and application of
                    both hardware and software. Career opportunities are diverse and are found in computer design, manufacturing,
                    development, testing, transportation, communications, research, education and management.
                </p>
                <br />
                <p class="abt-para black-text ">
                    The PG Department of Computer Science and Applications is the pioneer in computer science courses, being the first
                    college to offer a degree course in Computer Science in the city of Tiruchirapalli from the year 1984.
                </p>
            </div>
            <div class="notifications hide-on-small-only col l4 blue-grey lighten-5 ">
                <h2 class="center">Events</h2>
                <hr>
                <center>
                    <ul>
                        <li class="events-link light-blue darken-4"><a href="https://www.chits2020.tech/">1. Chits 2020</a></li>
                        <li class="events-link light-blue darken-4"><a href="placement.php">2. Placements</a></li>
                        <li class="events-link light-blue darken-4"><a href="#">3. Upcoming Exams</a></li>
                        <li class="events-link light-blue darken-4"><a href="#">4. Latest News</a></li>
                        <li class="dis-events center"><a href="#">Discover More</a></li>
                    </ul>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="notifications hide-on-med-and-up col s10 offset-s1 blue-grey lighten-5 ">
                <h2 class="center">Events</h2>
                <hr>
                <center>
                    <ul>
                        <li class="events-link light-blue darken-4"><a href="https://www.chits2020.tech/">1. Chits 2020</a></li>
                        <li class="events-link light-blue darken-4"><a href="placement.php">2. Placements</a></li>
                        <li class="events-link light-blue darken-4"><a href="#">3. Upcoming Exams</a></li>
                        <li class="events-link light-blue darken-4"><a href="#">4. Latest News</a></li>
                        <br />
                        <li class="dis-events center"><a href="#">Discover More</a></li>
                    </ul>
                </center>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="objective col s12 l12">
                <h2 class="orange-text">Objective</h2>
                <p class="abt-para black-text">The programs offered by the department imparts quality education for the students especially the poor, the needy and the
                    underprivileged by providing more career opportunities in IT sector, educational banking and Government.</p>
            </div>
        </div>
        <div class="row">
            <div class="infra ">
                <h2 class="orange-text">Infrastructure</h2>
                <p class="abt-para black-text">
                    The Department is equipped with a well-furnished computer laboratory and a Department Library furnished with the latest
                    journals and books on Computer. To break the geographical boundaries, the Department has a separate internet laboratory
                    for surfing the net. The A/C Seminar Hall with excellent seating arrangement and LCD projector facilities is fully put
                    to use by the Department.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="faculty">
                <h2 class="orange-text">Our Faculty</h2>
                <p class="abt-para black-text">
                    The faculty has some of the best talents drawn from academics and management professionals who spare no effort in
                    catering to every scholastic need of the students. Faculty members act as mentors, guiding students during the courses
                    to help them develop the necessary technical skills and attitudes required to become successful IT managers and
                    corporate citizens. They are also involved in research activities in various fields like Genetic Algorithm, Networking,
                    Data Structures, Software Engineering, Compiler design, Database Management Systems, Java, and Simulation Techniques.
                </p>
                <br />
                <center><a class="waves-effect waves-light btn-large teal" style="border-radius:15px;" href="LoginSystem/includes/abtStaff.php">Find More</a></center>
            </div>
        </div>
        <br />
    </div>
    <?php
    require "footer.php"
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.scrollspy').scrollSpy();
            $(".button-collapse").sideNav();
            $(".dropdown-trigger").dropdown();
        });
    </script>
</body>

</html>