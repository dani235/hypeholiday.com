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
   @media (min-width: 1000px) {
   .landmark{
                margin: 0px 400px;
            }
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
                    <a class="nav-link active" aria-current="page" href="edit_my_account.php"><i class="fa-solid fa-pen-to-square"></i> Edit My Account</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="reviews.php"><i class="fa-solid fa-magnifying-glass-location"></i> Reviews</a>
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
        <form action="edit_my_account.php" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-3 mt-3">Update profile</h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <?php
                    $db = mysqli_connect('pdb55.awardspace.net', '3796533_hype', '1234567890hype@', '3796533_hype');

                    $sql = "SELECT * FROM `users` WHERE `id` = $id";
                    $result = mysqli_query($db, $sql);
                    if (mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                        $img = $row['profile_image'];
                        $fname = $row['first'];
                        $lname = $row['last'];
                        $phone = $row['phone'];
                        $email = $row['email'];
                        $username = $row['username'];
                        ?>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update image</h4>
              </div>
              <img src="<?php if($img == 0){ echo "img/avatar.jpg";} else{echo "profile-images/$img";} ?>" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <br>
            <button type="submit" name="save_image" class="btn btn-primary">Upload Image</button>
            <?php if(isset($img)){ echo '<button type="submit" name="delete_image" class="btn btn-danger">Delete Image</button>';} else{ echo'';}
?>
          </div>
          <div class="form-group">
            <label>First Name</label>
            <textarea name="fname" class="form-control"><?php echo $fname; ?></textarea>
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <textarea name="lname" class="form-control"><?php echo $lname;?></textarea>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <textarea name="phone" class="form-control"><?php echo $phone;?></textarea>
          </div>
          <div class="form-group">
            <label>Email</label>
            <textarea name="email" class="form-control"><?php echo $email; ?></textarea>
          </div>
          <div class="form-group">
            <label>Username</label>
            <textarea name="username" class="form-control"><?php echo $username; ?></textarea>
          </div>
          <div class="form-group">
            <a href="get_code.php">Change Password?</a>
                        </div>
          <div class="form-group">
            <button type="submit" name="save_profile" class="btn btn-primary btn-block">Save User</button>
          </div><?php
                        }
                      }else{
                        echo "No Account!";
                      }
          ?>
        </form>
      </div>
    </div>
                    </div>
  </div><br><br><br><br>
  <script src="js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>