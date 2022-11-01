<?php 
session_start();
include "server.php";
  
  if (isset($_SESSION["log"]) == 0) {
    header('location: login.php');
  }
  
?>

<html>
     <head>
      <link href="img/logo_transparent.png" rel="icon">
          <!--Title-->
          <title>Hype Holiday</title>
          <!--CSS-->
          <link href="fontawesome/css/all.css" rel="stylesheet">
          <link rel="stylesheet" href="css/search.css">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
             <!--META-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
             @media (min-width: 1000px) {
             .landmark{
                margin-left: 170px;
                margin-right: 170px;
            }
            .arrow{
              margin-left: 360px;
            }
          }
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
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');

body {
  font-family: 'Poppins', sans-serif;

}
.my-card {
  width: 400px;
  height: auto;
  box-shadow: 0 10px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
  position: relative;
  border-radius: 20px;
  margin: auto;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
}

.img-place {
  overflow: hidden;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
}
.img-place img{
    width: fit-content;
    height: 100% ; 
    
}

#card-img {
  width: fit-content;
  height: 280px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  
}


.card-2-space {
padding: 0 40px 20px 40px;
}

.card-text {
  padding: 5%;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  background-color:  #fff;
  color: #000;
  font-size: 20px;
}
.card-text img{
    width: 40px;
    height: 40px;
    border-radius: 50%;
}
.card-btn {
  width: 100%;
  margin-top: 10px;
}

.my-btn {
  width: 100%;
  background-color: #fff;
  border: 0px;
  padding: 8px;
  color: #000;
  box-shadow: 0 10px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
  transition: 0.3s;
}

.my-btn:hover {
  background-color: #666699;
}

@media (max-width: 767px){
.my-card {
    margin: 0 0 20px 0;
    }
}

.btn {
  background-color:  #fff;
  color: #000;
  box-shadow: 0 10px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
  padding: 10px;
  border-radius: 8px;
  transition: 0.3s;
}

