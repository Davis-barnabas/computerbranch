<html>

<head>
    <title>Login</title>
    <link rel="shortcut icon" href="../images/thumbnail/login.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <!--Materialize Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        

        body {
            background: url("images/loginbg1.jpg") no-repeat center center/cover;
            height: 150%;
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
    </style>
</head>

</html>

<body>
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
            echo "<script>alert('Fill all the fields');</script>";
        } else if ($_GET['error'] == "wrongpassword") {
            echo "<script>alert('You have entered a wrong password');</script>";
        } else if ($_GET['error'] == "nouser") {
            echo "<script>alert('The given username doesn't exist');</script>";
        }
    }
    ?>
    <nav class="navbar-fixed grey lighten-4">
        <div class="nav-wrapper">
            <div class="container">
                <a href="#" class="brand-logo nssv-tit hide-on-med-and-down black-text" style="font-size:3rem;">Department of CS</a>
                <a href="#" class="brand-logo nav-tit hide-on-large-only left black-text">Department of CS</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="../index.php" class="black-text">Home</a></li>
                    <li><a href="../aboutus.php" class="black-text">About Us</a></li>
                    <li><a href="../events.html" class="black-text">Events</a></li>
                    <li><a class="dropdown-trigger black-text" href="#!" data-activates="dropdown1">Sign up<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <a href="#" data-activates="slide-out" class="button-collapse right"><i class="material-icons">menu</i></a>
            </div>
        </div>
    </nav>
    <ul id="dropdown1" class="dropdown-content" style="margin-top:4rem;">
        <li><a href="signup_stud.php" class="deep-orange-text">Student</a></li>
        <li class="divider"></li>
        <li><a href="signup_tea.php" class="deep-orange-text">Professor</a></li>
    </ul>
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
    <!--Login form -->
    <div class="container">
        <br />
        <br />
        <br />
        <div class="white login-form forM offset-l3 l5">
            <center><img src="images/auth.png" height="200" width="250" class="hide-on-small-only"> </center>
            <center><img src="images/auth.png" height="150" width="200" class="hide-on-med-and-up"> </center>
            <center>
                <h4>&#60Student/Staff&#62</h4>
            </center>
            <center>
                <h1>Login</h1>
            </center>
            <form action="includes/login.inc.php" method="POST" class="col s12 offset-l3 l5">
                <br />
                <br />
                <div class="row">
                    <div class="input-field col s8 offset-s2 l6 offset-l3">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="first_name" name="username" type="text" autocomplete="off" class="validate">
                        <label for="first_name">User Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8 offset-s2 l6 offset-l3">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="pass" name="password" type="password" autocomplete="off" class="validate">
                        <label for="pass">Password</label>
                    </div>
                </div>
                <br />
                <div class="row">
                    <center>
                        <div class="col s6 l6 offset-s3 offset-l3">
                            <button type="submit" name="login-submit" class="sign-but deep-purple darken-1">Login</button>
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
            $(".dropdown-trigger").dropdown();
        });
    </script>
</body>

</html>