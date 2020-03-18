<?php
session_start();
require_once "dbh.inc.php";
$username = $_SESSION['userName'];
?>
<html>

<head>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <meta http-equiv="Location" content="upload.php">
  <title>Teachers Home Page</title>
  <!--thumnail-->
  <link rel="shortcut icon" href="../../images/thumbnail/teacher.png" type="image/x-icon">
  <link rel="stylesheet" href="teacher.css">
  <style>
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
  } else {
    header("Location: ../login.php?");
    exit();
  }
  ?>
  <!--Navbar-->
  <nav class="navbar-fixed deep-orange lighten-1">
    <div class="nav-wrapper">
      <div class="container">
        <a href="#" class="brand-logo nssv-tit hide-on-med-and-down" style="font-size:3rem;">Department of CS</a>
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
  <!--teachers page-->
  <div class="maintea">
    <div class="row">
      <div class="col l3 m3 hide-on-small-only grey profile lighten-2">
        <br />
        <div class="profile-img">
          <?php
          $sql = "SELECT * from teachers where teaUsername='$username';";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['teauserid']; //have to modify in database
              $sqlimg = "SELECT * FROM profileimg WHERE userid = '$id'";
              $resultImg = mysqli_query($conn, $sqlimg);
              while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                echo '<div class="propic">';
                if ($rowimg['stat'] == 0) {
                  echo "<center><img src='uploads/profile" . $id . ".jpg?'" . "width='150px' height='150px'></center>";
                } else {
                  echo "<center><img src='uploads/profiledefault.png' width='150px' height='150px'></center>";
                }
                echo "<center><h5  style='font-size:2.5rem;font-family:'Poppins',sans-serif;'>" . ucfirst($row['teaUsername']) . "</h5></center>";
                echo "</div>";
              }
            }
          }
          ?>
          <?php
          $sql = "SELECT * from teachers where teaUsername='$username';";
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
      <div class="col l3 m3 hide-on-small-only  profile2 grey lighten-2">
        <div class="tea-info">
          <br />
          <br />
          <center>
            <h5  style="font-family:"Poppins",sans-serif;">First Name : &nbsp&nbsp<span id="proval">' . ucfirst($row['teaFname']) . '</span></h5>
            <h5  style="font-family:"Poppins",sans-serif;">Last Name :&nbsp&nbsp<span id="proval">' . ucfirst($row['teaLname']) . '</span></h5>
            <h5  style="font-family:"Poppins",sans-serif;">Class :&nbsp&nbsp<span id="proval">' . ucfirst($row['teaClass']) . '</span></h5>
            <h5  style="font-family:"Poppins",sans-serif;">Department : &nbsp&nbsp<span id="proval">' . ucfirst($row['teaDep']) . '</span></h5>';
            }
          }
          ?>
          <br />
          <?php
          if (isset($_SESSION['id'])) {
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
          $sql = "SELECT * from content";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<p class="flow-text">' .
                $row['latestnews']
                . '</p>
          <br />';
            }
          }
          ?>
          <!--Button -->
          <center><a href="#" class="but" style="font-weight:bold;font-family:'Roboto',sans-serif;">Discover More</a></center>
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
      <!-- card 1 -->
      <div class="row">
        <div class="col s12 m3 l3 ">
          <div class="card amber darken-4 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Mark Statement</span>
              <p>
                Here you can assign mark for the internals,practicals and even for semesters
              </p>
            </div>
            <div class="card-action">
              <a href="#" class="deep-purple-text" style="font-weight:bold;font-family:'Roboto',sans-serif;">Update Marks</a>
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
                <br />
                <br />
              </p>
            </div>
            <div class="card-action">
              <a href="#" style="font-weight:bold;font-family:'Roboto',sans-serif;">Find More</a>
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
    <br />
    <!-- queries -->
    <div class="container">
      <div class="query">
        <div class="col s12 m7 l7">
          <h2 class="header" style="font-weight:bold;">Student Enquiry</h2>
          <div class="card horizontal hoverable">
            <div class="card-image">
              <img src="../images/query.png">
            </div>
            <div class="card-stacked ">
              <div class="card-content ">
                <p class="black-text enq " style="font-family:'Poppins',sans-serif; font-size:1.5rem ;">
                  Here we can know more about the students enquiry in detail.
                  It can be either about teaching or about the class.
                </p>
              </div>
              <div class="card-action">
                <a href="#" style="font-family:'Roboto',sans-serif;font-weight:bold;">Discover More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br />
    <br />
    <!-- profile for mobile view -->
    <div class="pro-mobile">
      <div class="row">
        <div class="col s12 hide-on-med-and-up profile  amber lighten-3">
          <br />
          <div class="profile-img">
            <?php
            $sql = "SELECT * from teachers where teaUsername='$username';";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['teauserid']; //have to modify in database
                $sqlimg = "SELECT * FROM profileimg WHERE userid = '$id'";
                $resultImg = mysqli_query($conn, $sqlimg);
                while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                  echo '<div class="propic">';
                  if ($rowimg['stat'] == 0) {
                    echo "<center><img src='uploads/profile" . $id . ".jpg?'" . "width='150px' height='150px'></center>";
                  } else {
                    echo "<center><img src='uploads/profiledefault.png' width='150px' height='150px'></center>";
                  }
                  echo "<center><h5  style='font-size:2.5rem;font-family:'Poppins',sans-serif;'>" . ucfirst($row['teaUsername']) . "</h5></center>";
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
          $sql = "SELECT * from teachers where teaUsername='$username';";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '
              <br />
              <center>
            <h5  style="font-family:"Poppins",sans-serif;">First Name : &nbsp&nbsp<span id="proval">' . ucfirst($row['teaFname']) . '</span></h5>
            <h5  style="font-family:"Poppins",sans-serif;">Last Name :&nbsp&nbsp<span id="proval">' . ucfirst($row['teaLname']) . '</span></h5>
            <h5  style="font-family:"Poppins",sans-serif;">Class :&nbsp&nbsp<span id="proval">' . ucfirst($row['teaClass']) . '</span></h5>
            <h5  style="font-family:"Poppins",sans-serif;">Department : &nbsp&nbsp<span id="proval">' . ucfirst($row['teaDep']) . '</span></h5></center><br /><br />';
            }
          }
          ?>
          <?php
          if (isset($_SESSION['id'])) {
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