 <?php
  if(isset($_POST['submit'])){

    if(!empty($_POST['lang'])) {

      $lang = implode(",",$_POST['lang']);

      // Insert and Update record
      $checkEntries = mysqli_query($con,"SELECT * FROM languages");
      if(mysqli_num_rows($checkEntries) == 0){
        mysqli_query($con,"INSERT INTO languages(language) VALUES('".$lang."')");
      }else{
        mysqli_query($con,"UPDATE languages SET language='".$lang."' ");
      }
 
    }

  }
  ?>