<?php
session_start();
ini_set('display_errors','off');

$bdd = new PDO('mysql:host=localhost:3306;dbname=registration;charset=utf8', 'root', '');

if (!isset($_SESSION['username'])) { header('location: login.php');}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}
include("class/Buy.php");
include("class/Article.php");
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
              		<img class="card-img-top" src="img/<?php echo stripslashes($item['name']) ?>.png" alt="" width="150" height="150">
			    </div>
              	<div class="card-body">
	                <?php
	                $sql = "SELECT * from meat";
	                $db = new PDO('mysql:host=localhost;port=3306;dbname=items', 'root', '');
	                $req = $db->query($sql);
	                $row = $req->fetch();
	                ?>
	                <h4 class="card-title"><?php echo stripslashes($item["name"]) ?></h4>
	                <h5>€<?php echo stripslashes($item["price"]) ?>/kg</h5>
	                <p class="card-text"><?php echo stripslashes($item["description"]) ?></p>
	                <form action="data_buy.php?id=<?= $row["id"] ?>" method="POST">
	                  <button type="submit" name="buy" class="btn btn-primary">Ajouter au panier</button><br/>
	                </form>
	                <?php if(!isset($row['admin'])){ ?>
                	Admin : <a href="delete.php?id=<?php echo stripslashes($row['id']) ?>">Supprimer l'article</a>
					<?php } ?>
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
