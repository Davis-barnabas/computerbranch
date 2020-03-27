<?php
require "dbh.inc.php";
$sql1 = "SELECT * FROM teachers where teaClass=1";
$exe1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($exe1) > 0) {
    while ($res1 = mysqli_fetch_assoc($exe1)) {
        $username1 = $res1['teaUsername'];
    }
}
$sql2 = "SELECT * FROM teachers where teaClass=2";
$exe2 = mysqli_query($conn, $sql2);
if (mysqli_num_rows($exe2) > 0) {
    while ($res2 = mysqli_fetch_assoc($exe2)) {
        $username2 = $res2['teaUsername'];
    }
}
$sql3 = "SELECT * FROM teachers where teaClass=3";
$exe3 = mysqli_query($conn, $sql3);
if (mysqli_num_rows($exe3) > 0) {
    while ($res3 = mysqli_fetch_assoc($exe3)) {
        $username3 = $res3['teaUsername'];
    }
}
$sql4 = "SELECT * FROM teachers where hod=1";
$exe4 = mysqli_query($conn, $sql4);
if (mysqli_num_rows($exe4) > 0) {
    while ($res4 = mysqli_fetch_assoc($exe4)) {
        $usernamehod = $res4['teaUsername'];
    }
}


?>
<html>

<head>
    <!-- Compiled and minified CSS -->
    <title>Staff</title>
    <link rel="shortcut icon" href="../../images/thumbnail/proffessor.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <style>
        .imgcon {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: black;
            margin: auto;
            margin-top: 1rem;
            z-index: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .im1 {
            transition: margin 1s ease;
        }

        @media(min-width:600px) {
            .im1:hover {
                margin-top: -0.7rem;
                box-shadow: 0px 0px 50px;
            }
        }

        .gap {
            width: 100%;
            height: 150px;
        }

        #tit {
            font-size: 5rem;
            font-weight: bold;
        }

        .card {
            border-radius: 24px;
            margin-bottom: 3rem;
            background-color: #ff6e40;
            filter: grayscale(90%);
            transition: all 0.6s ease;
        }

        .card:hover {
            filter: grayscale(0%);
        }

        .imbg {
            background: url("../images/bg3.png") no-repeat center center/cover;
            background-attachment: scroll;
        }

        /*this is the animation for the popping up of the profile cards for both mobile and desktop */
        .im1 {
            top: -600px;
            animation: drop 4s ease forwards;
            transform-origin: 10px 10px;
        }

        @keyframes drop {
            0% {
                opacity: 0;
            }

            40% {
                transform: translateY(650px);
            }

            100% {
                transform: translateY(600px);
                opacity: 1;
            }
        }

        .card {
            font-family: 'Poppins', sans-serif;
        }

        .card .pname {
            font-weight: bold;
            font-size: 1.7rem;
        }

        .card p {
            font-size: 1.3rem;
            font-weight: normal;
        }

        .nav-tit,
        .nssv-tit {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="white ">
    <div class="imbg">
        <nav class="navbar-fixed deep-orange lighten-1">
            <div class="nav-wrapper">
                <div class="container">
                    <a href="#" class="brand-logo nssv-tit hide-on-med-and-down white-text" style="font-size:3rem;">Department of CS</a>
                    <a href="#" class="brand-logo nav-tit hide-on-large-only left white-text">Department of CS</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="../../index.php" class="white-text">Home</a></li>
                        <li><a href="../../aboutus.php" class="white-text">About Us</a></li>
                        <li><a href="../events.html" class="white-text">Events</a></li>
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
                    <li><a class="waves-effect sidelin" href="../../index.php">Home</a></li>
                    <li><a class="waves-effect sidelin" href="../../aboutus.php">About Us</a></li>
                    <li><a class="waves-effect sidelin" href="../events.html">Events</a></li>
                    <br />
                </center>
            </ul>
        </div>
        <!--Still here nav contents-->
        <div class="container ">
            <center>
                <h1 id="tit">Pro<span style="color:orange;">f</span>essors</h1>
            </center>
            <br />
            <br />
            <!--First Image-->
            <!-- Hod -->
            <div class="row">
                <div class="card col l4 offset-l4 offset-m4 s10 m4 offset-s1 im1 hoverable">
                    <?php
                    $sql = "SELECT * from teachers where teaUsername='$usernamehod';";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['teauserid']; //have to modify in database
                            $sqlimg = "SELECT * FROM profileimg WHERE userid = '$id'";
                            $resultImg = mysqli_query($conn, $sqlimg);
                            while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                              
                                if ($rowimg['stat'] == 0) {
                                    echo '<div class="propic">';
                                    echo " <div class='card-image waves-effect waves-block waves-light'>
                                               <div class='imgcon'>
                                                     <img  src='uploads/profile" . $id . ".jpg?'" . "style='z-index:1;width:100%;height:100%; border-radius:50%;'>
                                               </div>
                                              </div>
                                              <div class='card-content'>
                                                  <center><span class='card-title  black-text text-darken-4 pname'>" . $row['teaFname'] . "&nbsp" . $row['teaLname'] . "</span></center>
                                                  <center><p>Head of the Department</p></center>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>";
                                } else {
                                    echo "  echo '<div class='propic'>';
                                    <div class='card-image waves-effect waves-block waves-light'>
                                               <div class='imgcon'>
                                                   <img src='uploads/profiledefault.png' style='z-index:1;width:100%;height:100%; border-radius:50%;'> 
                                               </div> 
                                               </div>
                                                   <div class='card-content'>
                                                      <center><span class='card-title  black-text text-darken-4 pname'>" . $row['teaFname'] . "&nbsp" . $row['teaLname'] . "</span></center>
                                                      <center><p>Head of the Department</p></center>
                                                  </div>
                                                 
                                            </div>
                                        </div>
                                    </div>";
                                }
                            }
                        }
                    }
                    ?>
                    <!-- Teacher 1  -->

                    <div class="row">
                        <div class="card col l3 s10 offset-s1 m3 im1 hoverable">
                            <?php
                            $sql = "SELECT * from teachers where teaUsername='$username1';";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['teauserid']; //have to modify in database
                                    $sqlimg = "SELECT * FROM profileimg WHERE userid = '$id'";
                                    $resultImg = mysqli_query($conn, $sqlimg);
                                    while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                                        echo '<div class="propic">';
                                        if ($rowimg['stat'] == 0) {
                                            echo " <div class='card-image waves-effect waves-block waves-light'>
                                                           <div class='imgcon'>
                                                                 <img src='uploads/profile" . $id . ".jpg?'" . "style='z-index:1;width:100%;height:100%; border-radius:50%;'>
                                                           </div>
                                                          </div>
                                                          <div class='card-content'>
                                                              <center><span class='card-title black-text text-darken-4 pname' style='margin-left:-1rem;'>" . $row['teaFname'] . "&nbsp" . $row['teaLname'] . "</span></center>
                                                              <center><p>Assistant Professor</p></center>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                              ";
                                        } else {
                                            echo "<div class='card-image waves-effect waves-block waves-light'>
                                               <div class='imgcon'>
                                                   <img  class='activator' src='uploads/profiledefault.png' style='z-index:1;width:100%;height:100%; border-radius:50%;'> 
                                               </div> 
                                               </div>
                                                   <div class='card-content'>
                                                      <center><span class='card-title activator black-text text-darken-4 pname' style='margin-left:-1rem;'>" . $row['teaFname'] . "&nbsp" . $row['teaLname'] . "</span></center>
                                                      <center><p>Assistant Professor</p></center>
                                                  </div>
                                            </div>
                                        </div>
                                    ";
                                        }
                                    }
                                }
                            }
                            ?>
                           <!-- Teacher 2 -->
                            <!--Second img-->
                            <div class="card col l3 s10 m3 offset-s1 offset-l1 offset-m1 im1 hoverable">
                                    <?php
                                    $sql = "SELECT * from teachers where teaUsername='$username2';";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['teauserid']; //have to modify in database
                                            $sqlimg = "SELECT * FROM profileimg WHERE userid = '$id'";
                                            $resultImg = mysqli_query($conn, $sqlimg);
                                            while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                                                echo '<div class="propic">';
                                                if ($rowimg['stat'] == 0) {
                                                    echo " <div class='card-image waves-effect waves-block waves-light'>
                                               <div class='imgcon'>
                                                     <img src='uploads/profile" . $id . ".jpg?'" . "style='z-index:1;width:100%;height:100%; border-radius:50%;'>
                                               </div>
                                              </div>
                                              <div class='card-content'>
                                                  <center><span class='card-title black-text text-darken-4 pname'>" . $row['teaFname'] . "&nbsp" . $row['teaLname'] . "</span></center>
                                                  <center><p>Assistant Professor</p></center>
                                            </div>
                                        </div>
                                  
                                    </div>
                                ";
                                                } else {
                                                    echo "<div class='card-image waves-effect waves-block waves-light'>
                                               <div class='imgcon'>
                                                   <img src='uploads/profiledefault.png' style='z-index:1;width:100%;height:100%; border-radius:50%;'> 
                                               </div> 
                                               </div>
                                                   <div class='card-content'>
                                                      <center><span class='card-title  black-text text-darken-4 pname'>" . $row['teaFname'] . "&nbsp" . $row['teaLname'] . "</span></center>
                                                      <center><p>Assistant Professor</p></center>
                                                  </div>
                                            </div>                                     
                                        </div>
                                    ";
                                                }
                                            }
                                        }
                                    }
                                    ?>

                                    <!--Third Image-->
                                    <div class="card col l3 s10 m3 offset-s1 offset-l1 offset-m1 im1 hoverable">
                                        
                                            <?php
                                            $sql = "SELECT * from teachers where teaUsername='$username3';";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $id = $row['teauserid']; //have to modify in database
                                                    $sqlimg = "SELECT * FROM profileimg WHERE userid = '$id'";
                                                    $resultImg = mysqli_query($conn, $sqlimg);
                                                    while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                                                        echo '<div class="propic">';
                                                        if ($rowimg['stat'] == 0) {
                                                            echo " <div class='card-image waves-effect waves-block waves-light'>
                                                                        <div class='imgcon'>
                                                                              <img src='uploads/profile" . $id . ".jpg?'" . "style='z-index:1;width:100%;height:100%; border-radius:50%;'>
                                                                        </div>
                                                                    </div>
                                                                       <div class='card-content'>
                                                                      <center><span class='card-title black-text text-darken-4 pname' style='margin-left:-1rem;'>" . $row['teaFname'] . "&nbsp" . $row['teaLname'] . "</span></center>
                                                                           <center><p>Assistant Professor</p></center>
                                                                      </div>
                                                                   </div>
                                                               </div>
                                                               </div>
                                                           ";
                                                        } else {
                                                            echo "<div class='card-image waves-effect waves-block waves-light'>
                                                                           <div class='imgcon'>
                                                                               <img src='uploads/profiledefault.png' style='z-index:1;width:100%;height:100%; border-radius:50%;'> 
                                                                           </div> 
                                                                           </div>
                                                                               <div class='card-content'>
                                                                                 <center> <span class='card-title black-text text-darken-4 pname' style='margin-left:-1rem;'>" . $row['teaFname'] . "&nbsp" . $row['teaLname'] . "</span></center>
                                                                                  <center><p>Assistant Professor</p></center>
                                                                              </div>
                                                                        </div>
                                                                    </div>          
                                                                </div>
                                                                ";
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                            <?php
                                            require "../../footer.php"
                                            ?>
                                            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
                                            <!-- Compiled and minified JavaScript -->
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
                                            <script>
                                                $(document).ready(function() {
                                                    $(".button-collapse").sideNav();
                                                    $('select').material_select();
                                                    $(".dropdown-trigger").dropdown();
                                                });
                                            </script>
</body>

</html>