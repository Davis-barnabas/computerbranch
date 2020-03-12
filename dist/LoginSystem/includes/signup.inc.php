<?php

if(isset($_POST['signup-submit'])){
 //database connection
  require "dbh.inc.php";
 
  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];
  
  if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
            header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
          exit();  // it stops the following code from running if the aboce is false
  }
  else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
 header("Location: ../signup.php?error=invalidmailuid");
          exit(); 
  }
  //if mail is incorrect
  else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
   header("Location: ../signup.php?error=invalidemail&uid=".$username);
          exit();  // it stops the following code from running if the aboce is false
          }
          //if username is incorrect
           else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
   header("Location: ../signup.php?error=invalideusername&mail=".$email);
          exit();  // it stops the following code from running if the aboce is false
          }

    //if password is incorrect
          else if($password !== $passwordRepeat){
     header("Location: ../signup.php?error=passwordcheck&mail=".$email."&uid=".$username);
          exit();  // it stops the following code from running if the aboce is false

          }
//if the username is already in the database ...check with the database
else{
	$sql = "SELECT uidUsers FROM users WHERE uidUsers=?"; //? is a prepared statement
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
header("Location: ../signup.php?error=sqlerror");
          exit();  // it stops the following code from running if the aboce is false
    }
     else{
	//s for string
	mysqli_stmt_bind_param($stmt,"s", $username);
     mysqli_stmt_execute($stmt);
       mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
         if($resultCheck > 0){
             header("Location: ../signup.php?error=usertaken&mail=".$email);
          exit();  // it stops the following code from running if the aboce is false
                }
              else{
 	                $sql = "INSERT INTO users (uidUsers,emailUsers,pwdUsers) values (?,?,?)";
                       $stmt = mysqli_stmt_init($conn);
                       if(!mysqli_stmt_prepare($stmt,$sql)){
                   header("Location: ../signup.php?error=sqlerror");
                      exit();  // it stops the following code from running if the aboce is false
                     }
                        else{

    	                       $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                             	mysqli_stmt_bind_param($stmt,"sss", $username,$email,$hashedPwd);
                               mysqli_stmt_execute($stmt);
                             header("Location: ../signup.php?signup=success");
                                    exit();  // it stops the following code from running if the aboce is false
    
                                }
                         }
                }
           }
mysqli_stmt_close($stmt);
mysqli_close($conn);

}
else{
header("Location: ../signup.php?");
          exit();  // it stops the following code from running if the aboce is false

}