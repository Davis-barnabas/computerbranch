<html>
<head>
     <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

   <style>
      .imgcon{
         width:200px;
         height:200px;
        border-radius:50%;
        background-color:black;
        margin:auto;
        margin-top:1rem;
        z-index:0;
      }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
      .im1{
        transition:margin 1s ease;
      }
      @media(min-width:600px){
      .im1:hover{
           margin-top:-0.7rem;
           box-shadow: 0px 0px 50px;   
      }
  }
      .gap{
        width:100%;
        height:150px;
      }
      #tit{
        font-size:5rem;
        font-weight:bold;
      }
      .card{
        margin-bottom:3rem;
        background-color:#b2ebf2;
      }
   </style>
</head>
     <body class="white">
     <nav class="navbar-fixed deep-orange lighten-1">
        <div class="nav-wrapper">
            <div class="container">
                <a href="#" class="brand-logo nssv-tit hide-on-med-and-down black-text" style="font-size:3rem;">Department of CS</a>
                <a href="#" class="brand-logo nav-tit hide-on-large-only left black-text">Department of CS</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="../index.php" class="black-text">Home</a></li>
                    <li><a href="../index.php#about" class="black-text">About Us</a></li>
                    <li><a href="../events.html" class="black-text">Events</a></li>
                    <li><a class="dropdown-trigger black-text" href="#!" data-activates="dropdown1">Sign up<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <a href="#" data-activates="slide-out" class="button-collapse right"><i class="material-icons" style="color:black;">menu</i></a>
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
                <li><a class="waves-effect sidelin" href="../index.php#about">About Us</a></li>
                <li><a class="waves-effect sidelin" href="../events.html">Events</a></li>
                <br />
                <li><a class="subheader">Sign Up</a></li>
                <li><a class="waves-effect sidelin" href="signup_stud.php">1. Student</a></li>
                <li><a class="waves-effect sidelin" href="signup_tea.php">2. Professor</a></li>
            </center>
        </ul>
    </div>
    <!--Still here nav contents-->
    <div class="container">
     <center><h1 id="tit" >Pro<span style="color:orange;">f</span>essors</h1></center>
     <br />
     <br />
     <!--First Image-->
     <div class="row">
 <div class="card col l3 s10 offset-s1 m3 im1 hoverable">
    
    <div class="card-image waves-effect waves-block waves-light ">
      <div class="imgcon"><img class="activator" src="../images/davis.jpeg" style="z-index:1;width:100%;height:100%; border-radius:50%;"  ></div>
    </div>
    
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Marlon Hughes<i class="material-icons right">more_vert</i></span>
      <p><a href="#">This is a link</a></p>
    </div>
    
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Card Title</span>
      <p>Here is some more information about this product that is only revealed once clicked on.</p>
    </div>
    
  </div>     
  
  <!--Second img-->
 
 <div class="card col l4 s10 m4 offset-s1 offset-l1 offset-m1 im1 hoverable">
    
    <div class="card-image waves-effect waves-block waves-light ">
      <div class="imgcon"><img class="activator" src="../images/davis.jpeg" style="z-index:1;width:100%;height:100%; border-radius:50%;"  ></div>
    </div>
    
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Marlon Hughes<i class="material-icons right">more_vert</i></span>
      <p><a href="#">This is a link</a></p>
    </div>
    
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Card Title</span>
      <p>Here is some more information about this product that is only revealed once clicked on.</p>
    </div>
    
  </div>     
  
  <!--Third Image-->
  <div class="hide-on-med-and-up gap">

  </div>
 <div class="card col l3 s10 m3 offset-s1 offset-l1 offset-m1 im1 hoverable">
    
    <div class="card-image waves-effect waves-block waves-light ">
      <div class="imgcon"><img class="activator" src="../images/davis.jpeg" style="z-index:1;width:100%;height:100%; border-radius:50%;"  ></div>
    </div>
    
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Marlon Hughes<i class="material-icons right">more_vert</i></span>
      <p><a href="#">This is a link</a></p>
    </div>
    
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Card Title</span>
      <p>Here is some more information about this product that is only revealed once clicked on.</p>
    </div>
    
  </div>     
 
</div>
</div>
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

