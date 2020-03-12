<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="description" content="Computer Science Department Website">
    <meta name="keywords" content="Department_website,Department,BHC Computer Science,Computer Science,Department portal,
    CSDepartment">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!--Responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <!--Materialize Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <!--Navbar-->
    <nav class="navbar-fixed deep-orange lighten-1">
        <div class="nav-wrapper">
            <div class="container">
                <a href="#" class="brand-logo nssv-tit hide-on-med-and-down" style="font-size:3rem;">Department of CS</a>
                <a href="#" class="brand-logo nav-tit hide-on-large-only left">Department of CS</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="LoginSystem/login.php">Log in</a></li>
                    <li><a class="dropdown-trigger white-text" href="#!" data-activates="dropdown1">Sign up<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <a href="#" data-activates="slide-out" class="button-collapse right"><i class="material-icons">menu</i></a>

            </div>
        </div>
    </nav>
    <ul id="dropdown1" class="dropdown-content" style="margin-top:4rem;">
        <li><a href="LoginSystem/signup_stud.php" class="deep-orange-text">Student</a></li>
        <li class="divider"></li>
        <li><a href="LoginSystem/signup_tea.php" class="deep-orange-text">Professor</a></li>
    </ul>
    <div class="hamburger">
        <ul id="slide-out" class="side-nav">

            <center>
                <li><a class="subheader">Computer Science</a></li>
                <br />
                <br />
                <li><a href="index.php" class="waves-effect">Home</a></li>
                <li><a href="#about" class="waves-effect">About Us</a></li>
                <li><a href="LoginSystem/login.php" class="waves-effect">Log in</a></li>
                <br />
                <li><a class="subheader">Sign Up</a></li>
                <li><a class="waves-effect" href="LoginSystem/signup_stud.php">1. Students</a></li>
                <li><a class="waves-effect" href="LoginSystem/signup_tea.php">2. Professors</a></li>
            </center>
        </ul>

    </div>

    <!--Carousel-->
    <div class="carousel carousel-slider slid center" data-indicators="true">
        <div class="carousel-item red white-text c1 right-align" href="#one!">
            <h2 id="head">First Panel</h2>
            <p class="white-text" id="para">This is your first panel</p>
        </div>
        <div class="carousel-item red white-text c2" href="#one!">
            <h2 id="head">First Panel</h2>
            <p class="white-text" id="para">This is your first panel</p>
        </div>
        <div class="carousel-item red white-text c3 left-align" href="#one!">
            <h2 id="head">First Panel</h2>
            <p class="white-text" id="para">This is your first panel</p>
        </div>
        <div class="carousel-item red white-text c2" href="#one!">
            <h2 id="head">First Panel</h2>
            <p class="white-text" id="para">This is your first panel</p>
        </div>

    </div>
    <!--Main Body-->
    <div class="container">
        <div class="row">
            <div class="about-department col s12 l8 scrollspy" id="about">
                <h1 class="black-text" style="font-weight: bold;">About Department</h1>
                <br />
                <p class="abt-para black-text">Computer Science is a broad field which encompasses all aspects of computers, including the design and application of
                    both hardware and software. Career opportunities are diverse and are found in computer design, manufacturing,
                    development, testing, transportation, communications, research, education and management.
                </p>
                <br />
                <p class="abt-para black-text">
                    The PG Department of Computer Science and Applications is the pioneer in computer science courses, being the first
                    college to offer a degree course in Computer Science in the city of Tiruchirapalli from the year 1984.
                </p>

            </div>
            <div class="notifications hide-on-small-only col l4 ">
                <h2 class="center">Events</h2>
                <hr>
                <ul>
                    <li class="events-link light-blue darken-4"><a href="https://www.chits2020.tech/">1. Chits 2020</a></li>
                    <li class="events-link light-blue darken-4"><a href="#">2. Placements</a></li>
                    <li class="events-link light-blue darken-4"><a href="#">3. Upcoming Exams</a></li>
                    <li class="events-link light-blue darken-4"><a href="#">4. ICM Details</a></li>
                    <li class="dis-events center"><a href="#">Discover More</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="objective col s12 l12">
                <h2 class="orange-text">Objective</h2>
                <p class="abt-para black-text">The programs offered by the department imparts quality education for the students especially the poor, the needy and the
                    underprivileged by providing more career opportunities in IT sector, educational banking and Government.</p>
            </div>
        </div>
        <div class="row">
            <div class="infra">
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
            </div>
        </div>
        <br />
    </div>
    <!--Footer-->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                indicators: true,
            });
            $('.scrollspy').scrollSpy();
            $(".button-collapse").sideNav();
            $(".dropdown-trigger").dropdown();
        });
    </script>
</body>

</html>