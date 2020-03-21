<?php
  require "dbh.inc.php";
  if(isset($_POST['studRoll'])){
      $roll = $_POST['studRoll'];
      $sql = "UPDATE students SET studRep=1  WHERE studRoll='$roll';";
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