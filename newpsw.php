<?php
    include "server.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <!--Title-->
        <title>New Password! - Hype Holiday</title>
        <!--IMG-->
        <link href="img/logo_transparent.png" rel="icon">

        <!--CSS Libraries-->
        <link rel="stylesheet" href="css/account.css">
        <link href="fontawesome/css/all.css" rel="stylesheet">
        <!--Meta-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

      <main class="main">
         <div class="icon"><img src="img/instagram_profile_image.png"></div>
         <form method="POST" action="newpsw.php" class="login">
           <h1>New Password</h1>
           <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
           <div class="group">
             <label for="user"></label>
             <input type="text" id="user" name="code" placeholder="Code">
           </div>
           <div class="group">
             <label for="user"></label>
             <input type="password" id="user" name="newpsw" placeholder="New Password">
           </div>
       
           <button type="submit" class="btn" name="updpsw">Change Now</button>
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
    </body>
</html>