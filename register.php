<?php 
include("server.php"); 
?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop - Register</title>

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
            <?php include('errors.php'); ?>
            <form action="register.php" method="POST">
              <div class="card h-100 form-control">
                <div class="card-body">
                  <strong><h4 class="card-title">Register</h4></strong>
                  <hr>
                  <input type="text" name="username" autocomplete="off" class="form-control form-control-user" placeholder="Pseudo" value="<?php echo $username; ?>"><br/>
                  <input type="email" name="email" autocomplete="off" class="form-control form-control-user" placeholder="E-Mail" value="<?php echo $email; ?>"><br/>
                  <input name="password_1" type="password" class="form-control" placeholder="Mot de passe"></input><br/>
                  <input name="password_2" type="password" class="form-control" placeholder="Répeter le mot de passe"></input><br/>
                  <button type="submit" class="btn btn-primary" name="reg_user">Crée</button><br/>
                  <a href="login.php">Se connecter</a>
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
