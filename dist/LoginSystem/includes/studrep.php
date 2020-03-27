<?php
session_start();
require_once "dbh.inc.php";
$username = $_SESSION['userName'];
$roll = $_SESSION['roll'];
$rep = $_SESSION['rep'];
$sql = "SELECT * FROM studrep WHERE username='$username';";
if (!mysqli_query($conn, $sql)) {
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
    <title>Students Home Page</title>
    <!--thumnail-->
    <link rel="shortcut icon" href="../../images/thumbnail/students.png" type="image/x-icon">
    <link rel="stylesheet" href="teacher.css">
    <style>
        html {
            scroll-behavior: smooth;
        }

        .content-upload {
            background: url('../images/bg3.png')no-repeat center center/cover;
            background-attachment: fixed;
        }

        .bg {
            background: url("../images/b1.png") no-repeat center center/cover;
            background-attachment: fixed;
        }

        .lat-news-up {
            background: rgba(0, 0, 6, 0.7);
            border-radius: 10px;
        }

        @media (max-width:600px) {
            #con-head {
                font-size: 4.5rem !important;
            }

            #lat-news-head {
                font-size: 2rem !important;
            }
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .c1 {
            background: url('../../images/students4.jpg') no-repeat center center/cover !important;
            background-attachment: fixed;
        }

        .c2 {
            background: url('../../images/stud2.jpg') no-repeat center center/cover;

        }

        .c3 {
            background: url('../../images/stud4.jpg') no-repeat center center/cover;

        }


        .c4 {
            background: url('../../images/stud1.jpg')no-repeat center center/cover;

        }
    </style>
</head>

