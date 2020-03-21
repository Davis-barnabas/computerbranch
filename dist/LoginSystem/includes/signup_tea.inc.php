<?php

if(isset($_POST['signup-submit'])){

    require "dbh.inc.php";

    $teaUsername = strtolower(mysqli_real_escape_string($conn, $_POST['teaUsername']));
    $teaFname = mysqli_real_escape_string($conn,$_POST['teaFname']);
    $teauserid = mysqli_real_escape_string($conn, $_POST['teauserid']);
    $teaLname = mysqli_real_escape_string($conn, $_POST['teaLname']);
    $teaGender = mysqli_real_escape_string($conn, $_POST['teaGender']);
    $teaDep = mysqli_real_escape_string($conn, $_POST['teaDep']);
    $teaClass = mysqli_real_escape_string($conn, $_POST['teaClass']);
    $teaPhone = mysqli_real_escape_string($conn, $_POST['teaPhone']);
    $teaState = mysqli_real_escape_string($conn, $_POST['teaState']);
    $teaCity = mysqli_real_escape_string($conn, $_POST['teaCity']);
    $teaAddress = mysqli_real_escape_string($conn, $_POST['teaAddress']);
    $teaPincode = mysqli_real_escape_string($conn, $_POST['teaPincode']);
    $teaEmail = mysqli_real_escape_string($conn, $_POST['teaEmail']);
    $teaPassword = mysqli_real_escape_string($conn, $_POST['teaPassword']);
    $teaRepPassword = mysqli_real_escape_string($conn, $_POST['teaRepPassword']);
    $sem1 = $_POST['sem1'];
    $sem2 = $_POST['sem2'];
    $sem3 =$_POST['sem3'];
    $sem4 = $_POST['sem4'];
    $sem5 = $_POST['sem5'];
    $sem6 = $_POST['sem6'];
    $teaImage = $_POST['teaImage']; 
    if(empty($teaUsername) || empty($teaFname) ||empty($teauserid) || empty($teaLname) || empty($teaGender) || empty($teaDep) ||
    empty($teaPhone) || empty($teaState) || empty($teaCity) || empty($teaAddress) || empty($teaPincode) || empty($teaEmail) || empty($teaPassword) || empty($teaRepPassword)){
       header("Location: ../signup_tea.php?error=emptyfields&teaUsername=".$teaUsername."&teaFname=".$teaFname."&teaLname=".$teaLname."&teaGender=" 
       .$teaGender."&teaDep=".$teaGender."&teaClass=".$teaClass."&teaPhone=".$teaPhone."&teaState=".$teaState."&teaCity=".$teaCity."&teaAddress=".$teaAddress."&teaPincode=".$teaPincode."&Email=".$teaEmail);
      exit();       
    }
    else if(!filter_var($teaEmail,FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup_tea.php?error=invalidemail&teaUsername=" . $teaUsername . "&teaFname=" . $teaFname . "&teaLname=" . $teaLname . "&teaGender="
            . $teaGender . "&teaDep=" . $teaGender . "&teaClass=" . $teaClass . "&teaPhone=" . $teaPhone . "&teaState=" . $teaState . "&teaCity=" .
              $teaCity . "&teaAddress=" . $teaAddress . "&teaPincode=" . $teaPincode);
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$teaFname) && !preg_match("/^[a-zA-Z0-9]*$/", $teaLname) && !preg_match("/^[a-zA-Z0-9]*$/", $teaUsername)){
        header("Location: ../signup_tea.php?error=invalidusername&teaGender=". $teaGender . "&teaDep=" . $teaGender . 
            "&teaClass=" . $teaClass . "&teaPhone=" . $teaPhone . "&teaState=" . $teaState 
            . "&teaCity=" . $teaCity . "&teaAddress=" . $teaAddress . "&teaPincode=" . $teaPincode . "&Email=" . $teaEmail);
              exit();
        }
        else if(!filter_var($teaEmail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $teaFname) && !preg_match("/^[a-zA-Z0-9]*$/", $teaLname) && !preg_match("/^[a-zA-Z0-9]*$/", $teaUsername)){
             header("Location: ../signup_tea.php?error=invalidusernameemail&teaGender=" . $teaGender . "&teaDep=" . $teaGender .
            "&teaClass=" . $teaClass . "&teaPhone=" . $teaPhone . "&teaState=" . $teaState
            . "&teaCity=" . $teaCity . "&teaAddress=" . $teaAddress . "&teaPincode=" . $teaPincode);
            exit();
        }
        else if($teaPassword !== $teaRepPassword){
            header("Location: ../signup_tea.php?erro=passwordcheck&teaUsername=" . $teaUsername . "&teaFname=" . $teaFname . "&teaLname=" . $teaLname . "&teaGender="
            . $teaGender . "&teaDep=" . $teaGender . "&teaClass=" . $teaClass . "&teaPhone=" . $teaPhone . "&teaState=" . $teaState . "&teaCity=" .
            $teaCity . "&teaAddress=" . $teaAddress . "&teaPincode=" . $teaPincode);
            exit();
        }
        else{
            $sql = "SELECT * from teachers WHERE teaUsername='$teaUsername' AND teaFname='$teaFname';";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                header("Location: ../signup_tea.php?error=usertaken");
                exit();
            }
            else {
            //inserting the values of the checkboxes to the database 
            $sem1 = implode(',', $_POST['sem1']);
            $sem2 = implode(',', $_POST['sem2']);
            $sem3 = implode(',', $_POST['sem3']);
            $sem4 = implode(',', $_POST['sem4']);
            $sem5 = implode(',', $_POST['sem5']);
            $sem6 = implode(',', $_POST['sem6']);
        //this is for setting the status for the user whether he has a image or not
            
        //here we are hashing the password for protection 
                $hashedPwd = password_hash($teaPassword,PASSWORD_DEFAULT);
                $sql = "INSERT into teachers(teauserid,teaUsername,teaFname,teaLname,teaGender,teaDep,teaClass,teaPhone,teaState,teaCity,
                teaAddress,teaPincode,teaEmail,teaPassword,teaFSemSub,teaSSemSub,teaTSemSub,teaFoSemSub,teaFiSemSub,teaSiSemSub) values
                ('$teauserid','$teaUsername','$teaFname','$teaLname','$teaGender','$teaDep','$teaClass','$teaPhone','$teaState','$teaCity',
                 '$teaAddress','$teaPincode','$teaEmail','$hashedPwd','$sem1','$sem2','$sem3','$sem4','$sem5','$sem6')";
                 mysqli_query($conn,$sql);
           
                    $userid = $teauserid;
                
                    $sql2 = "INSERT INTO profileimg (userid,stat) VALUES ('$userid',1);";
                    mysqli_query($conn,$sql2);
                
                 header("Location: ../signup_tea.php?signup=success");
                 exit();   
            }
        }
    }
     else {
         header("Location: ../signup_tea.php?");
         exit();
     }