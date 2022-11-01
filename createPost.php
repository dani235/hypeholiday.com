<?php
include "server.php";
$id = $_SESSION["log"];

  $msg = "";
  $msg_class = "";
  $conn = mysqli_connect('pdb55.awardspace.net', '3796533_hype', '1234567890hype@', '3796533_hype'); 

  if (isset($_POST['create_post'])) {
    // for the database

    $bio = stripslashes($_POST['bio']);
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
    $target_dir = "posts-images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }


    $sql_check = "SELECT * FROM `users` WHERE id=$id";
    $result_check = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($result_check) > 0){
         while($row = mysqli_fetch_assoc($result_check)){
            $username = $row['username'];
            $profile_image = $row['profile_image'];
            $country = $row['country'];
         }
        }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO `posts`(`users`, `profile_image`, `nation`, `post`, `post_image`) VALUES ('$username', '$profile_image', '$country', '$bio', '$profileImageName')";
        if(mysqli_query($conn, $sql)){
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
          header('location: index.php');
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

   