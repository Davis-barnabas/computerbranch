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
                $s = "SELECT * FROM studrep where username='$username';";
                $sres = mysqli_query($conn,$s);
                if(!mysqli_num_rows($sres)>0){
                        $pwdCheck = password_verify($password,$row['studPassword']); // it takes the password that the user gives and checks it with the password in databse by unhasing it 
                          if($pwdCheck == false){
                              header("Location: ../login.php?error=wrongpassword");
                              exit();
                            }
                          else if($pwdCheck == true){
                              session_start();
                              $_SESSION['userName'] = $row['studUsername'];
                              $_SESSION['roll'] = $row['studRoll'];
                              $_SESSION['rep'] = $row['studRep'];
                              $_SESSION['hod'] = 0;
                              $_SESSION['id'] =0;
                                header("Location: studmain.php?login=success");
                                exit();
                            }
                          else{
                              header("Location: ../login.php?error=wrongpwd");
                              exit();
                              }
                }else{
                    $pwdCheck = password_verify($password, $row['studPassword']); // it takes the password that the user gives and checks it with the password in databse by unhasing it 
                    if ($pwdCheck == false) {
                      header("Location: ../login.php?error=wrongpassword");
                      exit();
                    } else if ($pwdCheck == true) {
                      session_start();
                      $_SESSION['userName'] = $row['studUsername'];
                      $_SESSION['roll'] = $row['studRoll'];
                      $_SESSION['rep'] = $row['studRep'];
                      $_SESSION['hod'] = 0;
                      $_SESSION['id'] = 0;
                      
                      header("Location: ../login.php?rep=choice");
                      exit();
                    } else {
                      header("Location: ../login.php?error=wrongpwd");
                      exit();
                    }
                  }
            }

    //checking whether the given username is a teachers username or not                    $sql2 = "SELECT * FROM teachers WHERE teaUsername='$username';";
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
                        $_SESSION['id'] = $row['teauserid'];
                        $_SESSION['hod'] = $row['hod'];
                        $_SESSION['roll'] = 0;
                       //have a id for studs
                        header("Location: teamain.php?login=success");
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
