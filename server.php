<?php 
session_start();

// initializing variables
$username = "";
$email    = "";
$msg = array();
$msg_class = "";
$errors = array();

// connect to the database
$db = mysqli_connect('pdb55.awardspace.net', '3796533_hype', '1234567890hype@', '3796533_hype');

if (isset($_POST['sing_in_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

  
    if (empty($username)) {
        array_push($errors, $msg = "Username is required", $msg_class = "alert-danger");
    }
    if (empty($password)) {
        array_push($errors, $msg = "Password is required", $msg_class = "alert-danger");
    }
   
    if (count($errors) == 0) {
        $password = md5($password);
        $username = strtoupper($username);
        $query = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            while ($row = mysqli_fetch_assoc($results)){
                $_SESSION["log"] = $row['id'];
                header('location: index.php');
            }
        } 
    }
  
  }

if (isset($_POST['sing_up_user'])) {
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['user']);
    $pass = mysqli_real_escape_string($db, $_POST['pass']);

    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' OR phone='$phone' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['username'] === $username) {
        array_push($errors, $msg = "Username already exists", $msg_class = "alert-danger");
      }
  
      if ($user['email'] === $email) {
        array_push($errors, $msg = "Email already exists", $msg_class = "alert-danger");
      }

      if ($user['phone'] === $phone) {
        array_push($errors, $msg = "Phone already exists", $msg_class = "alert-danger");
      }
    }

    if (count($errors) == 0) {
        $password = md5($pass);//encrypt the password before saving in the database
        $username = strtoupper($username);

        $query = "INSERT INTO `users`(`first`, `last`, `phone`, `country`, `email`, `password`, `username`) 
        VALUES ('$fname', '$lname', '$phone', '$country', '$email', '$password', '$username')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION["log"] = $row['id'];
        header('location: index.php');

        $subject = 'Bine ai venit!';
  $message = '<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>Bine ai venit!</title>
  <style>
      #email-wrap {
      background: #fff;
      color: #000;
      }
  </style>
  </head>
  <body>
      <div id="email-wrap">
       <p>Salut,</p><br>
      <p>Vrem doar să-ți spunem: Bine ai venit în comunitatea Hype Holiday. Sperăm să nu te dezamăgim.</p>
       <p>Cu multă stimă,<br>
       Echipa IT</p>            


      </div>
  </body>
  </html>';
  $from = "support@hypeholiday.com";
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  // Additional headers
  $headers .= 'To: ' .$email. "\r\n";
  $headers .= 'From: ' .$from. "\r\n";
  
  mail($femail, $subject, $message, $headers);
    }
}

if (isset($_POST['fpsw'])) {
  $femail = $_POST['email'];
  $code = rand();

  if (empty($femail)){
    $msg_class = "alert-danger";
    array_push($errors, $msg = "Email is required"); 
  }


   if (count($errors) == 0) {
    $icqry = "UPDATE `users` SET `newpsw`='$code' WHERE `email`='$femail'";
    mysqli_query($db, $icqry);

  $subject = 'Salut, dorești să-ți schimbi parola!';
  $message = '<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>Schimbă-ți parola</title>
  <style>
      #email-wrap {
      background: #fff;
      color: #000;
      }
  </style>
  </head>
  <body>
      <div id="email-wrap">
       <p>Salut,</p><br>
      <p>Pentru a-ți schimba parola te rugăm să accesezi <a href="http://hypeholiday.net/newpsw.php">link-ul acesta</a> și să introduci acest cod: ' .$code. '</p>
       <p>Cu multă stimă,<br>
       Echipa IT</p>            


      </div>
  </body>
  </html>';
  $from = "support@hypeholiday.com";
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  // Additional headers
  $headers .= 'To: ' .$email. "\r\n";
  $headers .= 'From: ' .$from. "\r\n";
  
  mail($femail, $subject, $message, $headers);
   }else {
    array_push($errors, "Sorry 404 error! Try Again.");
}
}
if (isset($_POST['updpsw'])) {
    $code = $_POST['code'];
    $newpsw = $_POST['newpsw'];

    if (empty($code)){
      $msg_class = "alert-danger";
      array_push($errors, $msg = "Code is required"); 
    }
    
     if (count($errors) == 0) {
       $newpsw = md5($newpsw);
      $cqry = "UPDATE `users`  SET `password`='$newpsw' WHERE `newpsw`='$code'";
      $re = mysqli_query($db, $cqry);
      header('location: login.php');
     }else {
      array_push($errors, "Sorry 404 error! Try Again.");
  }
     
    
  }
