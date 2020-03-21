<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
     <title>Student Signup</title>
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

          html {
               scroll-behavior: smooth;
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
               <center><img src="images/pro2.png" height="200" width="250" class="hide-on-small-only"> </center>
               <center><img src="images/pro2.png" height="150" width="200" class="hide-on-med-and-up"> </center>
               <center>
                    <h4>&#60/Student&#62</h4>
               </center>
               <center>
                    <h1>Sign Up</h1>
               </center>
               <?php
               if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                         echo '<center><p style="color:red;font-family:sans-serif;font-size:1rem;">Fill in all the fields</p></center>';
                    } else if ($_GET['error'] == "invaliduidmail") {
                         echo '<center><p style="color:red;font-family:sans-serif;font-size:1rem;">Invalid username and e-mail</p></center>';
                    } else if ($_GET['error'] == "invalidusername") {
                         echo '<center><p style="color:red;font-family:sans-serif;font-size:1rem;">Invalid Username</p></center>';
                    } else if ($_GET['error'] == "invalidmail") {
                         echo '<center><p style="color:red;font-family:sans-serif;font-size:1rem;">Invalid Mail</p></center>';
                    } else if ($_GET['error'] == "passwordcheck") {
                         echo '<center><p style="color:red;font-family:sans-serif;font-size:1rem;">Your passwords do not match</p></center>';
                    } else if ($_GET['error'] == "usertaken") {
                         echo '<center><p style="color:red;font-family:sans-serif;font-size:1rem;">Username already exists</p></center>';
                    }
                    //If we signup then display success
                    else if ($_GET['signup'] == "success") {
                         echo "<center><p style='color:green;font-family:'Poppins',sans-serif;font-size:1rem;'>Signup Successfull</p></center>";
                    }
               }
               ?>
               <form action="includes/signup_stud.inc.php" method="POST" class="col s12 offset-l3 l5">
                    <br />
                    <!--Row 1-->
                    <div class="row">
                         <div class="input-field col s12 l6">
                              <i class="material-icons prefix">account_circle</i>
                              <input id="first_name" name="studFname" type="text" autocomplete="off" class="validate">
                              <label for="first_name">First Name</label>
                         </div>
                         <div class="input-field col s12 l6">
                              <i class="material-icons prefix">person_outline</i>
                              <input id="last_name" name="studLname" type="text" autocomplete="off" class="validate">
                              <label for="last_name">Last Name</label>
                         </div>
                    </div>
                    <!--Row 2-->
                    <div class="row">
                         <div class="input-field col s6">
                              <i class="material-icons prefix">info</i>
                              <input id="roll_number" name="studRoll" type="text" autocomplete="off" class="validate">
                              <label for="roll_number">Roll number</label>
                         </div>
                         <div class="input-field col s6">
                              <i class="material-icons prefix">school</i>
                              <select name="studDep">
                                   <option value="" disabled selected>Choose your Department</option>
                                   <option value="B.SC CS">B.Sc Cs</option>
                                   <option value="BCA" disabled>BCA</option>
                              </select>
                              <label>Department</label>
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
                              <input class="with-gap" name="studGender" type="radio" id="test3" value="male" />
                              <label for="test3">Male</label>
                         </div>
                         <div class=" col s3 l2">
                              <input class="with-gap" name="studGender" type="radio" id="test4" value="female" />
                              <label for="test4">Female</label>
                         </div>
                    </div>
                    <!--Row 5-->
                    <div class="row">
                         <div class="input-field col s12 l6">
                              <i class="material-icons prefix"> local_library</i>
                              <select name="studYear">
                                   <option value="" disabled selected>Choose your year</option>
                                   <option value="1">First year</option>
                                   <option value="2">Second year</option>
                                   <option value="3">Third year</option>
                              </select>
                              <label>Year</label>
                         </div>
                         <div class="input-field col s12 l6">
                              <i class="material-icons prefix"> local_library</i>
                              <select name="studSemester">
                                   <option value="" disabled selected>Choose your semester</option>
                                   <option value="1">First semester</option>
                                   <option value="2">Second semester</option>
                                   <option value="3">Third semester</option>
                                   <option value="4">Fourth semester</option>
                                   <option value="5">Fifth semester</option>
                                   <option value="6">Sixth semester</option>
                              </select>
                              <label>Semester</label>
                         </div>
                    </div>
                    <!--row 6-->
                    <div class="row">
                         <div class="input-field col s6">
                              <i class="material-icons prefix">phone_iphone</i>
                              <input id="stud_phone" name="studPhone" type="tel" autocomplete="off" class="validate">
                              <label for="stud_phone">Student number</label>
                         </div>
                         <div class="input-field col s6">
                              <i class="material-icons prefix">phone</i>
                              <input id="studfphone" name="studFatherPhone" type="tel" autocomplete="off" class="validate">
                              <label for="studfphone">Father number</label>
                         </div>
                    </div>
                    <!--row 7-->
                    <div class="row">
                         <div class="col s12">
                              <label style="font-size:1rem;padding-left:0.2rem;">Dob</label>
                         </div>
                         <div class="input-field col s6">
                              <i class="material-icons prefix">date_range</i>
                              <input id="dob" name="studDOB" type="date" autocomplete="off" class="validate">
                         </div>
                    </div>
                    <!--row8-->
                    <div class="row">
                         <div class="input-field col s6">
                              <i class="material-icons prefix">gps_fixed</i>
                              <input id="state" name="studState" type="text" autocomplete="off" class="validate">
                              <label for="state">State</label>
                         </div>
                         <div class="input-field col s6">
                              <i class="material-icons prefix">location_city</i>
                              <input id="city" name="studCity" type="text" autocomplete="off" class="validate">
                              <label for="city">City</label>
                         </div>
                    </div>
                    <!-- row 9-->
                    <div class="row">
                         <div class="input-field col s12 l6">
                              <i class="material-icons prefix">location_on</i>
                              <textarea id="icon_prefix2" name="studAddress" class="materialize-textarea"></textarea>
                              <label for="icon_prefix2">Address</label>
                         </div>
                    </div>
                    <!-- row 10-->
                    <div class="row">
                         <div class="input-field col s12 l6">
                              <i class="material-icons prefix">room</i>
                              <input id="pincode" type="text" name="studPincode" autocomplete="off" class="validate">
                              <label for="pincode">Pincode</label>
                         </div>
                         <div class="input-field col s12 l6">
                              <i class="material-icons prefix">markunread</i>
                              <input id="email" type="email" name="studEmail" autocomplete="off" class="validate">
                              <label for="email">Email</label>
                         </div>
                    </div>
                    <!-- row 11-->
                    <div class="row">
                         <div class="col s6">
                              <div class="input-field col s6">
                                   <i class="material-icons prefix">person</i>
                                   <input id="user" type="text" name="studUsername" class="validate">
                                   <label for="user">Username</label>
                              </div>
                         </div>
                         <!-- row 12-->
                         <div class="row">
                              <div class="input-field col s6">
                                   <input id="password" type="password" name="studPassword" class="validate">
                                   <label for="password">Password</label>
                              </div>
                              <div class="input-field col s6">
                                   <input id="password-repeat" type="password" name="studRepPassword" class="validate">
                                   <label for="password-repeat">Repeat Password</label>
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