<?php 
include('server.php');
$bdd = new PDO('mysql:host=localhost:3306;dbname=registration', 'root', '');
ini_set('display_errors','off');
?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop - Login</title>

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

          <div class="col-lg-8 col-md-6 mb-4">
            <form action="login.php" method="POST">
              <div class="card h-100 form-control">
                <div class="card-body">
                  <strong><h4 class="card-title">Login</h4></strong>
                  <hr>
                  <input name="username" type="text" class="form-control" placeholder="Pseudo"></input><br/>
                  <input name="password" type="password" class="form-control" placeholder="Mot de passe"></input><br/>
                  <button type="submit" class="btn btn-primary" name="login_user">Connexion</button><br/>
                  <a href="register.php">Pas de compte ? crée un compte</a>
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
