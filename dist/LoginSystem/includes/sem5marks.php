<?php
require "dbh.inc.php";
session_start();
$username = $_SESSION['userName'];
if (!isset($_SESSION['userName'])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Placement Info</title>
    <link rel="shortcut icon" href="images/thumbnail/job.png" type="image/x-icon">
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
    <style>
        .tit {
            font-family: sans-serif;
            font-weight: bold;
        }

        .titsem {
            font-family: sans-serif;
            font-weight: bold;
            font-size: 6rem;
        }

        @media only screen and (max-width:600px) {
            .titsem {
                font-size: 5rem;
            }
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: url("../images/markbg.png") no-repeat center center/cover;
            background-attachment: fixed;
        }

        .tith {
            font-family: sans-serif;
            font-weight: medium;
        }

        .but {
            background-color: teal;
            padding: 1rem 4rem;
            border: none;
            border-radius: 30px;
            color: white;
            transition: opacity 0.5s ease;
        }

        .but:hover {
            opacity: 0.8;
        }

        .in1,
        .in2,
        .se {
            background-color: greenyellow;
            width: 120%;
            padding: 2rem;
            margin-left: -10%;
            margin-bottom: 2rem;
            border-radius: 20px;
        }

        .in2 {
            background-color: #673ab7;
        }

        .se {
            background-color: orange;
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
                    <li><a href="../../index.php">Home</a></li>
                    <li><a href="../../aboutus.php">About Us</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="logout.inc.php">Log out</a></li>
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
                <br /><br />
                <li><a class="waves-effect sidelin" href="../../index.php">Home</a></li>
                <li><a class="waves-effect sidelin" href="../../aboutus.php">About Us</a></li>
                <li><a class="waves-effect sidelin" href="../events.html">Events</a></li>
                <li><a class="waves-effect sidelin" href="logout.inc.php">Log Out</a></li>
                <br />
                <li><a class="subheader">Sign Up</a></li>
                <li><a class="waves-effect sidelin" href="../signup_stud.php">1. Student</a></li>
                <li><a class="waves-effect sidelin" href="../signup_tea.php">2. Professor</a></li>
            </center>
        </ul>
    </div>
    <!-- BreadCrumb -->
    <nav>
        <div class="nav-wrapper blue-grey darken-2">
            <div class="container">
                <div class="col s12">
                    <a href="sem2marks.php" class="breadcrumb">Se..</a>
                    <a href="sem3marks.php" class="breadcrumb">Semester 3</a>
                    <a href="sem4marks.php" class="breadcrumb">Semester 4</a>
                    <a href="sem5marks.php" class="breadcrumb">Semester 5</a>
                </div>
            </div>
        </div>
    </nav>
    <!--main -->
    <div class="container">
        <div class="update-marks">
            <div class="container">
                <div class="sem1">
                    <center>
                        <h1 class="titsem black-text">Semester 5 Marks</h1>
                    </center>
                    <br />
                    <div class="in1">
                        <h3 class="tit black-text">Internal 1</h3>
                        <br />
                        <form action="sample.php" method="POST">
                            <div class="row">
                                <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">school</i>
                                    <select name="studRoll">
                                        <option value="" disabled selected>Choose the roll number</option>
                                        <?php
                                        $sql = "SELECT * from students";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value=\"" . $row['studRoll'] . "\">" . $row['studRoll'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label class="black-text">Roll number</label>
                                </div>
                            </div>
                            <?php
                            $sql = "SELECT * from teachers where teaUsername='$username'";
                            $result  = mysqli_query($conn, $sql);
                            $re = mysqli_fetch_assoc($result);
                            $arr = explode(",", $re['teaFiSemSub']);
                            foreach ($arr as $i) {
                                $sql1 = "SELECT * from sem5sub where course_code='$i';";
                                $res = mysqli_query($conn, $sql1);
                                if (mysqli_num_rows($res) > 0) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        echo "<div class=\"row\">
                        <!--Subject 1 -->
                        <div class=\"col s12 l6 m6\">
                            <center><h5 class=\"tith black-text\">" . $row['course_title'] . "</h5></center>
                        </div>
                       <div class=\"col s6 offset-s3 l3 offset-l2 m3 offset-m2\">
                             <input type=\"number\" name=\"" . $row['course_code'] . "\" class=\"validate\">
                        </div>
                    </div>";
                                    }
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col s4 offset-s4 l4 offset-l5">
                                    <button type="submit" name="sub-sem5in1" class="but">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="in2">
                        <!-- Internal 2 SEm 1-->
                        <br />
                        <h3 class="tit white-text">Internal 2</h3>
                        <br />
                        <form action="sample.php" method="POST">
                            <div class="row">
                                <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">school</i>
                                    <select name="studRoll">
                                        <option value="" disabled selected>Choose the roll number</option>
                                        <?php
                                        $sql = "SELECT * from students";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value=\"" . $row['studRoll'] . "\">" . $row['studRoll'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label class="white-text">Roll number</label>
                                </div>
                            </div>
                            <?php
                            $sql = "SELECT * from teachers where teaUsername='$username'";
                            $result  = mysqli_query($conn, $sql);
                            $re = mysqli_fetch_assoc($result);
                            $arr = explode(",", $re['teaFiSemSub']);
                            foreach ($arr as $i) {
                                $sql1 = "SELECT * from sem5sub where course_code='$i';";
                                $res = mysqli_query($conn, $sql1);
                                if (mysqli_num_rows($res) > 0) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        echo "<div class=\"row\">
                        <!--Subject 1 -->
                        <div class=\"col s12 l6 m6\">
                            <center><h5 class=\"tith white-text\">" . $row['course_title'] . "</h5></center>
                        </div>
                       <div class=\"col s6 offset-s3 l3 offset-l2 m3 offset-m2\">
                             <input type=\"number\" class=\"white-text\" name=\"" . $row['course_code'] . "\" class=\"validate\">
                        </div>
                    </div>";
                                    }
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col s4 offset-s4 l4 offset-l5">
                                    <button type="submit" name="sub-sem5in2" class="but">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Semester marks-->
                    <br />
                    <div class="se">
                        <h3 class="tit black-text">Semester</h3>
                        <br />
                        <form action="sample.php" method="POST">
                            <div class="row">
                                <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">school</i>
                                    <select name="studRoll">
                                        <option value="" disabled selected>Choose the roll number</option>
                                        <?php
                                        $sql = "SELECT * from students";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value=\"" . $row['studRoll'] . "\">" . $row['studRoll'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label class="black-text">Roll number</label>
                                </div>
                            </div>
                            <?php
                            $sql = "SELECT * from teachers where teaUsername='$username'";
                            $result  = mysqli_query($conn, $sql);
                            $re = mysqli_fetch_assoc($result);
                            $arr = explode(",", $re['teaFiSemSub']);
                            foreach ($arr as $i) {
                                $sql1 = "SELECT * from sem5sub where course_code='$i';";
                                $res = mysqli_query($conn, $sql1);
                                if (mysqli_num_rows($res) > 0) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        echo "<div class=\"row\">
                        <!--Subject 1 -->
                        <div class=\"col s12 l6 m6\">
                            <center><h5 class=\"tith black-text\">" . $row['course_title'] . "</h5></center>
                        </div>
                       <div class=\"col s6 offset-s3 l3 offset-l2 m3 offset-m2\">
                             <input type=\"number\" name=\"" . $row['course_code'] . "\" class=\"validate\">
                        </div>
                    </div>";
                                    }
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col s4 offset-s4 l4 offset-l5">
                                    <button type="submit" name="sub-sem5" class="but">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center>
        <ul class="pagination ">
            <li class="waves-effect"><a href="sem4marks.php"><i class="material-icons">chevron_left</i></a></li>
            <li class="waves-effect"><a href="sem1marks.php">1</a></li>
            <li class="waves-effect"><a href="sem2marks.php">2</a></li>
            <li class="waves-effect"><a href="sem3marks.php">3</a></li>
            <li class="waves-effect"><a href="sem4marks.php">4</a></li>
            <li class="active orange"><a href="sem5marks.php">5</a></li>
            <li class="waves-effect"><a href="sem6marks.php">6</a></li>
            <li class="waves-effect"><a href="sem6marks.php"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </center>
    <!--footer-->
    <?php
    require "../../footer.php";
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.scrollspy').scrollSpy();
            $(".button-collapse").sideNav();
            $(".dropdown-trigger").dropdown();
            $('select').material_select();
        });
    </script>
</body>

</html>