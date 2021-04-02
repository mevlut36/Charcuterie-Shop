<?php
session_start(); 
$db = mysqli_connect('localhost:3306', 'root', '', 'registration');
$bdd = new PDO('mysql:host=localhost:3306;dbname=registration;charset=utf8', 'root', '');
ini_set('display_errors','off');


if (!empty($_POST['admin'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop - Admin</title>

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
            <div class="col-md-12">
              <form method="POST" action="data.php" class="bg-light p-5" enctype="multipart/form-data">
                <div class="card h-100 form-control">
                  <div class="card-body">
                    <strong><h4 class="card-title">Ajouter un article - Admin</h4></strong>
                    <hr>
                    <label for="fileUpload">Image :</label>
                    <input type="file" name="photo" id="fileUpload"><br/>
                    <input name="name" type="text" class="form-control" placeholder="Nom de viande"></input><br/>
                    <input name="price" type="text" class="form-control" placeholder="Prix"></input><br/>
                    <textarea name="description" type="text" class="form-control" placeholder="Description"></textarea><br/>
                    <button type="submit" class="btn btn-primary">Ajouter</button><br/>
                    <a href="index.php">Revenir en arrière</a>
                  </div>
                </div>
              </form>
            </div>
        </div>

      </div>

    </div>

  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
