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
            <div class="row">
                <div class="card col l3 s10 offset-s1 m3 im1 hoverable">
                    <div class="card-image waves-effect waves-block waves-light ">
                        <div class="imgcon"><img class="activator" src="https://randomuser.me/api/portraits/men/64.jpg" style="z-index:1;width:100%;height:100%; border-radius:50%;"></div>
                    </div>
                    <div class="card-content">
                        <span class="card-title activator black-text text-darken-4 pname">Hughes<i class="material-icons right">more_vert</i></span>
                        <p>Assistant Professor</p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Title</span>
                        <br />
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus, nisi sit? Magni sequi minus corporis suscipit corrupti perferendis voluptatum aut?</p>
                    </div>
                </div>
                <!--Second img-->
                <div class="card col l4 s10 m4 offset-s1 offset-l1 offset-m1 im1 hoverable">
                    <div class="card-image waves-effect waves-block waves-light ">
                        <div class="imgcon"><img class="activator" src="https://randomuser.me/api/portraits/men/73.jpg" style="z-index:1;width:100%;height:100%; border-radius:50%;"></div>
                    </div>
                    <div class="card-content">
                        <span class="card-title activator black-text text-darken-4 pname">Pete Mccoy<i class="material-icons right">more_vert</i></span>
                        <p>Head of the Department</p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Title</span>
                        <br />
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus, nisi sit? Magni sequi minus corporis suscipit corrupti perferendis voluptatum aut?</p>
                    </div>
                </div>
                <!--Third Image-->
                <div class="hide-on-med-and-up gap">
                </div>
                <div class="card col l3 s10 m3 offset-s1 offset-l1 offset-m1 im1 hoverable">
                    <div class="card-image waves-effect waves-block waves-light ">
                        <div class="imgcon"><img class="activator" src="https://randomuser.me/api/portraits/men/75.jpg" style="z-index:1;width:100%;height:100%; border-radius:50%;"></div>
                    </div>
                    <div class="card-content">
                        <span class="card-title activator black-text text-darken-4 pname">Alexander<i class="material-icons right">more_vert</i></span>
                        <p>Assistant Professor</p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Title</span>
                        <br />
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus, nisi sit? Magni sequi minus corporis suscipit corrupti perferendis voluptatum aut?</p>
                    </div>
                </div>
            </div>
        </div>
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