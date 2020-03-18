<?php

session_start();
$id = $_SESSION['id'];
include_once "dbh.inc.php";


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
           if($filesize <= 4000000){
              $filenewname = "profile".$id.".".$fileactext;
              $filedestination = "uploads/".$filenewname;
              move_uploaded_file($filetmpname,$filedestination);
              $sql = "UPDATE profileimg SET stat=0 WHERE userid='$id';";
              $result = mysqli_query($conn,$sql);
              header("Location: teamain.php?upload=success");
           }
           else{
           	echo "The file is too big";
           }
    	} 
    	else{
          echo "There is an error occured while uploading";
    	}
    }
    else{
    	echo "This type is not allowed to be uploaded";
    }
  }
?>