<?php
session_start();
  require "dbh.inc.php";
  $roll = $_SESSION['roll'];
  $s = "SELECT * from students where studRoll='$roll';";
  $r = mysqli_query($conn,$s);
  $rt = mysqli_fetch_assoc($r);

    if(isset($_POST['submit-news'])){
       if($rt['studYear'] == 3){
    $news = $_POST['latNews'];   
    $sql = "UPDATE content set latestnews3='$news' where id=1;";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        echo mysqli_error($conn);
    }
    header("Location: studrep.php?update=con");
    exit();
       }
   else if ($rt['studYear'] == 1) {
        $news = $_POST['latNews'];
        $sql = "UPDATE content set latestnews1='$news' where id=1;";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            echo mysqli_error($conn);
        }
        header("Location: studrep.php?update=con");
        exit();
    }
   else if ($rt['studYear'] == 2) {
        $news = $_POST['latNews'];
        $sql = "UPDATE content set latestnews2='$news' where id=1;";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            echo mysqli_error($conn);
        }
        header("Location: studrep.php?update=con");
        exit();
    }
  }
  else if(isset($_POST['submit-placements'])){
       $userna = $_POST['studName'];
       $rol = $_POST['studRoll'];
       $com = $_POST['studCom'];
       $feed = $_POST['studFeed'];
       $sw = "INSERT into placements(studRoll,studName,studCom,studFeedback) values('$rol','$userna','$com','$feed');";
       $rr = mysqli_query($conn,$sw);  
       header("Location: studrep.php?update=con");
       exit();
  }
?>