<body>
    <!-- Login confirmation message -->
    <?php
    if (isset($_GET['login'])) {
        if ($_GET['login'] == "success") {
            echo "<script>alert('You have logged in as Representative');</script>";
        }
    } else if (isset($_GET['upload'])) {
        if ($_GET['upload'] == "success") {
            echo "<script>alert('User image has been uploaded Successfully');</script>";
        }
    } else if (isset($_GET['mes'])) {
        if ($_GET['mes'] == "er") {
            echo "<script>confirm('This type is not allowed to be uploaded');</script>";
        } else if ($_GET['mes'] == "fileerr") {
            echo "<script>alert('There is an error occured while uploading...Maybe due to the size or other factors.');</script>";
        } else if ($_GET['mes'] == "not") {
            echo "<script>alert('The file is too big');</script>";
        }
    } else {
        header("Location: ../login.php?");
        exit();
    }
    ?>
    <!--Navbar-->
    <nav class="navbar-fixed deep-orange lighten-1">
        <div class="nav-wrapper">
            <div class="container">
                <a href="#" class="brand-logo nssv-tit hide-on-med-and-down" style="font-size:3rem;font-family:sans-serif;"> Department of CS</a>
                <a href="#" class="brand-logo nav-tit hide-on-large-only left" style="font-family:sans-serif;">Department of CS</a>
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
    <!--teachers page-->
    <div class="maintea">
        <div class="row">
            <div class="col l3 m3 hide-on-small-only profile amber acccent-4">
                <br />
                <div class="profile-img">
                    <?php
                    $sql = "SELECT * from students where studUsername='$username';";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['studRoll']; //have to modify in database
                            $sqlimg = "SELECT * FROM profileimg WHERE userid = '$id'";
                            $resultImg = mysqli_query($conn, $sqlimg);
                            while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                                echo '<div class="propic ">';
                                if ($rowimg['stat'] == 0) {
                                    echo "<center><img class='hoverable' src='uploads/profile" . $id . ".jpg?'" . "width='150px' height='150px'></center>";
                                } else {
                                    echo "<center><img class='hoverable' src='uploads/profiledefault.png' width='150px' height='150px'></center>";
                                }
                                echo "<center><h5  style='font-size:2.5rem;font-family:sans-serif;font-weight:bold;'>" . ucfirst($row['studUsername']) . "</h5></center>";
                                echo "</div>";
                            }
                        }
                    }
                    ?>
                    <?php
                    $sql = "SELECT * from students where studUsername='$username';";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<hr />
        </div>
      </div>
      
      <div class="col m9 l9 s12 mainside">
           <!--Carousel-->
        <div class="carousel carousel-slider slid " data-indicators="true">
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
           </div>
    </div>
    <!--row2-->
    <div class="row">
     <div class="col l3 m3 hide-on-small-only  profile2 brown darken-3 ">
        <div class="tea-info">
          <br />
          <br />
          <center>
            <h5  style="font-family:"Poppins",sans-serif; class="white-text">First Name : &nbsp&nbsp<span id="proval">' . ucfirst($row['studFname']) . '</span></h5>
            <h5  style="font-family:"Poppins",sans-serif;" class="white-text">Last Name :&nbsp&nbsp<span id="proval">' . ucfirst($row['studLname']) . '</span></h5>
            <h5  style="font-family:"Poppins",sans-serif;" class="white-text">Year :&nbsp&nbsp<span id="proval">' . ucfirst($row['studYear']) . '</span></h5>
            <h5  style="font-family:"Poppins",sans-serif;" class="white-text">Department : &nbsp&nbsp<span id="proval">' . ucfirst($row['studDep']) . '</span></h5>';
                        }
                    }
                    ?>
                    <br />
                    <?php
                    if (isset($_SESSION['roll'])) {
                        echo "
                <form action='upload.php' method='POST' enctype='multipart/form-data'>
                  <label id='propicup'>Profile Image</label>
                        <br />
                   <input type='file' name='file' class='inputfile'>
                   <label for='file' id='choose' class='teal' style='border-radius:10px;' >Choose a file</label>
                   <br />
                   <button type='submit' name='submit' id='pro-subbut' title='jpg/less than 1mb'>Update</button>
                </form>";
                    }
                    ?>
                    </center>
                </div>
            </div>
            <div class="col m6 l6 s12 lat-news">
                <h2 style="font-weight:bold;">Latest News</h2>
                <br />
                <br />
                <p class="black-text" style="font-family:sans-serif;font-weight:medium;font-size:2rem;">This Page is used to update the contents of the website. Here we can the latest news
                    section along with the articles section.
                </p>
                <!--Button -->
            </div>
            <div class="notifications  col m3 l3 hide-on-small-only blue-grey lighten-5 ">
                <h2 class="center scrollfire events-tit" style="font-weight:bold">Events</h2>
                <hr>
                <center>
                    <ul>
                        <li class="events-link light-blue darken-4"><a href="https://www.chits2020.tech/">1. Chits 2020</a></li>
                        <li class="events-link light-blue darken-4"><a href="placement.php">2. Placements</a></li>
                        <li class="events-link light-blue darken-4"><a href="#">3. Upcoming Exams</a></li>
                        <!-- button -->
                        <br />
                        <li class="dis-events center"><a href="#">Discover More</a></li>
                    </ul>
                </center>
            </div>
        </div>
    </div>
    <div class="content-upload">
        <div class="container ">
            <div class="lat-news-up">
                <center>
                    <br />
                    <h1 style="font-family:sans-serif;font-size:5rem;font-weight:bold;" id="con-head" class="white-text">Content Update</h1>
                </center>
                <form action="update.php" method="POST">
                    <div class="row">
                        <div class="col s4 l4 m4">
                            <center><label style="color:white;font-size:2.5rem;" id="lat-news-head">Latest News</label></center>
                        </div>
                        <br />
                        <div class="input-field col s7 l7">
                            <textarea id="textarea1" class="materialize-textarea"></textarea>
                            <label for="textarea1" style="color:white;font-size:1rem;">Latest News Update</label>
                        </div>
                    </div>
                    <center>
                        <br />
                        <h1 style="font-family:sans-serif;font-size:5rem;font-weight:bold;" id="con-head" class="white-text">Placements</h1>
                    </center>
                    <div class="row">
                        <div class="col s4 l4 m4">
                            <center><label style="font-size:2.5rem;" id="lat-news-head" class="white-text">Students Name</label></center>
                        </div>
                        <div class="input-field col s7 l7">
                            <input id="us_name" type="text" name="studname" class="validate">
                            <label for="us_name">Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4 l4 m4">
                            <center><label style="font-size:2.5rem;" id="lat-news-head" class="white-text">Feedback</label></center>
                        </div>
                        <div class="input-field col s7 l7">
                            <input id="stud_feed" type="text" name="studfeed" class="validate">
                            <label for="stud_feed">Students Feedback</label>
                        </div
                    </div>
                    <div class="row">
                        <div class="col offset-s5 offset-l5 l3 s3">
                            <button type="submit" name="submitcon" id="pro-subbut">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- profile for mobile view -->
    <div class="pro-mobile">
        <div class="row">
            <div class="col s12 hide-on-med-and-up profile  amber lighten-3">
                <br />
                <div class="profile-img">
                    <?php
                    $sql = "SELECT * from students where studUsername='$username';";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['studRoll']; //have to modify in database
                            $sqlimg = "SELECT * FROM profileimg WHERE userid = '$id'";
                            $resultImg = mysqli_query($conn, $sqlimg);
                            while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                                echo '<div class="propic">';
                                if ($rowimg['stat'] == 0) {
                                    echo "<center><img src='uploads/profile" . $id . ".jpg?'" . "width='150px' height='150px'></center>";
                                } else {
                                    echo "<center><img src='uploads/profiledefault.png' width='150px' height='150px'></center>";
                                }
                                echo "<center><h5  style='font-size:2.5rem;font-family:'Poppins',sans-serif;'>" . ucfirst($row['studUsername']) . "</h5></center>";
                                echo "<center><div class='line'></div><center>";
                                echo "</div>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 hide-on-med-and-up amber lighten-3 pro-det">
                <?php
                $sql = "SELECT * from students where studUsername='$username';";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
              <br />
              <center>
            <h5  style="font-family:"Poppins",sans-serif;">First Name : &nbsp&nbsp<span id="proval">' . ucfirst($row['studFname']) . '</span></h5>
            <h5  style="font-family:"Poppins",sans-serif;">Last Name :&nbsp&nbsp<span id="proval">' . ucfirst($row['studLname']) . '</span></h5>
            <h5  style="font-family:"Poppins",sans-serif;">Year :&nbsp&nbsp<span id="proval">' . ucfirst($row['studYear']) . '</span></h5>
            <h5  style="font-family:"Poppins",sans-serif;">Department : &nbsp&nbsp<span id="proval">' . ucfirst($row['studDep']) . '</span></h5></center><br /><br />';
                    }
                }
                ?>
                <?php
                if (isset($_SESSION['roll'])) {
                    echo "
               <center> <form action='upload.php' method='POST' enctype='multipart/form-data'>
                  <label id='propicup'>Profile Image</label>
                        <br />
                        <br />
                   <input type='file' name='file' class='inputfile'>
                   <label for='file' id='choose' class='teal' style='border-radius:10px;' >Choose a file</label>
                   <br />
                   <button type='submit' name='submit' id='pro-subbut' title='jpg/less than 1mb'>Update</button>
                </form></center>
                <br />";
                }
                ?>
            </div>
        </div>
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