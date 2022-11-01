<?php 
session_start();
include "server.php";
include_once('processForm.php');  

  if (isset($_SESSION["log"]) == 0) {
    header('location: login.php');
  }

  $id = $_SESSION["log"];
  $user_sql = "SELECT * FROM `users` WHERE `id` = $id";
  $results = mysqli_query($db, $user_sql);
  if (mysqli_num_rows($results)>0){
      while($row = mysqli_fetch_assoc($results)){
     $username = $row['username'];
     $img = $row['profile_image'];
       $_SESSION['user-acc'] = $username;
       $_SESSION['pro-img'] = $img;
   }
 }

 $username = $_SESSION['user-acc'];
 $img = $_SESSION['pro-img'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Account</title>
  <!-- Bootstrap CSS -->
  <link href="img/logo_transparent.png" rel="icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/main.css">
  <link href="fontawesome/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">
  
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
   .alignleft {
     width:33.33333%;
     text-align:left;
     }
     .aligncenter {
     width:33.33333%;
     text-align:center;
     }
     .alignright {
     width:33.33333%;
     text-align:right;
     }
   .nvb a:hover {
     color: #6204BF;
   }
   
   .nvb a.active {
     color: #6204BF;
   }
   .card{
     box-shadow: 0 5px 18px rgba(0, 0, 0, 0.3);
     border-radius: 5px;
     margin: 10px;
     display:flex; 
     flex-flow:row wrap;
}
.card .image img{
     width: 70px;
     height: 70px;
     border-radius: 50%;
     margin: 20px 0 0 10px;
}
.card .text{
     font-size: small;
     width: 70%;
     margin: -70px 0px  20px 100px;
}
@media (min-width: 1000px) {
.landmark{
                margin: 0px 300px;
            }
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
  background-color:  #1a1a1a;
  color: #ffffff;
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
  background-color: #000000;
  border: 0px;
  padding: 8px;
  color: #ffffff;
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
  background-color:  red;
  color: #ffffff;
  padding: 8px;
  border-radius: 8px;
  transition: 0.3s;
}

.btn:hover {
  background-color:  #bfbfbf;  
  color: #0d0d0d;
  font-weight: 300px;
}

.btn-more {
  background-color:  #6204BF;
  color: #ffffff;
  padding: 7px;
  border-radius: 8px;
  transition: 0.3s;
  right: 10px;
  transition: all 0.4s ease;
}

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><img src="profile-images/<?php echo $img;?>" alt="" width="30" height="24" class="d-inline-block align-text-top"> <?php echo $username; ?></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="my_account.php"><i class="fa-solid fa-blog"></i> Posts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="edit_my_account.php"><i class="fa-solid fa-pen-to-square"></i> Edit My Account</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="reviews.php"><i class="fa-solid fa-magnifying-glass-location"></i> Reviews</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php" style="color: red;"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                  </li>
                

                  </li>
                </ul>
               
              </div>
            </div>
          </nav>
<div class="nvb">
                         <a href="my_account.php" class="active alignleft"><i class="fas fa-user"></i><br>Account</a>
                         <a href="index.php" class="aligncenter"><i class="fas fa-home"></i><br>Home</a>
                         <a href="search.php" class="alignright"><i class="fab fa-safari"></i><br>Browse</a>
                    </div>
  <div class="container">
    <div class="landmark">
    <div class="row">
      <div class="col form-div">
        <div class="reviews">
                    <h4 class="alignleft"><b>My Reviews</b></h4>
                    <?php
                

                     $sql = "SELECT * FROM `reviews` WHERE `username`='$username'";
                     $result = mysqli_query($db, $sql);
                     if (mysqli_num_rows($result) > 0){
                         while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                         $username = $row['username'];
                         $review = $row['reviews'];
                         $card_name = $row['card_name'];                         
                         ?>
                                <div class="d-flex justify-content-center">
                   <a href="landmark.php?name=<?php echo $card_name; ?>" style="color: #fff; text-decoration: none;"><div class="my-card">
     <div class="card-content">
       <div class="img-place">
       <?php 
                           $sql_profile = "SELECT * FROM `card` WHERE `name` = '$card_name'";
                           $res = mysqli_query($db, $sql_profile);
                           if (mysqli_num_rows($res) > 0){
                              while($row = mysqli_fetch_assoc($res)){
                              $image_post = $row['img'];
                           ?>
          <div id="card-img"><img src="admin/images/<?php echo $image_post; ?>"></div>
          <?php 
                              }
                            }
          ?>
       </div>
       <div class="card-text">
       <?php 
                           $sql_profile = "SELECT * FROM `users` WHERE `username` = '$username'";
                           $res = mysqli_query($db, $sql_profile);
                           if (mysqli_num_rows($res) > 0){
                              while($row = mysqli_fetch_assoc($res)){
                              $img = $row['profile_image'];
                           ?>
         <h5><img src="profile-images/<?php echo $img;?>"><?php echo $username?></h5>
         <?php 
                              }
                            }
         ?>
         <p><?php echo $review ?></p>
         <a href="delete-rev.php?id=<?php echo $id?>"><button class="btn"><i class="fa-solid fa-trash"></i></button></a>
         <a href="landmark.php?name=<?php echo $card_name; ?>"><button class="btn-more">Read More <i class="fa-solid fa-angles-right"></i></button></a>

        </div>
     </div></a>
  </div>
</div>
                         <?php 
                         }
                        }else{
                          echo "Momentan nu ai înregistrat nici un review.";
                        }
                         
                         ?>
      </div>
    </div>
                      </div>
  </div><br><br><br><br>
  <script src="js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>