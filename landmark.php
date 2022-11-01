<?php 
session_start();
  $title = $_GET['name'];

  $db = mysqli_connect('pdb55.awardspace.net', '3796533_hype', '1234567890hype@', '3796533_hype');

  $sq = "SELECT * FROM `card` WHERE `name`='$title'";
  $results = mysqli_query($db, $sq);
  if (mysqli_num_rows($results)>0){
  while($row = mysqli_fetch_assoc($results)){
    $views = $row['views'];
    $views++;
    $upd = "UPDATE `card` SET `views`='$views' WHERE `name`='$title'";
    mysqli_query($db, $upd);
  }
}
?>
<!DOCTYPE html>
<html>
     <head>
      <link href="img/logo_transparent.png" rel="icon">
          <!--Title-->
          <title>Hype Holiday</title>
          <!--CSS-->
          <link href="fontawesome/css/all.css" rel="stylesheet">
          <link href="fontawesome/css/brands.css" rel="stylesheet">
          <link rel="stylesheet" href="css/landmark.css">
          <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">

          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
           <!--META-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
          .form-group { margin-top: 10px;
     border-top: 2px solid #ddd; }

.btn-block{
  background-color: #6204BF;
  color: #fff;
}
.btn-block:focus{
  outline: #6204BF;
}

          </style>
     </head>
     <body><div class="landmark">
     <?php
                    

                    $sql = "SELECT * FROM `card` WHERE `name`='$title'";
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
                        $country = $row['country'];
                        ?>
             <div class="image">
               <img src="admin/images/<?php echo $img;?>" class="rounded mx-auto d-block" style="background: #ddd;">
             </div>  
             <div class="text">
                  <div class="nvb">
                    <a href="#" onclick="history.back()"><i class="fas fa-chevron-left"></i> Results</a>
                    <h4><?php echo $name; ?></h4>
                  </div>
                  <div class="content">
                       <div class="container">
                         
                            <div class="header">
                            <img src="admin/images/<?php echo $img;?>">
                              <h5><?php echo $name;?></h5>
                                                           
                            </div>

                              <p class="c-t"><?php echo $about;?></p>
                              <p class="c-o">Country of Origin</p>
                              <p class="c"><?php echo $country; ?></p><br>
                              <p class="map"><iframe  src="<?php echo $maps; ?>" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
                              <div class="c-o">
                              <a href="<?php echo $waze;?>" target="_blank" class='btn btn-primary'><i class="fa-brands fa-waze"></i> Waze</a>
                        </div>
                        <div class="c">
                              <a href="<?php echo $google;?>" target="_blank" class='btn btn-success'><i class="fa-brands fa-google"></i> Google Maps</a>
                              </div><br><br>
                              <form method="POST" action="landmark.php?name=<?php echo $title; ?>">
                                <div class="form-group"><br>
                                  <label>Review</label>
                                  <textarea name="review" class="form-control"><?php echo $fname; ?></textarea>
                                </div><br>
                                <div class="d-grid gap-2">
                                      <button type="submit" name="save_review" class="btn btn-block"><i class="fa-solid fa-paper-plane"></i> Post</button>
                                    </div><br><br>
                             </form>
                              
                            </div>
                     </div>
             </div>
          <?php 
                        }
                      }
                        /*User*/ 
                        $id = $_SESSION["log"];
                        $sql = "SELECT * FROM `users` WHERE `id`='$id'";
                        $result = mysqli_query($db, $sql);
                        if (mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                            $username = $row['username'];
                            $img = $row['profile_image'];
                            $_SESSION['user'] = $username;
                            $_SESSION['img_profile'] = $img;
                            }
                          }

                        /*Card*/ 

                        $card_sql = "SELECT * FROM `card` WHERE `name`='$title'";
                        $result_card = mysqli_query($db, $card_sql);
                        if (mysqli_num_rows($result_card)>0){
                            while($row = mysqli_fetch_assoc($result_card)){
                            $name = $row['name'];
                            $city = $row['city'];
                            $region = $row['region'];
                            $country = $row['country'];
                            $_SESSION['region'] = $region;
                            $_SESSION['country'] = $country;
                            $_SESSION['city'] = $city;
                            $_SESSION['name'] = $name;
                            }
                          }

                      if (isset($_POST['save_review'])) {
                        /*Variables*/
                        $reviews = mysqli_real_escape_string($db, $_POST['review']);
                        $username = $_SESSION['user'];
                        $img = $_SESSION['img_profile'];
                        $name = $_SESSION['name'];
                        $city = $_SESSION['city'];
                        $region = $_SESSION['region'];
                        $country = $_SESSION['country'];

                          $rev_sql = "INSERT INTO `reviews`(`username`, `profile_image`, `card_name`, `city`, `region`, `country`, `reviews`) VALUES ('$username', '$img', '$name', '$city', '$region', '$country', '$reviews')";
                          mysqli_query($db, $rev_sql);
                         
                      }
          ?>
     </body>          
</html>
