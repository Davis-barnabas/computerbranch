
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
    <title>Home Page</title>
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="contact.php">Contact</a></li>
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
                <li><a href="aboutus.php" class="waves-effect">About Us</a></li>
                <li><a href="contact.php" class="waves-effect">Contact</a></li>
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
        <div class="carousel-item red white-text c4" href="#one!">
            <h2 id="head">First Panel</h2>
            <p class="white-text" id="para">This is your first panel</p>
        </div>
    </div>
   
    <!--Main Body-->
    <div class="container">
        <div class="row abtmob">
            <div class="about-department col s12 l8" id="about">
                <h1 class="black-text s" style="font-weight: bold;">About Department</h1>
                <br />
                <p class="abt-para black-text ">Computer Science is a broad field which encompasses all aspects of computers, including the design and application of
                    both hardware and software. Career opportunities are diverse and are found in computer design, manufacturing,
                    development, testing, transportation, communications, research, education and management.
                </p>
                <br />
                <p class="abt-para black-text ">
                    The PG Department of Computer Science and Applications is the pioneer in computer science courses, being the first
                    college to offer a degree course in&nbsp&nbsp......................
                </p>
                <br />
                <center><a class="waves-effect waves-light btn-large teal" style="border-radius:15px;" href="aboutus.php">Know More</a></center>
            </div>
            <div class="notifications hide-on-small-only col l4  blue-grey lighten-5">
                <h2 class="center scrollfire">Events</h2>
                <hr>
                <center><ul>
                    <li class="events-link light-blue darken-4"><a href="https://www.chits2020.tech/">1. Chits 2020</a></li>
                    <li class="events-link light-blue darken-4"><a href="placement.php">2. Placements</a></li>
                    <li class="events-link light-blue darken-4"><a href="#">3. Upcoming Exams</a></li>
                    <li class="events-link light-blue darken-4"><a href="#">4. Latest News</a></li>
                    <li class="dis-events center"><a href="#">Discover More</a></li>
                </ul>
                </center>
            </div>
        </div>
    </div>
    <br />
    </div>
    <!--Modal for login and signup-->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <center>
                <br />
                <p class="flow-text">This is a prototype website for the Department of Computer Science.
                    This website is designed to showcase how a department website actually should be by
                    providing all the day to day requirements that is needed by the students and professors.
                </p>
            </center>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>
    <?php
    require "footer.php";
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                indicators: true,
                duration: 500,
            });
            $('.modal').modal();
            $('.scrollspy').scrollSpy();
            $(".button-collapse").sideNav();
            $(".dropdown-trigger").dropdown();
            var options = [{
                selector: '.scrollfire',
                offset: 1000,
                callback: function() {
                    $('#modal1').modal('open');
                }
            }, ];
            Materialize.scrollFire(options);
        });
    </script>
</body>

</html>