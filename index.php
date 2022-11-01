<?php 
session_start();
include "server.php";
  
  if (isset($_SESSION["log"]) == 0) {
    header('location: login.php');
  }
  
  $id = $_SESSION["log"];
?>
<!DOCTYPE html>
<html>
     <head>
      <link href="img/logo_transparent.png" rel="icon">
          <!--Title-->
          <title>Hype Holiday</title>
          <!--CSS-->
          <link href="fontawesome/css/all.css" rel="stylesheet">
          <link rel="stylesheet" href="css/index.css">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
             <!--META-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            @media (min-width: 1000px) {
            .landmark{
                margin: 0px 400px;
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
  background-color:  #0d0d0d;
  color: #ffffff;
  padding: 10px;
  border: 1px solid  #1a1a1a;
  border-radius: 8px;
  transition: 0.3s;
}

.btn .more:hover {
  background-color:  #bfbfbf;  
  color: #0d0d0d;
  border: 1px solid   #808080;
  font-weight: 300px;
}
.btn-save{
  background-color: #6204BF;
  color: #fff;
  border: none;
}
.btn-exit{
  background-color: red;
  color: #fff;
  border: none;
  left: 10px;
}

.close{
  background-color: transparent;
  color: gray;
  border: none;
  font-size: 25px;
}

.btn:hover{
  color: #fff;
}
.btn:focus{
  border: none;
}

.new-post{
  border-radius: 70%;
  background: #6204BF;
  color: white;
  border: none;
  padding: 5px;
  font-size: 31px;
  height: 60px;
  width: 60px;
  box-shadow: 0 2px 4px darkslategray;
  cursor: pointer;
  transition: all 0.2s ease;
  overflow: hidden;
  position: fixed;
  bottom: 85px;
  z-index: 1;
  right: 20px;
}
.new-post:active {
  background-color: #6204BF;
  box-shadow: 0 0 2px darkslategray;
  transform: translateY(2px);
}

#profileDisplay { display: block; height: 210px; width: 60%; margin: 0px auto;}

.img-placeholder {
  width: 60%;
  color: white;
  height: 100%;
  background: black;
  opacity: .7;
  height: 210px;
  z-index: 2;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  display: none;
}
.img-placeholder h4 {
  margin-top: 40%;
  color: white;
}
.img-div:hover .img-placeholder {
  display: block;
  cursor: pointer;
}
        </style>
     </head>
     <body>
                       <!--NAVBAR-->
                       <div class="nvb">
                         <a href="my_account.php" class="alignleft"><i class="fas fa-user"></i><br>Account</a>
                         <a href="index.php" class="active aligncenter"><i class="fas fa-home"></i><br>Home</a>
                         <a href="search.php" class="alignright"><i class="fab fa-safari"></i><br>Browse</a>
                    </div>
          <div class="container">

               <!--LANDMARK-->
                    <br><h1><b>Social</b></h1> 
                    
                    <button type="button" class="new-post" data-toggle="modal" data-target="#exampleModal">&#9998;</button>

<!-- Modal -->
<form action="createPost.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      <h2 class="text-center mb-3 mt-3">Upload Image</h2>
      <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Post Image</h4>
              </div>
              <img src="img/avatar.jpg" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" required>
            <br><br><br><br>

      <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Bio</span>
  </div>
  <textarea class="form-control" name="bio" aria-label="With textarea" required></textarea>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-exit" data-dismiss="modal">Close</button>
        <button type="submit" name="create_post" class="btn btn-save">POST</button>
      </div>

    </div>
  </div>
</div>
</form>


                    <?php

                    $mysql = "SELECT * FROM `users` WHERE id='$id'";
                    $res = mysqli_query($db, $mysql);
                    if (mysqli_num_rows($res) > 0){
                      while($row = mysqli_fetch_assoc($res)){
                        $country = $row['country'];
                      }
                    }

                     $sql = "SELECT * FROM `posts` WHERE nation='$country'";
                     $result = mysqli_query($db, $sql);
                     if (mysqli_num_rows($result) > 0){
                         while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                         $username = $row['users'];
                         $post = $row['post'];
                         $image = $row['post_image'];
                         ?> 
                    <div class="d-flex justify-content-center">
                    <div class="my-card">
     <div class="card-content">
       <div class="img-place">
          <div id="card-img"><img src="posts-images/<?php echo $image; ?>"></div>           
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
         <p><?php echo $post;?></p>
       </div>
     </div>
  </div>
</div><br><?php 
                         }
                        }
?>
               <!--REVIEWS-
               <div class="reviews">
                    <br><h3><b>Reviews</b></h3>
                    
                    <div class="rev">
                         <div class="image">
                               <img src="img/dani.jpg">
                         </div>
                         <div class="arrow"><i class="fas fa-chevron-right"></i></div>
                         <div class="text">
                         <h4>Dani</h4>                             
                         </div>  
                          
                     </div>
                     <div class="rev2">
                         <div class="image">
                               <img src="img/kendall.jpg">
                         </div>
                         <div class="arrow"><i class="fas fa-chevron-right"></i></div>
                         <div class="text">
                         <h4>Kendall</h4>                             
                         </div>    
                     </div>
                     <div class="rev2">
                         <div class="image">
                               <img src="img/kim.jpg">
                         </div>
                         <div class="arrow"><i class="fas fa-chevron-right"></i></div>
                         <div class="text">
                         <h4>Kim</h4>                             
                         </div>    
                     </div>
                     <div class="rev2">
                         <div class="image">
                               <img src="img/kylie.jpg">
                         </div>
                         <div class="arrow"><i class="fas fa-chevron-right"></i></div>
                         <div class="text">
                         <h4>Kylie</h4>                             
                         </div>    
                     </div>
                     <div class="rev3">
                         <div class="image">
                               <img src="img/raluka.jpg">
                         </div>
                         <div class="arrow"><i class="fas fa-chevron-right"></i></div>
                         <div class="text">
                         <h4>Raluka</h4>                             
                         </div>    
                     </div>
               </div>-->
               
          </div><br><br><br><br>
          
          

          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/index.js"></script>
   
</body>
</html>