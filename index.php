<?php
session_start(); 
$db = mysqli_connect('localhost:3306', 'root', '', 'registration');
$bdd = new PDO('mysql:host=localhost:3306;dbname=registration;charset=utf8', 'root', '');
ini_set('display_errors','off');

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>
<?php include("nav.php") ?>

  <div class="container">

    <div class="row">

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          
        </div><br/><br/>

        <div class="row">
          <h1>Nos articles</h1><br/>
          <?php
            $sql = "SELECT * from meat";
            $db = new PDO('mysql:host=localhost;port=3306;dbname=items', 'root', '');
            $request = $db->query($sql);
            while($row = $request->fetch()){
          ?></div>
          <div class="row">
            <div class="col-lg-4 col-md-4 mb-4">
              <div class="card h-100">
                <a href="item.php?id=<?= $row["id"] ?>"><img class="card-img-top" src="img/<?= stripslashes($row['name']) ?>.png" alt=""></a>
                  <div class="card-body">
                    <a href="item.php?id=<?= $row["id"] ?>"><?= stripslashes($row['name']) ?></a>
                  </h4>
                  <h4 class="card-title">
                  <h5>€<?= stripslashes($row['price']) ?>/kg</h5>
                  <p class="card-text"><?= stripslashes($row['description']) ?></p>
                </div>
              </div>
            </div>
            <?php } ?>
        </div>
      </div>

    </div>

  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
