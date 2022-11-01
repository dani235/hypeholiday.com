<?php
include "server.php";
$id = $_SESSION["log"];



  $msg = "";
  $msg_class = "";
  $conn = mysqli_connect('pdb55.awardspace.net', '3796533_hype', '1234567890hype@', '3796533_hype');
  if (isset($_POST['save_profile'])) {
    // for the database
    $fname = stripslashes($_POST['fname']);
    $lname = stripslashes($_POST['lname']);
    $phone = stripslashes($_POST['phone']);
    $email = stripslashes($_POST['email']);
    $username = stripslashes($_POST['username']);

    // Upload image only if no errors
    if (empty($error)) {
      $username = strtoupper($username);
  
        $sql = "UPDATE `users` SET `first`='$fname', `last`='$lname', `phone`='$phone', `email`='$email', `username`='$username' WHERE `id` = $id";
        if(mysqli_query($conn, $sql)){
          $msg = "Records saved in the Database";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } else {
        $error = "There was an erro uploading the file";
        $msg = "alert-danger";
      }
    }
  

  if (isset($_POST['save_image'])) {
    // for the database
  
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
    $target_dir = "profile-images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $sql = "UPDATE `users` SET `profile_image`='$profileImageName' WHERE `id` = $id";
        if(mysqli_query($conn, $sql)){
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } else {
        $error = "There was an erro uploading the file";
        $msg = "alert-danger";
      }
    }
  }


  if (isset($_POST['delete_image'])) {
    
        $sql = "UPDATE `users` SET `profile_image`=0 WHERE `id` = $id";
        if(mysqli_query($conn, $sql)){
          $msg = "Image delete from the Database";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } 
   