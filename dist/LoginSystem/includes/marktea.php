<?php
    session_start();
    require "dbh.inc.php";
    $username = $_SESSION['userName'];
                      #Semester 1
    #Internal 1 marks
    if(isset($_POST['sub-sem1in1'])){
        #getting the roll number
          $roll1 = $_POST['studRoll'];

          $sql = "SELECT * from teachers where teaUsername='$username'";
             $result  = mysqli_query($conn, $sql);
             $re = mysqli_fetch_assoc($result);
             $arr = explode(",", $re['teaFSemSub']);
              foreach ($arr as $i) {
               if(strcmp($i,"U15CS101")){
                   $mark = $_POST[$i];    
                   $sql1 = "UPDATE sem1marks SET sem1p3s1i1='$mark' WHERE roll='$roll1';";
                $result = mysqli_query($conn,$sql1);
                  if(!$result){
                    echo mysqli_error($conn);
                  } 
               } 
                else if(strcmp($i,"U15CS1P1")){
                   $mark = $_POST[$i];
                    $sql = "UPDATE sem1marks set sem1p3s2i1='$mark' where roll='$roll1';";
                    $result = mysqli_query($conn, $sql);
                   if (!$result) {
                      echo mysqli_error($conn);
                    }
                }     
            }
           header("Location: sem1marks.php?update=success");
            exit();
    }
    #Internal 2 marks
        else if(isset($_POST['sub-sem1in2'])){
    #getting the roll number
    $roll1 = $_POST['studRoll'];

    $sql = "SELECT * from teachers where teaUsername='$username'";
    $result  = mysqli_query($conn, $sql);
    $re = mysqli_fetch_assoc($result);
    $arr = explode(",", $re['teaFSemSub']);
    foreach ($arr as $i) {
        if (strcmp($i, "U15CS101")) {
            $mark = $_POST[$i];
            $sql1 = "UPDATE sem1marks SET sem1p3s1i2='$mark' WHERE roll='$roll1';";
            $result = mysqli_query($conn, $sql1);
            if (!$result) {
                echo mysqli_error($conn);
            }
        } else if (strcmp($i, "U15CS1P1")) {
            $mark = $_POST[$i];
            $sql = "UPDATE sem1marks set sem1p3s2i2='$mark' where roll='$roll1';";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo mysqli_error($conn);
            }
        }
    }
    header("Location: sem1marks.php?update=success");
    exit();
    }
    #semseter marks
    else if(isset($_POST['sub-sem1'])){
    #getting the roll number
    $roll1 = $_POST['studRoll'];

    $sql = "SELECT * from teachers where teaUsername='$username'";
    $result  = mysqli_query($conn, $sql);
    $re = mysqli_fetch_assoc($result);
    $arr = explode(",", $re['teaFSemSub']);
    foreach ($arr as $i) {
        if (strcmp($i, "U15CS101")) {
            $mark = $_POST[$i];
            $sql1 = "UPDATE sem1marks SET sem1p3s1='$mark' WHERE roll='$roll1';";
            $result = mysqli_query($conn, $sql1);
            if (!$result) {
                echo mysqli_error($conn);
            }
        } else if (strcmp($i, "U15CS1P1")) {
            $mark = $_POST[$i];
            $sql = "UPDATE sem1marks set sem1p3s2='$mark' where roll='$roll1';";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo mysqli_error($conn);
            }
        }
    }
    header("Location: sem1marks.php?update=success");
    exit();
    }
                        #Semester 2 Marks
#Internal 1 marks
if (isset($_POST['sub-sem2in1'])) {
    #getting the roll number
    $roll1 = $_POST['studRoll'];

    $sql = "SELECT * from teachers where teaUsername='$username'";
    $result  = mysqli_query($conn, $sql);
    $re = mysqli_fetch_assoc($result);
    $arr = explode(",", $re['teaSSemSub']);
    foreach ($arr as $i) {
        if (strcmp($i, "U15CS202")) {
            $mark = $_POST[$i];
            $sql1 = "UPDATE sem2marks SET sem2p3s1i1='$mark' WHERE roll='$roll1';";
            $result = mysqli_query($conn, $sql1);
            if (!$result) {
                echo mysqli_error($conn);
            }
        } else if (strcmp($i, "U15CS2P2")) {
            $mark = $_POST[$i];
            $sql = "UPDATE sem2marks set sem2p3s2i1='$mark' where roll='$roll1';";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo mysqli_error($conn);
            }
        }
    }
    header("Location: sem2marks.php?update=success");
    exit();
}
#Internal 2 marks
else if (isset($_POST['sub-sem2in2'])) {
    #getting the roll number
    $roll1 = $_POST['studRoll'];

    $sql = "SELECT * from teachers where teaUsername='$username'";
    $result  = mysqli_query($conn, $sql);
    $re = mysqli_fetch_assoc($result);
    $arr = explode(",", $re['teaSSemSub']);
    foreach ($arr as $i) {
        if (strcmp($i, "U15CS202")) {
            $mark = $_POST[$i];
            $sql1 = "UPDATE sem2marks SET sem2p3s1i2='$mark' WHERE roll='$roll1';";
            $result = mysqli_query($conn, $sql1);
            if (!$result) {
                echo mysqli_error($conn);
            }
        } else if (strcmp($i, "U15CS2P2")) {
            $mark = $_POST[$i];
            $sql = "UPDATE sem2marks set sem2p3s2i2='$mark' where roll='$roll1';";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo mysqli_error($conn);
            }
        }
    }
    header("Location: sem2marks.php?update=success");
    exit();
}
#semseter marks
else if (isset($_POST['sub-sem2'])) {
    #getting the roll number
    $roll1 = $_POST['studRoll'];

    $sql = "SELECT * from teachers where teaUsername='$username'";
    $result  = mysqli_query($conn, $sql);
    $re = mysqli_fetch_assoc($result);
    $arr = explode(",", $re['teaSSemSub']);
    foreach ($arr as $i) {
        if (strcmp($i, "U15CS202")) {
            $mark = $_POST[$i];
            $sql1 = "UPDATE sem2marks SET sem2p3s1='$mark' WHERE roll='$roll1';";
            $result = mysqli_query($conn, $sql1);
            if (!$result) {
                echo mysqli_error($conn);
            }
        } else if (strcmp($i, "U15CS2P2")) {
            $mark = $_POST[$i];
            $sql = "UPDATE sem2marks set sem2p3s2='$mark' where roll='$roll1';";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo mysqli_error($conn);
            }
        }
    }
    header("Location: sem2marks.php?update=success");
    exit();
}
 
?>