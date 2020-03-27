<?php

session_start();
$id = $_SESSION['id'];
$roll = $_SESSION['roll'];
include_once "dbh.inc.php";
$s = "SELECT * FROM teachers where teauserid='$id';";
$s2 = "SELECT * FROM students where studRoll='$roll';";
$sres = mysqli_query($conn, $s);
$s2res = mysqli_query($conn, $s2);
if (mysqli_num_rows($sres)>0) {
  
  if(isset($_POST['submit'])){

  	$file = $_FILES['file'];

  	$filename = $_FILES['file']['name'];
  	$filetype = $_FILES['file']['type'];
  	$fileerror = $_FILES['file']['error'];
  	$filetmpname = $_FILES['file']['tmp_name'];
  	$filesize = $_FILES['file']['size'];
    
    $fileext = explode('.',$filename);
    $fileactext = strtolower(end($fileext));

    $allowed = array("jpg");
    
    if(in_array($fileactext,$allowed)){
                 if($fileerror == 0){
                        if($filesize <= 2000000){
                           $filenewname = "profile".$id.".".$fileactext;
                           $filedestination = "uploads/".$filenewname;
                           move_uploaded_file($filetmpname,$filedestination);
                           $sql = "UPDATE profileimg SET stat=0 WHERE userid='$id';";
                           $result = mysqli_query($conn,$sql);
                           header("Location: teamain.php?upload=success".mt_rand());
                         }
                        else{
                       header("Location: teamain.php?mes=nott");
                          }
                     } else {
                        header("Location: teamain.php?mes=fileerrt");
                     }
                   } else {
                     header("Location: teamain.php?mes=ert");
                   }
                  }    
    	        }
            
             else if (mysqli_num_rows($s2res)>0) {
               if (isset($_POST['submit'])) {

               $file = $_FILES['file'];

               $filename = $_FILES['file']['name'];
               $filetype = $_FILES['file']['type'];
               $fileerror = $_FILES['file']['error'];
               $filetmpname = $_FILES['file']['tmp_name'];
               $filesize = $_FILES['file']['size'];

               $fileext = explode('.', $filename);
               $fileactext = strtolower(end($fileext));

               $allowed = array("jpg");

               if (in_array($fileactext, $allowed)) {
                 if ($fileerror == 0) {
                   if ($filesize <=30000000) {
                     $filenewname = "profile" . $roll . "." . $fileactext;
                     $filedestination = "uploads/" . $filenewname;
                     move_uploaded_file($filetmpname, $filedestination);
                     $sql = "UPDATE profileimg SET stat=0 WHERE userid='$roll';";
                     $result = mysqli_query($conn, $sql);
                     header("Location: studmain.php?upload=success".mt_rand());
                   } 
                    else {
                     header("Location: studmain.php?mes=not");
                   }
      } else {
        header("Location: studmain.php?mes=fileerr");
      }
    } else {
      header("Location: studmain.php?mes=er");
    }    
             }
           }
?>