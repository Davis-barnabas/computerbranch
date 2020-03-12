<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <!--Stylesheet-->
        <link rel="stylesheet" href="loginstyle.css">
</head>
</html>
<body>
<header>
        <div>

                <?php
                if (isset($_SESSION['userId'])) {
                        echo '<form method="POST" action="includes/logout.inc.php">
                               <button type="submit" name="logout-submit">Logout</button>
	                      </form>';
                } else {
                        echo   '<form method="POST" action="includes/login.inc.php">
                 <input type="text" name="mailuid" placeholder="enter a email id or user name">  
                 <input type="password" name="pwd" placeholder="Enter the password">
                 <button type="submit" name="login-submit">Login</button>
	         </form>
	         
	         <a href="signup.php">Signup</a>';
                }
               ?>
        </div>
</header>

