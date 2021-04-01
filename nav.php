  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Charcuterie</a>
      <a class="nav-link" href="AddItem.php">Ajouter un produit</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Cart.php"><i class="fas fa-cart-plus"></i></a>
          </li>
          <?php if($_SESSION['username'] == true){
              $sql = "SELECT * from users WHERE id";
              $db = new PDO('mysql:host=localhost;port=3306;dbname=registration', 'root', '');
              $request = $db->prepare($sql);
              $request = $db->query($sql);
              $user = $request->fetch();
          ?>
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo htmlspecialchars($user["username"]) ?> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><strong>Crédits :</strong> <?php echo stripslashes($user["money"]) ?>$</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?logout='1'"><strong>Se déconnecter</strong></a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>