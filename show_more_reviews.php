<?php 
session_start();
include "server.php";
  
  if (isset($_SESSION["log"]) == 0) {
    header('location: login.php');
  }
  
?>
<!DOCTYPE html>
<html>
     <head>
      <link href="img/logo_transparent.png" rel="icon">
          <!--Title-->
          <title>Hype Holiday</title>
          <!--CSS-->
          <link href="img/logo_transparent.png" rel="icon">

          <link href="fontawesome/css/all.css" rel="stylesheet">
          <link rel="stylesheet" href="css/search.css">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
             <!--META-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
    .nvb {
     overflow: hidden;
     background-color: #fff;
     position: fixed;
     bottom: 0;
     z-index: 1;
     width: 100%;
     box-shadow: 0 1px 8px rgba(0,0,0,0.3);
     display:flex; 
     flex-flow:row wrap;
   }
   
   .nvb a {
     float: left;
     display: block;
     color: #bbb;
     text-align: center;
     padding: 14px 45px;
     text-decoration: none;
     font-size: 14px;
   }
   .alignlft {
     width:33.33333%;
     text-align:left;
     }
     .aligncenter {
     width:33.33333%;
     text-align:center;
     }
     .alignrgt {
     width:33.33333%;
     text-align:right;
     }
   .nvb a:hover {
     color: #6204BF;
   }
   
   .nvb a.active {
     color: #6204BF;
   }
   @media (min-width: 1000px) {
   .landmark{
                margin: 0px 400px;
            }
          }
    </style>
</head>
<body>
<div class="nvb">
                         <a href="my_account.php" class="alignlft"><i class="fas fa-user"></i><br>Account</a>
                         <a href="index.php" class="aligncenter"><i class="fas fa-home"></i><br>Home</a>
                         <a href="search.php" class="active alignrgt"><i class="fab fa-safari"></i><br>Browse</a>
                    </div>
          <div class="container">   
               <div class="landmark">
               <br>
               <div class="result">
                    <?php 
                    $safe_value = $_GET['value'];
                    
                    
                    $db = mysqli_connect('pdb55.awardspace.net', '3796533_hype', '1234567890hype@', '3796533_hype');

                    if (isset($safe_value)) {
                
                    ?>
                    <div class="reviews">
                    <h4 class="alignleft"><b>Reviews "<?php echo $safe_value; ?>"</b></h4>
                    <?php
                
                     $sql = "SELECT * FROM `reviews` WHERE `city` LIKE '%$safe_value%' OR `card_name` LIKE '%$safe_value%' OR `region` LIKE '%$safe_value%' OR `country` LIKE '%$safe_value%'";
                     $result = mysqli_query($db, $sql);
                     if (mysqli_num_rows($result) > 0){
                         while($row = mysqli_fetch_assoc($result)){
                         $username = $row['username'];
                         $reviews = $row['reviews'];
                         $name = $row['card_name'];
                         ?>
                         <a href="landmark.php?name=<?php echo $name; ?>" style="text-decoration:none; color:black;">
                 <div class="card">
                      <div class="image">
                      <?php 
                           $sql_profile = "SELECT * FROM `users` WHERE `username` = '$username'";
                           $res = mysqli_query($db, $sql_profile);
                           if (mysqli_num_rows($res) > 0){
                              while($row = mysqli_fetch_assoc($res)){
                              $img = $row['profile_image'];
                           ?>
                           <img src="profile-images/<?php echo $img; ?>">
                           <?php 
                              }
                         }
                           ?>
                      </div>
                      <div class="text">
                           <h4><?php echo $username; ?></h4>
                           <p><?php echo $reviews; ?></p>
                      </div>
                 </div>
                         </a>
                 <?php     
                           }
                       }
                    } else{
                    ?>
                    <div class="reviews">
                    <h4 class="alignleft"><b>Reviews</b></h4>
                    <?php
                
                     $sql = "SELECT * FROM `reviews` ORDER BY RAND()";
                     $result = mysqli_query($db, $sql);
                     if (mysqli_num_rows($result) > 0){
                         while($row = mysqli_fetch_assoc($result)){
                         $username = $row['username'];
                         $img = $row['profile_image'];
                         $reviews = $row['reviews'];
                         $name = $row['card_name'];
                         ?>
                         <a href="landmark.php?name=<?php echo $name; ?>" style="text-decoration:none; color:black;">
                 <div class="card">
                      <div class="image">
                           <img src="profile-images/<?php echo $img; ?>">
                      </div>
                      <div class="text">
                           <h4><?php echo $username; ?></h4>
                           <p><?php echo $reviews; ?></p>
                      </div>
                 </div>
                         </a>
                    <?php }
                     }
                    }
                    
                    ?>
              
                    
               </div>
               <br><br><br><br>
               </div>
          </div>
           
     </body>
</html>
