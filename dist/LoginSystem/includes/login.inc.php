<?php

if(isset($_POST['login-submit'])){
	//database connection 
  require "dbh.inc.php";

  $username = strtolower($_POST['username']);
  $password = $_POST['password'];
  if(empty($username) || empty($password)){
  	header("Location: ../login.php?error=emptyfields");
  	exit();
  }
  else{
    $sql ="SELECT * FROM students WHERE studUsername='$username';";
      $result = mysqli_query($conn,$sql);               
              if($row = mysqli_fetch_assoc($result)){
                        $pwdCheck = password_verify($password,$row['studPassword']); // it takes the password that the user gives and checks it with the password in databse by unhasing it 
                          if($pwdCheck == false){
                              header("Location: ../login.php?error=wrongpassword");
                              exit();
                            }
                          else if($pwdCheck == true){
                              session_start();
                              $_SESSION['userName'] = $row['studUsername'];
                                header("Location: ../../index.php?login=success");
                                exit();
                            }
                          else{
                              header("Location: ../login.php?error=wrongpwd");
                              exit();
                              }
              }
              

                   //checking whether the given username is a teachers username or not 
                   $sql2 = "SELECT * FROM teachers WHERE teaUsername='$username';";
            
                   $result2 = mysqli_query($conn, $sql2);
                   if ($row = mysqli_fetch_assoc($result2)) {
                   
                    $pwdCheck = password_verify($password, $row['teaPassword']); // it takes the password that the user gives and checks it with the password in databse by unhasing it 
                   
                    if ($pwdCheck == false) {
                        header("Location: ../login.php?error=wrongpassword");
                        exit();
                    }
                    else if ($pwdCheck == true) {
                        session_start();
                        $_SESSION['userName'] = $row['teaUsername'];
                        header("Location: ../../index.php?login=success");
                        exit();
                    } 
                   else {
                        header("Location: ../login.php?error=wrongpwd");
                        exit();
                     }
                   } 
                   else {
                        header("Location: ../login.php?error=nouser");
                        exit();
                    }
            }
  }
     else{
         header("Location: ../login.php?");
         exit();
     }