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
    <title>Marks Update</title>
    <!--thumnail-->
    <link rel="shortcut icon" href="../../images/thumbnail/mark.png" type="image/x-icon">

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
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
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

        html {
            scroll-behavior: smooth;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
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
                    <li><a href="#">Contact</a></li>
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
                    <a href="teamain.php" class="breadcrumb">Professor Page</a>
                    <a href="sem1marks.php" class="breadcrumb">Semester 1</a>
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
                        <h1 class="titsem black-text">Semester 1 Marks</h1>
                    </center>
                    <br />
                    <?php
                    if (isset($_GET['update'])) {
                        if ($_GET['update'] == "success") {
                            echo "<script>alert('Successfully Updated');</script>";
                        }
                    }
                    ?>
                    <!--Internal 1 marks -->
                    <div class="in1 hoverable">
                        <h3 class="tit black-text">Internal 1</h3>
                        <br />
                        <form action="marktea.php" method="POST">
                            <?php
                            echo '<div class="row">
                <div class="input-field col s5 l5">
                    <i class="material-icons prefix">school</i>
                    <select name="studRoll" size="4">
                        <option disabled selected>Roll number</option>
                        ';
                            $s = "SELECT * from teachers where teaUsername='$username';";
                            $r = mysqli_query($conn, $s);
                            $t = mysqli_fetch_assoc($r);
                            $class = $t['teaClass'];
                            $sql = "SELECT * from students WHERE studYear='$class';";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value=\"" . $row['studRoll'] . "\">" . $row['studRoll'] . "</option>";
                                }
                            }
                            ?>
                            </select>
                            <label class="black-text" style="font-family:\'Poppins\',sans-serif;">Roll number</label>
                    </div>
                </div>
                <?php
                $sql = "SELECT * from teachers where teaUsername='$username'";
                $result  = mysqli_query($conn, $sql);
                $re = mysqli_fetch_assoc($result);
                $arr = explode(",", $re['teaFSemSub']);
                foreach ($arr as $i) {
                    $sql1 = "SELECT * from sem1sub where course_code='$i';";
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
                        <button type="submit" name="sub-sem1in1" class="but">Update</button>
                    </div>
                </div>
                </form>
            </div>
            <!-- Internal 2 SEm 1-->
            <div class="in2 hoverable">
                <br />
                <h3 class="tit white-text">Internal 2</h3>
                <br />
                <form action="marktea.php" method="POST">
                    <?php
                    echo '<div class="row">
                <div class="input-field col s5 l5">
                    <i class="material-icons prefix">school</i>
                    <select name="studRoll" size="4">
                        <option disabled selected>Roll number</option>
                        ';
                    $s = "SELECT * from teachers where teaUsername='$username';";
                    $r = mysqli_query($conn, $s);
                    $t = mysqli_fetch_assoc($r);
                    $class = $t['teaClass'];
                    $sql = "SELECT * from students WHERE studYear='$class';";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value=\"" . $row['studRoll'] . "\">" . $row['studRoll'] . "</option>";
                        }
                    }
                    ?>
                    </select>
                    <label class="black-text" style="font-family:\'Poppins\',sans-serif;">Roll number</label>
            </div>
        </div>
        <?php
        $sql = "SELECT * from teachers where teaUsername='$username'";
        $result  = mysqli_query($conn, $sql);
        $re = mysqli_fetch_assoc($result);
        $arr = explode(",", $re['teaFSemSub']);
        foreach ($arr as $i) {
            $sql1 = "SELECT * from sem1sub where course_code='$i';";
            $res = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<div class=\"row\">
                        <!--Subject 1 -->
                        <div class=\"col s12 l6 m6\">
                            <center><h5 class=\"tith white-text\">" . $row['course_title'] . "</h5></center>
                        </div>
                       <div class=\"col s6 offset-s3 l3 offset-l2 m3 offset-m2\">
                             <input type=\"number\" name=\"" . $row['course_code'] . "\" class=\"validate white-text\">
                        </div>
                    </div>";
                }
            }
        }
        ?>
        <div class="row">
            <div class="col s4 offset-s4 l4 offset-l4">
                <button type="submit" name="sub-sem1in2" class="but">Update</button>
            </div>
        </div>
        </form>
    </div>
    <!-- Semester marks-->
    <div class="se hoverable">
        <br />
        <h3 class="tit black-text">Semester</h3>
        <br />
        <form action="marktea.php" method="POST">
            <?php
            echo '<div class="row">
                <div class="input-field col s5 l5">
                    <i class="material-icons prefix">school</i>
                    <select name="studRoll" size="4">
                        <option disabled selected>Roll number</option>
                        ';
            $s = "SELECT * from teachers where teaUsername='$username';";
            $r = mysqli_query($conn, $s);
            $t = mysqli_fetch_assoc($r);
            $class = $t['teaClass'];
            $sql = "SELECT * from students WHERE studYear='$class';";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=\"" . $row['studRoll'] . "\">" . $row['studRoll'] . "</option>";
                }
            }
            ?>
            </select>
            <label class="black-text" style="font-family:\'Poppins\',sans-serif;">Roll number</label>
    </div>
    </div>
    <?php
    $sql = "SELECT * from teachers where teaUsername='$username'";
    $result  = mysqli_query($conn, $sql);
    $re = mysqli_fetch_assoc($result);
    $arr = explode(",", $re['teaFSemSub']);
    foreach ($arr as $i) {
        $sql1 = "SELECT * from sem1sub where course_code='$i';";
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
        <div class="col s4 offset-s4 l4 offset-l4">
            <button type="submit" name="sub-sem1" class="but">Update</button>
        </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>

    <br />
    <center>
        <ul class="pagination ">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active orange"><a href="sem1marks.php">1</a></li>
            <li class="waves-effect"><a href="sem2marks.php">2</a></li>
            <li class="waves-effect"><a href="sem3marks.php">3</a></li>
            <li class="waves-effect"><a href="sem4marks.php">4</a></li>
            <li class="waves-effect"><a href="sem5marks.php">5</a></li>
            <li class="waves-effect"><a href="sem2marks.php"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </center>
    <br />
    <br />
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