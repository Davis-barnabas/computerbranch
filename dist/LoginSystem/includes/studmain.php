<?php
session_start();
require_once "dbh.inc.php";
$username = $_SESSION['userName'];
$roll = $_SESSION['roll'];

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

        .bg {
            background: url("../images/b1.png") no-repeat center center/cover;
            background-attachment: fixed;
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
            echo "<script>alert('You have logged in Successfully');</script>";
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
      <div class="col m9 l9 s12">
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
            <!-- main -->
            <div class="mob-main">
                <div class="col m6 l6 s12 lat-news">
                    <h2 style="font-weight:bold;">Latest News</h2>
                    <?php
                    $s = "SELECT * FROM students where studRoll='$roll';";
                    $r = mysqli_query($conn, $s);
                    $rt = mysqli_fetch_assoc($r);
                    #first year content
                    if ($rt['studYear'] == 1) {
                        $sql = "SELECT * from content";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<p  style="font-size:1.5rem;">' .
                                    $row['latestnews1']
                                    . '</p>
                                <br />';
                            }
                        }
                    }
                    #second year content
                    else if ($rt['studYear'] == 2) {
                        $sql = "SELECT * from content";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<p  style="font-size:1.5rem;">' .
                                    $row['latestnews2']
                                    . '</p>
                                <br />';
                            }
                        }
                    }
                    #third year content
                    else if ($rt['studYear'] == 3) {
                        $sql = "SELECT * from content";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<p style="font-size:1.5rem;">' .
                                    $row['latestnews3']
                                    . '</p>
                                <br />';
                            }
                        }
                    }
                    ?>
                </div>
                <div class="notifications  col m3 l3 hide-on-small-only blue-grey lighten-5 ">
                    <h2 class="center scrollfire events-tit" style="font-weight:bold">Events</h2>
                    <hr>
                    <center>

                        <ul>
                            <?php
                            $so = "SELECT * FROM students where studRoll='$roll';";
                            $re = mysqli_query($conn, $so);
                            $rt = mysqli_fetch_assoc($re);
                            if ($rt['studYear'] == 3) {
                                echo ' <li class="events-link light-blue darken-4"><a href="https://www.chits2020.tech/">1. Chits 2020</a></li>
                                <li class="events-link light-blue darken-4"><a href="../../placement.php">2. Placements</a></li>';
                                echo '<li class="events-link light-blue darken-4"><a href="#">3. Acheivers</a></li>
                                <li class="events-link light-blue darken-4"><a href="#">4. Assignments</a></li>
                            <br />
                            <br />';
                            } else {
                                echo '<br /> <li class="events-link light-blue darken-4"><a href="https://www.chits2020.tech/">1. Chits 2020</a></li>
                                <li class="events-link light-blue darken-4"><a href="#">2. Acheivers</a></li>
                                      <li class="events-link light-blue darken-4"><a href="#">3. Assignments</a></li>';
                            }
                            ?>
                        </ul>
                    </center>
                </div>
            </div>
        </div>
        <!--For the events in mobile view  via cards -->
        <div class="row">
            <!-- Chits 2020-->
            <div class="col s6 hide-on-med-and-up">
                <div class="card blue hoverable">
                    <div class="card-content white-text">
                        <span class="card-title">Chits 2020</span>
                        <br />
                        <p>
                            Chits is the technical symposium conducted by the department.
                        </p>
                        <br />

                    </div>
                    <div class="card-action">
                        <a href="https:\\www.chits2020.tech" class="white-text" style="font-weight:bold;font-family:'Roboto',sans-serif;">Discover More</a>
                    </div>
                </div>
            </div>
            <!-- Assignments-->
            <div class="col s6 hide-on-med-and-up ">
                <div class="card purple hoverable">
                    <div class="card-content white-text">
                        <span class="card-title">Acheivers</span>
                        <p>
                            Here we can see all the acheivers of our class.
                        </p>
                        <br />
                    </div>
                    <div class="card-action">
                        <a href="#" class="white-text" style="font-weight:bold;font-family:'Roboto',sans-serif;">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Assignments -->
            <div class="col s6 hide-on-med-and-up ">
                <div class="card red hoverable">
                    <div class="card-content white-text">
                        <span class="card-title">Assignments</span>
                        <p>
                            Recent assignments can be seen here.
                        </p>
                        <br />
                    </div>
                    <div class="card-action">
                        <a href="#" class="white-text" style="font-weight:bold;font-family:\'Roboto\',sans-serif;">Discover More</a>
                    </div>
                </div>
            </div>
            <!-- Placements for third year students-->
            <?php
            $so = "SELECT * FROM students where studRoll='$roll';";
            $re = mysqli_query($conn, $so);
            $rt = mysqli_fetch_assoc($re);
            if ($rt['studYear'] == 3) {
                echo '<div class="col s6 hide-on-med-and-up ">
                <div class="card green hoverable">
                    <div class="card-content white-text">
                        <span class="card-title">Placements</span>
                        <p>
                             Here we can find all those whogot selected in various companies.
                        </p>
                        <br />
                    </div>
                    <div class="card-action">
                        <a href="../../placement.php" class="white-text" style="font-weight:bold;font-family:\'Roboto\',sans-serif;">Discover More</a>
                    </div>
                </div>
            </div>';
            }
            ?>

        </div>
        <div class="bg">
            <!--Photo Gallery -->
            <div class="mob-main">
                <br />
                <center>
                    <h3 style="font-family:'Poppins',sans-serif;">Photo <span style="font-family:'Pacifico',sans-serif;">Gallery</span></h3>
                </center>
                <br />
                <div class="contain">
                    <div class="pg">
                        <div class="p1"></div>
                        <div class="p2"></div>
                        <div class="p3"></div>
                        <div class="p4"></div>
                        <div class="p5"></div>
                        <div class="p6"></div>
                        <div class="p7"></div>
                    </div>
                </div>
                <br />
                <br />
            </div>
            <br />
            <div class="container">
                <div class="row">
                    <div class="col s12 m3 l3 ">
                        <div class="card purple hoverable">
                            <div class="card-content white-text">
                                <span class="card-title">Mark Statement</span>
                                <p>
                                    Here we can view the mark for the internals,practicals and even for semesters
                                </p>
                                <br />
                            </div>
                            <div class="card-action">
                                <a href="viewmarks.php" class="white-text" style="font-weight:bold;font-family:'Roboto',sans-serif;">View Marks</a>
                            </div>
                        </div>
                    </div>
                    <!-- card 2 -->
                    <div class="col s12 m3 l3">
                        <div class="card light-green darken-1 hoverable">
                            <div class="card-content white-text">
                                <span class="card-title">Student <br />Info</span>
                                <p>
                                    Here you can find all the information that you need about students.
                                </p>
                                <br />
                                <br />
                            </div>
                            <div class="card-action">
                                <a href="studinfo.php" style="font-weight:bold;font-family:'Roboto',sans-serif;" class=' white-text'>Find More</a>
                            </div>
                        </div>
                    </div>
                    <!-- downloads side -->
                    <div class="col s12 m6 l6">
                        <div class="card cyan hoverable">
                            <div class="card-content white-text">
                                <span class="card-title" style="font-weight:bold;font-size:2rem;">Downloads</span>
                                <br />
                                <a href="16.pdf" id="download">1. Syllabus (2016-2019)</a>
                                <br />
                                <br />
                                <a href="17.pdf" id="download">2. Syllabus (2017-2020)</a>
                                <br />
                                <br />
                            </div>
                        </div>
                    </div>
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