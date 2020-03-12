<?php

if (isset($_POST['signup-submit'])) {
    //database connection
    require "dbh.inc.php";

    $studFname = mysqli_real_escape_string($conn,$_POST['studFname']);
    $studLname = mysqli_real_escape_string($conn,$_POST['studLname']);
    $studRoll = mysqli_real_escape_string($conn,$_POST['studRoll']);
    $studDep = mysqli_real_escape_string($conn,$_POST['studDep']);
    $studGender = mysqli_real_escape_string($conn,$_POST['studGender']);
    $studYear = mysqli_real_escape_string($conn,$_POST['studYear']);
    $studSemester = mysqli_real_escape_string($conn,$_POST['studSemester']);
    $studPhone = mysqli_real_escape_string($conn,$_POST['studPhone']);
    $studFatherPhone = mysqli_real_escape_string($conn,$_POST['studFatherPhone']);
    $studDOB = mysqli_real_escape_string($conn,$_POST['studDOB']);
    $studState = mysqli_real_escape_string($conn,$_POST['studState']);
    $studCity = mysqli_real_escape_string($conn,$_POST['studCity']);
    $studAddress = mysqli_real_escape_string($conn,$_POST['studAddress']);
    $studPincode = mysqli_real_escape_string($conn,$_POST['studPincode']);
    $studEmail = mysqli_real_escape_string($conn,$_POST['studEmail']);
    $studPassword = mysqli_real_escape_string($conn,$_POST['studPassword']);
    $studRepPassword = mysqli_real_escape_string($conn,$_POST['studRepPassword']);
    $studUsername = strtolower(mysqli_real_escape_string($conn,$_POST['studUsername']));

    if (empty($studFname) || empty($studLname) || empty($studRoll) || empty($studDep) || empty($studGender) ||
        empty($studYear) || empty($studSemester) || empty($studPhone) || empty($studFatherPhone) ||
        empty($studDOB) || empty($studState) || empty($studCity) || empty($studAddress) || empty($studPincode) || empty($studEmail) 
        || empty($studPassword) || empty($studRepPassword) || empty($studUsername)) {
           header("Location: ../signup_stud.php?error=emptyfields&studFname=".$studFname."&studLname=".$studLname."&studRoll=".
                   $studRoll."&studDep=".$studDep."&studGender=".$studGender."&studYear=".$studYear."&studSemester=".$studSemester.
                  "&studPhone=".$studPhone."&studFatherPhone=".$studFatherPhone."&studDOB=".$studDOB."&studState=".$studState.
                  "&studCity=".$studCity."&studAddress=".$studAddress."&studPincode=".$studPincode."&studEmail=".$studEmail."&studUsername=".$studUsername);
           exit();  // it stops the following code from running if the aboce is false
    } 
    else if (!filter_var($studEmail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $studFname) && !preg_match("/^[a-zA-Z0-9]*$/", $studLname) || !preg_match("/^[a-zA-Z0-9]*$/", $studUsername) ) {
        header("Location: ../signup_stud.php?error=invalidmailuid&studRoll=" .
            $studRoll . "&studDep=" . $studDep . "&studGender=" . $studGender . "&studYear=" . $studYear . "&studSemester=" . $studSemester .
            "&studPhone=" . $studPhone . "&studFatherPhone=" . $studFatherPhone . "&studDOB=" . $studDOB . "&studState=" . $studState .
            "&studCity=" . $studCity . "&studAddress=" . $studAddress . "&studPincode=" . $studPincode);
             exit();
    }
    //if mail is incorrect
    else if (!filter_var($studEmail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup_stud.php?error=invalidemail&studFname=" . $studFname . "&studLname=" . $studLname . "&studRoll=" .
            $studRoll . "&studDep=" . $studDep . "&studGender=" . $studGender . "&studYear=" . $studYear . "&studSemester=" . $studSemester .
            "&studPhone=" . $studPhone . "&studFatherPhone=" . $studFatherPhone . "&studDOB=" . $studDOB . "&studState=" . $studState .
            "&studCity=" . $studCity . "&studAddress=" . $studAddress . "&studPincode=" . $studPincode."&studUsername=".$studUsername);
        exit();  // it stops the following code from running if the aboce is false
    }
    //if username is incorrect
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $studFname) && !preg_match("/^[a-zA-Z0-9]*$/", $studLname) ||  !preg_match("/^[a-zA-Z0-9]*$/", $studUsername)) {
        header("Location: ../signup_stud.php?error=invalidusername&studRoll=" .
            $studRoll . "&studDep=" . $studDep . "&studGender=" . $studGender . "&studYear=" . $studYear . "&studSemester=" . $studSemester .
            "&studPhone=" . $studPhone . "&studFatherPhone=" . $studFatherPhone . "&studDOB=" . $studDOB . "&studState=" . $studState .
            "&studCity=" . $studCity . "&studAddress=" . $studAddress . "&studPincode=" . $studPincode . "&studEmail=" . $studEmail);
        exit();  // it stops the following code from running if the aboce is false
    }

    //if password is incorrect
    else if ($studPassword !== $studRepPassword) {
        header("Location: ../signup_stud.php?error=passwordcheck&studFname=" . $studFname . "&studLname=" . $studLname . "&studRoll=" .
            $studRoll . "&studDep=" . $studDep . "&studGender=" . $studGender . "&studYear=" . $studYear . "&studSemester=" . $studSemester .
            "&studPhone=" . $studPhone . "&studFatherPhone=" . $studFatherPhone . "&studDOB=" . $studDOB . "&studState=" . $studState .
            "&studCity=" . $studCity . "&studAddress=" . $studAddress . "&studPincode=" . $studPincode . "&studEmail=" . $studEmail."&studUsername=".$studUsername);
        exit();  // it stops the following code from running if the aboce is false
    }
    //if the username is already in the database ...check with the database
    else {
        $sql = "SELECT * FROM students WHERE studRoll='$studRoll'"; 
          $result = mysqli_query($conn,$sql);
          $resultCheck = mysqli_num_rows($result);
             //Checking whether the user exists or not  
          if ($resultCheck > 0) {
                header("Location: ../signup_stud.php?error=usertaken");
                exit();  
            } else {
                //hashing password
                $hashedPwd = password_hash($studPassword, PASSWORD_DEFAULT);
                //Inserting data into the database
                $sql = "INSERT INTO students(studUsername,studFname,studLname,studRoll,studDep,studGender,studYear,studSemester,studPhone,studFatherPhone,studState,studCity,studAddress,
                studPincode,studEmail,studPassword,studDOB) VALUES('$studUsername','$studFname','$studLname','$studRoll','$studDep','$studGender','$studYear','$studSemester',
                        '$studPhone','$studFatherPhone','$studState','$studCity','$studAddress','$studPincode','$studEmail','$hashedPwd','$studDOB');";
                mysqli_query($conn,$sql);
                header("Location: ../signup_stud.php?signup=success");
                exit(); 
            }
            }
        }
        //entering this validation by some other ways rather than formal way of 
        //signing up with be returned back to the sign up form 
    else {
    header("Location: ../signup_stud.php?");
    exit(); 
    }   
