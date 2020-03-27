<?php
  require "dbh.inc.php";
  if(isset($_POST['studRoll'])){
      $roll = $_POST['studRoll'];
      $r = "SELECT * from students where studRoll='$roll';";
      $rses =  mysqli_query($conn,$r);
      $rr = mysqli_fetch_assoc($rses);
      $sql = "INSERT into studrep(username) values('$rr[studUsername]');";
      $res = mysqli_query($conn,$sql);
      if(!$res){
          echo mysqli_error($conn);
      }
      else{
          header("Location: teamain.php?assign=success");
          exit();
      }     
  }
?>