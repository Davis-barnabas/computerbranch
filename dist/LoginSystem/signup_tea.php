<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Professor Signup</title>
    <link rel="shortcut icon" href="../images/thumbnail/signup.png" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <!--Materialize Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="loginstyle.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: url("images/loginbg1.jpg") no-repeat center center/cover;
            height: 100%;
            width: 100%;
            font-family: 'Poppins', sans-serif;
        }

        .forM {
            border-radius: 20px;
        }

        .forM .row {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .material-icons {
            color: black;
        }

        .sign-but {
            border: none;
            color: white;
            padding: 1.5rem 4rem;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 20px;
        }

        .sem34m {
            margin-top: -5rem;
        }

        .teaDet {
            margin-top: -6rem;
        }
    </style>
</head>

</html>

<body>
    <nav class="navbar-fixed grey lighten-4">
        <div class="nav-wrapper">
            <div class="container">
                <a href="#" class="brand-logo nssv-tit hide-on-med-and-down black-text" style="font-size:3rem;">Department of CS</a>
                <a href="#" class="brand-logo nav-tit hide-on-large-only left black-text">Department of CS</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="../index.php" class="black-text">Home</a></li>
                    <li><a href="../aboutus.php" class="black-text">About Us</a></li>
                    <li><a href="../events.html" class="black-text">Events</a></li>
                    <li><a href="login.php" class="black-text">Log in</a></li>
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
                <li><a class="waves-effect sidelin" href="login.php">Log In</a></li>
            </center>
        </ul>
    </div>
    <!--Login form -->
    <div class="container">
        <br />
        <br />
        <div class="white login-form forM offset-l3 l5">
            <center><img src="images/pro.png" height="200" width="200" class="hide-on-small-only"> </center>
            <center><img src="images/pro.png" height="150" width="150" class="hide-on-med-and-up"> </center>
            <center>
                <h4>&#60/Professor&#62</h4>
            </center>
            <center>
                <h1>Sign Up</h1>
            </center>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") { //
                    echo '<center><p style="color:red;font-family:sans-serif;font-size:1rem;">Fill in all the fields</p></center>';
                } else if ($_GET['error'] == "invalidusernameemail") { //
                    echo '<center><p style="color:red;font-family:sans-serif;font-size:1rem;">Invalid username and e-mail</p></center>';
                } else if ($_GET['error'] == "invalidusername") { //
                    echo '<center><p style="color:red;font-family:sans-serif;font-size:1rem;">Invalid Username</p></center>';
                } else if ($_GET['error'] == "invalidemail") { //
                    echo '<center><p style="color:red;font-family:sans-serif;font-size:1rem;">Invalid Mail</p></center>';
                } else if ($_GET['error'] == "passwordcheck") { //
                    echo '<center><p style="color:red;font-family:sans-serif;font-size:1rem;">Your passwords do not match</p></center>';
                } else if ($_GET['error'] == "usertaken") { //
                    echo '<center><p style="color:red;font-family:sans-serif;font-size:1rem;">Username already exists</p></center>';
                }
                //If we signup then display success
                else if ($_GET['signup'] == "success") {
                    echo "<center><p style='color:green;font-family:'Poppins',sans-serif;font-size:1rem;'>Signup Successfull</p></center>";
                }
            }
            ?>
            <form action="includes/signup_tea.inc.php" method="POST" class="col s12 offset-l3 l5">
                <br />
                <!--Row 1-->
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="first_name" name="teaFname" type="text" autocomplete="off" class="validate">
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">person_outline</i>
                        <input id="last_name" name="teaLname" type="text" autocomplete="off" class="validate">
                        <label for="last_name">Last Name</label>
                    </div>
                </div>
                <!--Row 2-->
                <div class="row">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">info</i>
                        <select name="teaDep">
                            <option value="" disabled selected>Choose your Department</option>
                            <option value="B.SC CS">B.Sc Cs</option>
                            <option value="BCA">BCA</option>
                        </select>
                        <label>Department</label>
                    </div>
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">school</i>
                        <select name="teaClass">
                            <option value="" disabled selected>Choose your year</option>
                            <option value="FirstYear">First year</option>
                            <option value="SecondYear">Second year</option>
                            <option value="ThirdYear">Third year</option>
                        </select>
                        <label>Class Teacher</label>
                    </div>
                </div>
                <!--Row 3-->
                <div class="row">
                    <div class="col s12">
                        <label style="font-size:1rem;padding-left:0.2rem;">Gender</label>
                    </div>
                </div>
                <!--Row 4-->
                <div class="row">
                    <div class=" col s3 l2">
                        <input class="with-gap" name="teaGender" type="radio" id="test3" value="male" />
                        <label for="test3">Male</label>
                    </div>
                    <div class=" col s3 l2">
                        <input class="with-gap" name="teaGender" type="radio" id="test4" value="female" />
                        <label for="test4">Female</label>
                    </div>
                </div>

                <div class="subjects">
                    <div class="row">
                        <div class="col s12">
                            <label style="font-size:2rem;padding-left:0.2rem;">&nbspSubjects</label>
                            <br />
                            <br />
                        </div>
                    </div>
                    <!--Subjects for sem 1,2,3-->
                    <div class="row">
                        <div class="col s6 m4 l4">
                            <label style="font-size:1.5rem;padding-left:0.2rem;">&nbspSemester 1</label>
                        </div>
                        <div class="col s6 m4 l4 ">
                            <label style="font-size:1.5rem;padding-left:0.2rem;">&nbspSemester 2</label>
                        </div>
                        <div class="col s6 m4 l4 hide-on-small-only">
                            <label style="font-size:1.5rem;padding-left:0.2rem;">&nbspSemester 3</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 m4 l4">
                            <input type="checkbox" class="filled-in" id="s1s1" value="U15CS101" name="sem1[]" />
                            <label for="s1s1">Introduction to Programming</label>
                        </div>
                        <div class="col s6 m4 l4 ">
                            <input type="checkbox" class="filled-in" id="s2s1" value="U16CS202" name="sem2[]" />
                            <label for="s2s1">Programming Abstractions</label>
                        </div>
                        <div class="col s6 m4 l4 hide-on-small-only">
                            <input type="checkbox" class="filled-in" id="s3s1" value="U15CS303" name="sem3[]" />
                            <label for="s3s1">Object Oriented System Design</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s6 m4 l4">
                            <input type="checkbox" class="filled-in" id="s1s2" value="U15CS1P1" name="sem1[]" />
                            <label for="s1s2">Introduction to Programming Lab</label>
                        </div>
                        <div class="col s6 m4 l4 ">
                            <input type="checkbox" class="filled-in" id="s2s2" value="U15CS2P2" name="sem2[]" />
                            <label for="s2s2">Programming Abstractions Lab</label>
                        </div>
                        <div class="col s6 m4 l4 hide-on-small-only">
                            <input type="checkbox" class="filled-in" id="s3s2" value="U15CS3P3" name="sem3[]" />
                            <label for="s3s2">Object Oriented System Design Lab</label>
                        </div>
                    </div>

                    <!--Sem 4,5,6-->
                    <div class="row">
                        <div class="col s6 m4 l4 hide-on-small-only">
                            <label style="font-size:1.5rem;padding-left:0.2rem;">&nbspSemester 4</label>
                        </div>
                        <div class="col s6 m4 l4 hide-on-small-only">
                            <label style="font-size:1.5rem;padding-left:0.2rem;">&nbspSemester 5</label>
                        </div>
                        <div class="col s6 m4 l4 hide-on-small-only">
                            <label style="font-size:1.5rem;padding-left:0.2rem;">&nbspSemester 6</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 m4 l4 hide-on-small-only">
                            <input type="checkbox" class="filled-in" id="s4s1" value="U15CS404" name="sem4[]" />
                            <label for="s4s1">Database Management Systems</label>
                        </div>
                        <div class="col s6 m4 l4  hide-on-small-only">
                            <input type="checkbox" class="filled-in" id="s5s1" value="U15CS505" name="sem5[]" />
                            <label for="s5s1">Database - Driven Web Design</label>
                        </div>
                        <div class="col s6 m4 l4 hide-on-small-only">
                            <input type="checkbox" class="filled-in" id="s6s1" value="U15CS608" name="sem6[]" />
                            <label for="s6s1">Fundamentals of Software Engineering</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s6 m4 l4 hide-on-small-only">
                            <input type="checkbox" class="filled-in" id="s4s2" value="U15CS4P4" name="sem4[]" />
                            <label for="s4s2">Database Management Systems Lab</label>
                        </div>
                        <div class="col s6 m4 l4 hide-on-small-only">
                            <input type="checkbox" class="filled-in" id="s5s2" value="U15CS506" name="sem5[]" />
                            <label for="s5s2">Principles of Operating Systems</label>
                        </div>
                        <div class="col s6 m4 l4 hide-on-small-only">
                            <input type="checkbox" class="filled-in" id="s6s2" value="U15CS6:1" name="sem6[]" />
                            <label for="s6s2">Fundamentals of Computer Graphics</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 m4 l4 hide-on-small-only">
                        </div>
                        <div class="col s6 m4 l4 hide-on-small-only">
                            <input type="checkbox" class="filled-in" id="s5s3" value="U15CS5P5" name="sem5[]" />
                            <label for="s5s3">Database - Driven Web Design Lab</label>
                        </div>
                        <div class="col s6 m4 l4 hide-on-small-only">
                            <input type="checkbox" class="filled-in" id="s6s3" value="U15CS6:4" name="sem6[]" />
                            <label for="s6s3">Web Applicatios Development</label>
                        </div>

                    </div>
                    <!--Mobile view for semester 3,4-->
                    <div class="row sem34m">
                        <div class="col s6 l4 hide-on-med-and-up">
                            <label style="font-size:1.5rem;padding-left:0.2rem;">&nbspSemester 3</label>
                        </div>
                        <div class="col s6 l4 hide-on-med-and-up">
                            <label style="font-size:1.5rem;padding-left:0.2rem;">&nbspSemester 4</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 l4 hide-on-med-and-up">
                            <input type="checkbox" class="filled-in" id="s3s1m" value="U15CS303" name="sem3[]" />
                            <label for="s3s1m">Object Oriented System Design</label>
                        </div>

                        <div class="col s6 l4 hide-on-med-and-up">
                            <input type="checkbox" class="filled-in" id="s4s1m" value="U15CS404" name="sem4[]" />
                            <label for="s4s1m">Database Management Systems</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 l4 hide-on-med-and-up">
                            <input type="checkbox" class="filled-in" id="s3s2m" value="U15CS3P3" name="sem3[]" />
                            <label for="s3s2m">Object Oriented System Design Lab</label>
                        </div>

                        <div class="col s6 l4 hide-on-med-and-up">
                            <input type="checkbox" class="filled-in" id="s4s2m" value="U15CS4P4" name="sem4[]" />
                            <label for="s4s2m">Database Management Systems Lab</label>
                        </div>
                    </div>

                    <!--Mobile view for semester 5 and 6-->
                    <div class="row">
                        <div class="col s6 l4 hide-on-med-and-up">
                            <label style="font-size:1.5rem;padding-left:0.2rem;">&nbspSemester 5</label>
                        </div>
                        <div class="col s6 l4 hide-on-med-and-up">
                            <label style="font-size:1.5rem;padding-left:0.2rem;">&nbspSemester 6</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 l4 hide-on-med-and-up">
                            <input type="checkbox" class="filled-in" id="s5s1m" value="U15CS505" name="sem5[]" />
                            <label for="s5s1m">Database - Driven Web Design</label>
                        </div>

                        <div class="col s6 l4 hide-on-med-and-up">
                            <input type="checkbox" class="filled-in" id="s6s1m" value="U15CS608" name="sem6[]" />
                            <label for="s6s1m">Fundamentals of Software Engineering</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 l4 hide-on-med-and-up">
                            <input type="checkbox" class="filled-in" id="s5s2m" value="U15CS506" name="sem5[]" />
                            <label for="s5s2m">Principles of Operating Systems</label>
                        </div>

                        <div class="col s6 l4 hide-on-med-and-up">
                            <input type="checkbox" class="filled-in" id="s6s2m" value="U15CS6:1" name="sem6[]" />
                            <label for="s6s2m">Fundamentals of Comuter Graphics</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 l4 hide-on-med-and-up">
                            <input type="checkbox" class="filled-in" id="s5s3m" value="U15CS5P5" name="sem5[]" />
                            <label for="s5s3m">Database - Driven Web Design Lab</label>
                        </div>

                        <div class="col s6 l4 hide-on-med-and-up">
                            <input type="checkbox" class="filled-in" id="s6s3m" value="U15CS6:4" name="sem6[]" />
                            <label for="s6s3m">Web Application Development</label>
                        </div>
                    </div>
                </div>
                <!--row 6-->
                <div class="row hide-on-med-and-up">
                    <div class="col s12">
                        <br />
                    </div>
                </div>
                <div class="row teaDet">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">phone_iphone</i>
                        <input id="stud_phone" name="teaPhone" type="tel" autocomplete="off" class="validate">
                        <label for="stud_phone">Teacher number</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">location_city</i>
                        <input id="city" name="teaCity" type="text" autocomplete="off" class="validate">
                        <label for="city">City</label>
                    </div>
                </div>


                <!--row8-->
                <div class="row">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">gps_fixed</i>
                        <input id="state" name="teaState" type="text" autocomplete="off" class="validate">
                        <label for="state">State</label>
                    </div>
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">location_on</i>
                        <textarea id="icon_prefix2" name="teaAddress" class="materialize-textarea"></textarea>
                        <label for="icon_prefix2">Address</label>
                    </div>
                </div>


                <!-- row 10-->
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">room</i>
                        <input id="pincode" type="text" name="teaPincode" autocomplete="off" class="validate">
                        <label for="pincode">Pincode</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">markunread</i>
                        <input id="email" type="email" name="teaEmail" autocomplete="off" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    
                        <div class="input-field col s6">
                            <i class="material-icons prefix">person</i>
                            <input id="user" type="number" name="teauserid" class="validate">
                            <label for="user">User ID</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">person</i>
                            <input id="user" type="text" name="teaUsername" class="validate">
                            <label for="user">Username</label>
                        </div>
                 
                </div>
                <!-- row 12-->
                <div class="row">
                    <div class="input-field col s6">
                        <input id="password" type="password" name="teaPassword" class="validate">
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="password-repeat" type="password" name="teaRepPassword" class="validate">
                        <label for="password-repeat">Confirm Password</label>
                    </div>
                </div>
                <!-- row 13-->
                <div class="row">
                    <center>
                        <div class="col s6 l6 offset-s3 offset-l3">
                            <button type="submit" name="signup-submit" class="sign-but deep-purple darken-1">Signup</button>
                        </div>
                    </center>
                </div>
                <br />
            </form>
        </div>
    </div>
    <br />
    <br />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".button-collapse").sideNav();
            $('select').material_select();
        });
    </script>
</body>

</html>