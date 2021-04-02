<?php
session_start();
ini_set('display_errors','off');

$db = mysqli_connect('localhost:3306', 'root', '', 'registration');
$bdd = new PDO('mysql:host=localhost:3306;dbname=registration;charset=utf8', 'root', '');

if (!isset($_SESSION['username'])) { header('location: login.php');}

include("class/Buy.php");
include("class/Article.php");

if(array_key_exists('buy', $_POST)) {
  buy();
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

          <div class="col-lg-12 col-md-6 mb-4">
            <div class="card h-100">
			        <div class="col-lg-4 col-md-6 mb-4">
              <img class="card-img-top" src="upload/<?php echo stripslashes($item['name']) ?>.png" alt="" width="100" height="150">
			         </div>
              <div class="card-body">
                <?php
                $sql = "SELECT * from meat";
                $db = new PDO('mysql:host=localhost;port=3306;dbname=items', 'root', '');
                $req = $db->query($sql);
                ?>
                <h4 class="card-title"><?php echo stripslashes($item["name"]) ?></h4>
                <h5>$<?php echo stripslashes($item["price"]) ?>/kg</h5>
                <p class="card-text"><?php echo stripslashes($item["description"]) ?></p>
                <form action="" method="POST">
                  <a href="Cart.php" name="buy" class="btn btn-primary">Ajouter au panier</a><br/>
                </form>
                Admin : <a href="delete.php?id=<?= $item['id'] ?>">Supprimer l'article</a>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>

  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