.btn:hover {
  background-color:  #bfbfbf;  
  color: #0d0d0d;
  font-weight: 300px;
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
               <form method="POST" action="search.php">
               <div class="wrapper">
                    <div class="searchBar">
                    <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Search" value="" />
                    <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit" display="none">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                    </svg>
                    </button>
                    </div>
               </div>
               </form>
               <div class="result">
                    <?php 
                    $safe_value = $_POST['searchQueryInput'];
                    if (isset($_POST['searchQuerySubmit'])) {
              
                    ?>
                    <h4 class="alignleft">Rezultate "<?php echo $safe_value; ?>"</h4>   
                    <p class="s-m alignright"><a href="show_more_landmarks.php?value=<?php echo $safe_value; ?>">Show More</a> <i class="fas fa-chevron-right"></i></p>
                    
     <div class="justify-content-center">
                    <?php 
                    }
                    $db = mysqli_connect('pdb55.awardspace.net', '3796533_hype', '1234567890hype@', '3796533_hype');
               
                    if (isset($_POST['searchQuerySubmit'])) {
                        
                    $safe_value = mysqli_real_escape_string($db, $_POST['searchQueryInput']);
                    $sql = "SELECT * FROM `card` WHERE `city` LIKE '%$safe_value%' OR `name` LIKE '%$safe_value%' OR `region` LIKE '%$safe_value%' OR `country` LIKE '%$safe_value%' OR `about` LIKE '%$safe_value%' ORDER BY RAND() LIMIT 2";
                    $result = mysqli_query($db, $sql);
                    if (mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $img = $row['img'];
                        $name = $row['name'];
                        $about = $row['about'];
                        $maps = $row['maps'];
                        $waze = $row['waze'];
                        $google = $row['google'];
               ?>
               <div class="d-flex justify-content-center">
                <div class="landmark">
               <div class="my-card">
     <div class="card-content">
       <div class="img-place">
          <div id="card-img"><img src="admin/images/<?php echo $img; ?>"></div>
       </div>
       <div class="card-text">
         <h5><?php echo $name?></h5>
         <?php 
                             $rev = "SELECT count(4) FROM `reviews` WHERE `card_name` = '$name'";
                             $res = mysqli_query($db, $rev);
                             if (mysqli_num_rows($res) > 0) {
                                 while($rows = mysqli_fetch_array($res)){
                                     $count = $rows['0'];
                             ?>
                             <p><i class="far fa-star"></i> <?php echo $count; ?> reviews</p>                             
                               
                             
                         </a>
                          <?php 
                                 }
                         } else{
                              echo "<p><i class='far fa-star'></i> 0 reviews</p>                             
                              </div>   
                              
                          </div></a>";
                          }
                          ?>
                                   <a href="landmark.php?name=<?php echo $name; ?>"><button class="btn">See more</button></a>
        </div>
     </div>
  </div>
</div>
                        </div>
                        </div>
                    <?php 
                        }
                    }else{ 
                        echo "Momentan nu avem in baza de date aceasta locatie.";
                    }
                    ?>
                    </div>
                    
               </div><br>
               <div class="justify-content-center">
               <div class="landmark">
                    <h4 class="alignleft"><b>Reviews "<?php echo $safe_value; ?>"</b></h4>
                    <?php
                
                     $sql = "SELECT * FROM `reviews` WHERE `city` LIKE '%$safe_value%' OR `card_name` LIKE '%$safe_value%' OR `region` LIKE '%$safe_value%' OR `country` LIKE '%$safe_value%' ORDER BY RAND() LIMIT 2";
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
                 </div></a>
                        
                
                 <?php     
                           }
                       ?>
                        <div style="text-align: center;">
                      <a href="show_more_reviews.php?value=<?php echo $safe_value;?>" style="text-decoration:none; color:black;"><button type="button" class="buts">Show More</button></a> 
                    </div><br><br><br>
                          </div>
                       <?php
                     }
                    } else { ?> <!--LANDMARK-->
                    <div class="landmark">
                    
                         <br><h1><b>Landmarks</b></h1>
                         <?php
                         $db = mysqli_connect('pdb55.awardspace.net', '3796533_hype', '1234567890hype@', '3796533_hype');
     
                         $sql = "SELECT * FROM `card` ORDER BY RAND() LIMIT 5";
                         $result = mysqli_query($db, $sql);
                         if (mysqli_num_rows($result)>0){
                             while($row = mysqli_fetch_assoc($result)){
                             $id = $row['id'];
                             $img = $row['img'];
                             $name = $row['name'];
                             $about = $row['about'];
                             $maps = $row['maps'];
                             $waze = $row['waze'];
                             $google = $row['google'];
                             $city = $row['city'];
                             ?>
                         <a href="landmark.php?name=<?php echo $name;?>" style="text-decoration: none; color: #000;"><div class="land1">
                             <div class="image">
                                   <img src="admin/images/<?php echo $img; ?>">
                             </div>
                             <div class="arrow"><i class="fas fa-chevron-right"></i></div>
                             <div class="text">
                             <h4><?php echo $name; ?></h4>
                             <?php 
                             $rev = "SELECT count(4) FROM `reviews` WHERE `card_name` = '$name'";
                             $res = mysqli_query($db, $rev);
                             if (mysqli_num_rows($res) > 0) {
                                 while($rows = mysqli_fetch_array($res)){
                                     $count = $rows['0'];
                             ?>
                             <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-star"></i> <?php echo $count; ?> reviews</p>                             
                             </div>   
                             
                         </div></a>
                          <?php 
                                 }
                         } else{
                              echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='far fa-star'></i> 0 reviews</p>                             
                              </div>   
                              
                          </div></a>";
                          }
                             }
                         }
                         ?>
                         
                    
                    </div><br><br><br><br><br><br>
                    <?php 
                    }
                    ?>
               </div>
               </div>
               
          </div>
           
     </body>
</html>
