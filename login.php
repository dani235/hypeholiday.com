<?php
    include "server.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <!--Title-->
        <title>Login Hype Holiday</title>
        <!--IMG-->
        <link href="img/logo_transparent.png" rel="icon">

        <!--CSS Libraries-->
        <link rel="stylesheet" href="css/account.css">
        <link href="fontawesome/css/all.css" rel="stylesheet">
        <link href="fontawesome/css/solid.css" rel="stylesheet">
        <!--Meta-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
  .alert {
  padding: 10px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
}

.closebtn {
  margin-left: 10px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 25px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
          </style>
    </head>
    <body>

      <main class="main">
         <div class="icon"><img src="img/instagram_profile_image.png"></div>
         <form method="POST" action="login.php" class="login">
           <h1>Login Hype Holiday <i class="fa-solid fa-circle-check"></i> </h1>
           <?php 
            if ($msg != array()) {
           ?>
              <div class="alert">
              <span class="closebtn">&times;</span>  
              <strong> ! </strong> <?php echo $msg ?> <strong> ! </strong>
            </div>
            <?php 
            }
            ?>
           <div class="group">
             <label for="user"></label>
             <input type="text" id="user" name="username" placeholder="Username">
           </div>
           <div class="group">
             <label for="user"></label>
             <input type="password" id="user" name="password" placeholder="Password">
           </div>
           <div class="group">
             <a href="get_code.php">Forgot password?</a>
           </div>
           <button type="submit" class="btn" name="sing_in_user">Join Now</button>
             <div class="groupRow">
               Don't have allready an account? <a href="create_account.php">Sing up!</a>
             </div>
           <div class="row"></div>
           <div class="groupRow">
           <span><a href="https://hypeholiday.com" style="text-decoration:none;">Hype Holiday INC.</a></span>
            
           </div>
         </form>
       </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/account.js"></script>
        <script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
    </body>
</html>