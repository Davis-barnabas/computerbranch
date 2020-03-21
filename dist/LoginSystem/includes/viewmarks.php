<?php
session_start();
require_once "dbh.inc.php";
$username = $_SESSION['userName'];
# Login confirmation
$sql = "SELECT * from teachers where teaUsername='$username';";
$res = mysqli_query($conn, $sql);
$sq = "SELECT * from students where studUsername='$username';";
$res1 = mysqli_query($conn, $sq);
$hodass = mysqli_fetch_assoc($res);
if ($hodass['hod'] == 1) {
    $hod = $_SESSION['hod'];
} else {
    $hod = $_SESSION['hod'];
}
if ($res || $res1) {
    echo "<script>alert('Mark Statement');</script>";
}
#if enetering this page using login means they have to be sent to the login page to avoid everyone from 
#accessing this page
else {
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
    <style>
        #tit {
            font-family: 'Pacifico', sans-serif;
            font-weight: bold;

        }

        .but-sea {
            background-color: teal;
            color: white;
            border: none;
            padding: 0.75rem 1.2rem;
            margin-top: 1rem;
        }

        .heading {
            font-family: sans-serif;
            font-weight: bold;
        }

        table ,th,td{
            border: 1px solid black;
            border-collapse: collapse;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .nav-tit {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }

        .nssv-tit {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }

        .tit-bg {
            background-color: rgba(0, 0, 0, 0.2);
            height: 100px;
            border-radius: 40px;
            width: 60%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media only screen and (max-width:600px) {
            .tit-bg {
                border-radius: 40px;
                width: 80%;
                height: 100px;
                font-size: 3.3rem;
            }

            .heading {
                font-size: 2rem;
            }
        }

        .bd {

            background: url('../images/bg7.png') no-repeat center center/cover;
            background-attachment: fixed;
        }



        .viewmark {
            background-color: #b2ebf2 !important;
            padding: 1rem;
            border-radius: 20px;

        }
    </style>
</head>

<body class="bd">
    <!--Navbar-->
    <nav class="navbar-fixed deep-orange lighten-1">
        <div class="nav-wrapper">
            <div class="container">
                <a href="#" class="brand-logo nssv-tit hide-on-med-and-down" style="font-size:3rem;"> Department of Cs</a>
                <a href="#" class="brand-logo nav-tit hide-on-large-only left">Department of CS</a>
            </div>
        </div>
    </nav>
    <div class="container mark">
        <center>
            <h1 id="tit" class="tit-bg">Marks Statement</h1>
        </center>
        <br />
        <div class="viewmark ">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="hide-on-small-only">
                <?php
                #HOD has the access to view a entire class mark at a time
                if ($hod) {
                    echo '<div class="row">
                     <div class="input-field col s5 l5">
                    <i class="material-icons prefix">school</i>
                    <select name="studYear">
                        <option disabled selected>Class</option>
                        <option value="1">First Year</option>
                        <option value="2">Second Year</option>  
                        <option value="3">Third Year</option>
                    </select>
                </div>';
                } else {
                    #while class teacher can view only her students marks individually
                    echo '<div class="row">
                    <div class="input-field col s5 l5">
                        <i class="material-icons prefix">school</i>
                        <select name="studRoll">
                            <option disabled selected>Roll number</option>
                            ';
                    $s = "SELECT * from teachers where teaUsername='$username';";
                    $r = mysqli_query($conn, $s);
                    $t = mysqli_fetch_assoc($r);
                    $class =  $t['teaClass'];
                    $sql = "SELECT * from students WHERE studYear='$class';";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value=\"" . $row['studRoll'] . "\">" . $row['studRoll'] . "</option>";
                        }
                    }
                    echo ' </select>
                        <label class="black-text" style="font-family:\'Poppins\',sans-serif;">Roll number</label>
                        </div>';
                }
                ?>
                <div class="input-field col s5 l5">
                    <i class="material-icons prefix">school</i>
                    <select name="studExam">
                        <option disabled selected>Choose Exam</option>
                        <option value="1">Internal Marks</option>
                        <option value="2">Semester Marks</option>
                    </select>
                </div>
                <div class="col s2 l2">
                    <input type="submit" name="marks-sub" class="but-sea" value="Search">
                </div>
        </div>

        </form>
        <?php
        if (isset($_POST['marks-sub'])) {
            $roll = $_POST['studRoll'];
            $exam = $_POST['studExam'];
            #Internal Marks
            if ($exam == 1) {
                #sem1 internal marks
                $mark = "SELECT * from sem1marks where roll='$roll' ;";;

                $res = mysqli_query($conn, $mark);
                echo '<div class="sem1internal">
            <h3 class="heading hide-on-small-only">Semester 1 Internal Marks</h3>
            <table class="highlight hide-on-small-only">
                <tr>';
                echo '<th colspan="2">Tamil</th>
                    <th colspan="2">English</th>';
                echo '<th colspan="2">Introduction To Programming</th>
                    <th colspan="2">Introduction To Programming Lab</th>';
                echo '<th colspan="2">Operation Research</th>
                    <th colspan="2">Environmental Studies</th>';
                echo '<th colspan="2">RI</th>
                    <th colspan="2">MI</th>';
                echo '
                </tr>';
                while ($r = mysqli_fetch_assoc($res)) {
                    echo '<tr>
                    <td>';
                    echo $r['sem1p1i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem1p1i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem1p2i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem1p2i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem1p3s1i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem1p3s1i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem1p3s2i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem1p3s2i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem1p3s3i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem1p3s3i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem1p3s4i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem1p3s4i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem1p4s1i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem1p4s1i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem1p4s2i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem1p4s2i2'];
                    echo '</td>';
                    echo '</tr></table></div>';
                }
                #SEmester 2 internal marks
                $mark = "SELECT * from sem2marks where roll='$roll' ;";

                $res = mysqli_query($conn, $mark);

                echo '<div class="sem2internal"> 
               <h3 class="heading hide-on-small-only">Semester 2 Internal Marks</h3>
               <table class="highlight hide-on-small-only">
                <tr>';
                echo '<th colspan="2">Tamil</th>
                    <th colspan="2">English</th>';
                echo '<th colspan="2">Programming Abstractions</th>
                    <th colspan="2">Programming Abstractions Lab</th>';
                echo '<th colspan="2">Numerical Methods</th>
                    <th colspan="2">Probability & Statistics</th>';
                echo '<th colspan="2">Business Communication</th>';
                echo '</tr>';
                while ($r = mysqli_fetch_assoc($res)) {
                    echo '<tr>
                    <td>';
                    echo $r['sem2p1i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem2p1i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem2p2i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem2p2i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem2p3s1i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem2p3s1i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem2p3s2i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem2p3s2i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem2p3s3i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem2p3s3i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem2p3s4i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem2p3s4i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem2p4i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem2p4i2'];
                    echo '</td>';
                    echo '</tr>
            </table>
        </div>';
                }
                #SEmester 3 internal marks
                $mark = "SELECT * from sem3marks where roll='$roll' ;";

                $res = mysqli_query($conn, $mark);

                echo '<div class="sem3internal"> 
               <h3 class="heading hide-on-small-only">Semester 3 Internal Marks</h3>
               <table class="highlight hide-on-small-only">
                <tr>';
                echo '<th colspan="2">Tamil</th>
                    <th colspan="2">English</th>';
                echo '<th colspan="2">Object Oriented System Design</th>
                    <th colspan="2">Object Oriented System Design Lab</th>';
                echo '<th colspan="2">Electricity,Magnetism & Electromagnetism</th>
                    <th colspan="2">Applied Physics</th>';
                echo '</tr>';
                while ($r = mysqli_fetch_assoc($res)) {
                    echo '<tr><td>';
                    echo $r['sem3p1i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem3p1i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem3p2i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem3p2i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem3p3s1i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem3p3s1i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem3p3s2i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem3p3s2i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem3p3s3i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem3p3s3i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem3p3s4i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem3p3s4i2'];
                    echo '</td>';
                    echo '</tr>
            </table>
        </div>';
                }
                #SEmester 4 internal marks
                $mark = "SELECT * from sem4marks where roll='$roll' ;";

                $res = mysqli_query($conn, $mark);

                echo '<div class="sem4internal"> 
               <h3 class="heading hide-on-small-only">Semester 4 Internal Marks</h3>
               <table class="highlight hide-on-small-only">
                <tr>';
                echo '<th colspan="2">Tamil</th>
                    <th colspan="2">English</th>';
                echo '<th colspan="2">Database Management Systems</th>
                    <th colspan="2">Database Management Systems Lab</th>';
                echo '<th colspan="2">Solid State Devices & Microprocessor</th>
                    <th colspan="2">Applied Physics Practicals</th>';
                echo '<th colspan="2">Life Skills</th>';
                echo '</tr>';
                while ($r = mysqli_fetch_assoc($res)) {
                    echo '<tr>
                    <td>';
                    echo $r['sem4p1i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem4p1i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem4p2i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem4p2i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem4p3s1i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem4p3s1i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem4p3s2i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem4p3s2i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem4p3s3i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem4p3s3i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem4p3s4i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem4p3s4i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem4p4s1i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem4p4s1i2'];
                    echo '</td>';
                    echo '</tr>
            </table>
        </div>';
                }
                #SEmester 5 internal marks
                $mark = "SELECT * from sem5marks where roll='$roll' ;";

                $res = mysqli_query($conn, $mark);

                echo '<div class="sem5internal"> 
               <h3 class="heading hide-on-small-only">Semester 5 Internal Marks</h3>
               <table class="highlight hide-on-small-only">
                <tr>';
                echo '<th colspan="2">Database - Driven Web Design</th>
                    <th colspan="2">Database - Driven Web Design Lab</th>';
                echo '<th colspan="2">Principles of OS</th>
                    <th colspan="2">Digital Computer Architecture</th>';
                echo '<th colspan="2">Introduction to Computer Networks</th>
                    <th colspan="2">Image Editing Tools</th>';
                echo '<th colspan="2">Technical Communication</th>';
                echo '</tr>';
                while ($r = mysqli_fetch_assoc($res)) {
                    echo '<tr>
                    <td>';
                    echo $r['sem5p3s1i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem5p3s1i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem5p3s2i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem5p3s2i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem5p3s3i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem5p3s3i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem5p3s4i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem5p3s4i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem5p3s5i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem5p3s5i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem5p4s1i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem5p4s1i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem5p4s2i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem5p4s2i2'];
                    echo '</td>';
                    echo '</tr>
            </table>
        </div>';
                }
                #SEmester 6 internal marks
                $mark = "SELECT * from sem6marks where roll='$roll' ;";

                $res = mysqli_query($conn, $mark);

                echo '<div class="sem6internal"> 
               <h3 class="heading hide-on-small-only">Semester 6 Internal Marks</h3>
               <table class="highlight hide-on-small-only">
                <tr>';
                echo '<th colspan="2">Fundamentals of Software Engineering</th>
                    <th colspan="2">Fundamentals of Computer Science</th>';
                echo '<th colspan="2">Digital Electronics & Microprocessor</th>
                    <th colspan="2">Web Application Development</th>';
                echo '<th colspan="2">Project</th>
                    <th colspan="2">Gender Studies</th>';
                echo '</tr>';
                while ($r = mysqli_fetch_assoc($res)) {
                    echo '<tr>
                    <td>';
                    echo $r['sem6p3s1i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem6p3s1i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem6p3s2i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem6p3s2i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem6p3s3i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem6p3s3i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem6p3s4i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem6p3s4i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem6p3s5i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem6p3s5i2'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem6p4i1'];
                    echo '</td>';
                    echo '<td>';
                    echo $r['sem6p4i2'];
                    echo '</td>';
                    echo '</tr>
            </table>
        </div>';
                }
            }
        }
        ?>
        <center><iframe src="marktables.php" class="container hide-on-med-and-up" frameborder="yes" scrolling="yes" width="120%" height="450px"></iframe>

    </div>
    </div>

    <br />
    <br />
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