<?php
session_start();
require_once "dbh.inc.php";
$username = $_SESSION['userName'];
$sq = "SELECT * from students where studUsername='$username';";
$res1 = mysqli_query($conn, $sq);
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
    <title>Students Info</title>
    <!--thumnail-->
    <link rel="shortcut icon" href="../../images/thumbnail/info.png" type="image/x-icon">
    <link rel="stylesheet" href="teacher.css">
    <style>
        html {
            scroll-behavior: smooth;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 1.2rem;
        }

        .but-sea {
            background-color: teal;
            color: white;
            border: none;
            padding: 0.75rem 1.2rem;
            margin-top: 1rem;
        }

        html {
            scroll-behavior: smooth;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        footer {
            margin-top: 3rem;
        }

        body {
            background: url("../images/bg4.png") no-repeat center center/cover;
            background-attachment: fixed;

        }

        .infostud {
            margin-top: 3rem;
            margin-left: 1rem;
            margin-right: 1rem;
            border-radius: 10px;
            background-color: rgba(0, 203, 125, 0.83);
            padding: 2rem;
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
                    <li><a href="teamain.php?mes=info">Home</a></li>
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
                <li><a href="teamain.php?mes=info" class="waves-effect">Home</a></li>
                <li><a href="../../aboutus.php" class="waves-effect">About Us</a></li>
                <li><a href="logout.inc.php" class="waves-effect">Logout</a></li>
                <br />
                <li><a class="subheader">Sign Up</a></li>
                <li><a class="waves-effect" href="../signup_stud.php">1. Students</a></li>
                <li><a class="waves-effect" href="../signup_tea.php">2. Professors</a></li>
            </center>
        </ul>
    </div>
    <div class=" infostud">
        <center>
            <h1 style="font-family:sans-serif;font-weight:bold;">Students Information</h1>
        </center>
        <br />
        <!--After choosing a roll number ,that students details will be displayed below -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="hide-on-small-only">
            <?php
          if (!$r = mysqli_num_rows($res1) > 0){
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
            echo '
                    </select>
                    <label class="black-text" style="font-family:\'Poppins\',sans-serif;">Roll number</label>
                  </div>
                    <div class="col offset-s2 s1 offset-l1 l2">
                    <input type="submit" name="marks-sub" class="but-sea" value="Search">
                   </div>';
        }
        else{
            echo '<div class="row">';
        }
            ?>
    </div>
    </form>
    <!--Displaying the details-->
    <?php
    if (isset($_POST['marks-sub'])) {
        $roll = $_POST['studRoll'];
            $sql = "SELECT * from students WHERE studRoll='$roll';";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                echo '<table class="highlight hide-on-small-only"><tr><th>';
                echo 'Roll number</th>';
                echo '<th>First Name</th>';
                echo '<th>Last Name</th>';
                echo '<th>Gender</th>';
                echo '<th>Department</th>';
                echo '<th>Year</th>';
                echo '<th>Semester</th>';
                echo '<th>Phone Number</th>';
                echo '<th>Father Number</th>';
                echo '<th>Address</th>';
                echo '<th>Email</th></tr>';
                echo '<tr><td>' . $row['studRoll'] . '</td>';
                echo '<td>' . $row['studFname'] . '</td>';
                echo '<td>' . $row['studLname'] . '</td>';
                echo '<td>' . $row['studGender'] . '</td>';
                echo '<td>' . $row['studDep'] . '</td>';
                echo '<td>' . $row['studYear'] . '</td>';
                echo '<td>' . $row['studSemester'] . '</td>';
                echo '<td>' . $row['studPhone'] . '</td>';
                echo '<td>' . $row['studFatherPhone'] . '</td>';
                echo '<td>' . $row['studAddress'] . '</td>';
                echo '<td>' . $row['studEmail'] . '</td></tr></table>';
            }
        }
        else if ($r = mysqli_num_rows($res1) > 0) {
            $roll = $_SESSION['roll'];
        
        $sql = "SELECT * from students WHERE studRoll='$roll';";
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            echo '<table class="highlight hide-on-small-only"><tr><th>';
            echo 'Roll number</th>';
            echo '<th>First Name</th>';
            echo '<th>Last Name</th>';
            echo '<th>Gender</th>';
            echo '<th>Department</th>';
            echo '<th>Year</th>';
            echo '<th>Semester</th>';
            echo '<th>Phone Number</th>';
            echo '<th>Father Number</th>';
            echo '<th>Address</th>';
            echo '<th>Email</th></tr>';
            echo '<tr><td>' . $row['studRoll'] . '</td>';
            echo '<td>' . $row['studFname'] . '</td>';
            echo '<td>' . $row['studLname'] . '</td>';
            echo '<td>' . $row['studGender'] . '</td>';
            echo '<td>' . $row['studDep'] . '</td>';
            echo '<td>' . $row['studYear'] . '</td>';
            echo '<td>' . $row['studSemester'] . '</td>';
            echo '<td>' . $row['studPhone'] . '</td>';
            echo '<td>' . $row['studFatherPhone'] . '</td>';
            echo '<td>' . $row['studAddress'] . '</td>';
            echo '<td>' . $row['studEmail'] . '</td></tr></table>';
        }
        }
        
       
    ?>
    <iframe src="studinfo-mob.php" class="container hide-on-med-and-up" frameborder="yes" scrolling="yes" width="120%" height="450px"></iframe>

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