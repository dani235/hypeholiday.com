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
               <br>
               <div class="result">
                    <?php 
                    $safe_value = $_GET['value'];
                    
                    ?>
                    <h4 class="alignleft">Rezultate "<?php echo $safe_value; ?>"</h4>   
                    
     
                    <?php 
                    
                    $db = mysqli_connect('pdb55.awardspace.net', '3796533_hype', '1234567890hype@', '3796533_hype');
   
                    $sql = "SELECT * FROM `card` WHERE `city` LIKE '%$safe_value%' OR `name` LIKE '%$safe_value%' OR `region` LIKE '%$safe_value%' OR `country` LIKE '%$safe_value%' OR `about` LIKE '%$safe_value%'";
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
               <div class="my-card">
     <div class="card-content">
       <div class="img-place">
          <div id="card-img"><img src="admin/images/<?php echo $img; ?>"></div>
       </div>
       <div class="card-text">
         <h5><?php echo $name?></h5>
         <a href="landmark.php?name=<?php echo $name; ?>"><button class="btn">See more</button></a>
       </div>
     </div>
  </div>
</div>

                    <?php 
                        }
                    }else{
                        echo "Te rugăm să introduci locația de unde dorești obiectivele turistice!"; 
                    }
                    
                    ?>
                    
              
                    
               </div>
               <br><br><br><br>
                  </div>
          </div>
           
     </body>
</html>
