<?php
session_start();
require "LoginSystem/includes/dbh.inc.php";
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
        html {
            scroll-behavior: smooth;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background:url("LoginSystem/images/bg7.png")no-repeat center;
            background-attachment: fixed;
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
                    <li><a href="#">Contact</a></li>
                    <li><a href="LoginSystem/login.php">Log in</a></li>
                    <li><a class="dropdown-trigger white-text" href="#!" data-activates="dropdown1">Sign up<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <a href="#" data-activates="slide-out" class="button-collapse right"><i class="material-icons">menu</i></a>
            </div>
        </div>
    </nav>
    <div class="hamburger">
        <ul id="slide-out" class="side-nav">
            <center>
                <li><a class="subheader">Computer Science</a></li>
                <br /><br />
                <li><a class="waves-effect sidelin" href="../index.php">Home</a></li>
                <li><a class="waves-effect sidelin" href="../aboutus.php">About Us</a></li>
                <li><a class="waves-effect sidelin" href="../events.html">Events</a></li>
                <br />
                <li><a class="subheader">Sign Up</a></li>
                <li><a class="waves-effect sidelin" href="signup_stud.php">1. Student</a></li>
                <li><a class="waves-effect sidelin" href="signup_tea.php">2. Professor</a></li>
            </center>
        </ul>
    </div>
    <!--Body-->
    <div class="container">
        <br />
        <br />
        <h1>Infosys</h1>
        <div class="row">
            <div class="logo col s6 l7 offset-s1 offset-l4 m7 offset-m4">
                <img src="images/infosys.jpg" width="350px" height="200px">
            </div>
        </div>
        <?php
        $sql = "SELECT * FROM placements where studCom=1";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($dis = mysqli_fetch_assoc($res)) {
                echo '
               <div class="row">
            <div class="col s12 offset-m3 offset-l3 m7 l7 ">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">';

                $sql1 = "SELECT * from students where studUsername='$dis[studName]';";
                $result = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['studRoll']; //have to modify in database
                        $sqlimg = "SELECT * FROM profileimg WHERE userid = '$id'";
                        $resultImg = mysqli_query($conn, $sqlimg);
                        while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                            echo '<div class="col s3 m3">';
                            if ($rowimg['stat'] == 0) {
                                echo "<img  src='LoginSystem/includes/uploads/profile" . $id . ".jpg?'" . "class='circle responsive-img'></div>";
                            } else {
                                echo "<img  src='LoginSystem/includes/uploads/profiledefault.png' class='circle responsive-img'></div>";
                            }
                        }
                    }
                }
                echo '
                        <div class="col s12">
                            <h3 class="flow-text">' . $dis['studName'] . '</h3>
                            <span class="black-text">' . $dis['studFeedback'] . '</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
            }
        }
        ?>

        <h1>Wipro</h1>
        <div class="row">
            <div class="logo col s6 l7 offset-s1 offset-l4 m7 offset-m4">
                <img src="images/wipro.png" width="350px" height="150px">
            </div>
        </div>
        <?php
        $sql = "SELECT * FROM placements where studCom=2";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($dis = mysqli_fetch_assoc($res)) {
                echo '<div class="row">
            <div class="col s12 m6 l6 ">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">';

                $sql1 = "SELECT * from students where studUsername='$dis[studName]';";
                $result = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['studRoll']; //have to modify in database
                        $sqlimg = "SELECT * FROM profileimg WHERE userid = '$id'";
                        $resultImg = mysqli_query($conn, $sqlimg);
                        while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                            echo '<div class="col s3 m3">';
                            if ($rowimg['stat'] == 0) {
                                echo "<img  src='LoginSystem/includes/uploads/profile" . $id . ".jpg?'" . "class='circle responsive-img'></div>";
                            } else {
                                echo "<img src='LoginSystem?includes/uploads/profiledefault.png' class='circle responsive-img'></div>";
                            }
                        }
                    }
                }
                echo '
                        <div class="col s12">
                            <h3 class="flow-text">' . $dis['studName'] . '</h3>
                            <span class="black-text">' . $dis['studFeedback'] . '</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
            }
        }
        ?>
        <h1>TCS</h1>
        <div class="row">
            <div class="logo col s6 l7 offset-l4 m7 offset-s1 offset-m4">
                <img src="images/tcs.png" width="350px" height="150px">
            </div>
        </div>
        <?php
        $sql = "SELECT * FROM placements where studCom=3";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($dis = mysqli_fetch_assoc($res)) {
                echo '<div class="row">
            <div class="col s12 m6 l6 ">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">';

                $sql1 = "SELECT * from students where studUsername='$dis[studName]';";
                $result = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['studRoll']; //have to modify in database
                        $sqlimg = "SELECT * FROM profileimg WHERE userid = '$id'";
                        $resultImg = mysqli_query($conn, $sqlimg);
                        while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                            echo '<div class="col s3 m3">';
                            if ($rowimg['stat'] == 0) {
                                echo "<img  src='LoginSystem/includes/uploads/profile" . $id . ".jpg?'" . "class='circle responsive-img'></div>";
                            } else {
                                echo "<img src='LoginSystem?includes/uploads/profiledefault.png' class='circle responsive-img'></div>";
                            }
                        }
                    }
                }
                echo '
                        <div class="col s12">
                            <h3 class="flow-text">' . $dis['studName'] . '</h3>
                            <span class="black-text">' . $dis['studFeedback'] . '</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
            }
        }
        ?>
        <h1>CTS</h1>
        <div class="row">
            <div class="logo col s6 l7 offset-l3 m7 offset-m3">
                <img src="images/cts.png" width="400px" height="200px">
            </div>

        </div>
        <?php
        $sql = "SELECT * FROM placements where studCom=4";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($dis = mysqli_fetch_assoc($res)) {
                echo '<div class="row">
            <div class="col s12 m6 l6 ">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">';

                $sql1 = "SELECT * from students where studUsername='$dis[studName]';";
                $result = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['studRoll']; //have to modify in database
                        $sqlimg = "SELECT * FROM profileimg WHERE userid = '$id'";
                        $resultImg = mysqli_query($conn, $sqlimg);
                        while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                            echo '<div class="col s3 m3">';
                            if ($rowimg['stat'] == 0) {
                                echo "<img  src='LoginSystem/includes/uploads/profile" . $id . ".jpg?'" . "class='circle responsive-img'></div>";
                            } else {
                                echo "<img src='LoginSystem?includes/uploads/profiledefault.png' class='circle responsive-img'></div>";
                            }
                        }
                    }
                }
                echo '
                        <div class="col s12">
                            <h3 class="flow-text">' . $dis['studName'] . '</h3>
                            <span class="black-text">' . $dis['studFeedback'] . '</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
            }
        }
        ?>
        <h1>Deloitte</h1>
        <?php
        $sql = "SELECT * FROM placements where studCom=5";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($dis = mysqli_fetch_assoc($res)) {
                echo '<div class="row">
            <div class="col s12 m6 l6 ">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">';

                $sql1 = "SELECT * from students where studUsername='$dis[studName]';";
                $result = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['studRoll']; //have to modify in database
                        $sqlimg = "SELECT * FROM profileimg WHERE userid = '$id'";
                        $resultImg = mysqli_query($conn, $sqlimg);
                        while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                            echo '<div class="col s3 m3">';
                            if ($rowimg['stat'] == 0) {
                                echo "<img  src='LoginSystem/includes/uploads/profile" . $id . ".jpg?'" . "class='circle responsive-img'></div>";
                            } else {
                                echo "<img src='LoginSystem?includes/uploads/profiledefault.png' class='circle responsive-img'></div>";
                            }
                        }
                    }
                }
                echo '
                        <div class="col s12">
                            <h3 class="flow-text">' . $dis['studName'] . '</h3>
                            <span class="black-text">' . $dis['studFeedback'] . '</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
            }
        }
        ?>
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