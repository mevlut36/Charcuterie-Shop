<?php
session_start(); 
if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
$db = mysqli_connect('localhost:3306', 'mevlut36', '22122002Mt._', 'registration');
$bdd = new PDO('mysql:host=localhost:3306;dbname=registration;charset=utf8', 'mevlut36', '22122002Mt._');
ini_set('display_errors','off');
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
  }
  include("searching.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AhlMadhab - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
       <img
     src="/images/book-logo.png" width="70" height="70">
 
       <!-- <div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-book"></i>
			<img
     src="/images/book-logo.png" width="100" height="100">

        </div>-->
          <div class="sidebar-brand-text mx-3">AhlMadhab</div>
        </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <?php include("Menu.php"); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
<!-- Main Content -->

      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form action = "search.php" method = "get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" autocomplete="off" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" type = "search" name = "q">
              <div class="input-group-append">
                <button class="btn btn-primary" type = "submit" name = "s" value = "Rechercher">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search" action = "search.php" method = "get">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" autocomplete="off" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" type = "search" name = "q">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type = "submit" name = "s" value = "Rechercher">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <?php include("Notif.php") ?>
            <?php include("Profile.php") ?>      
        </nav>
        <!-- End of Topbar -->
        <section class="ftco-section contact-section">
      <div class="container">
        
        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8 mb-md-5"><br/><br/>
          	<h2 class="text-center">Ecrivez Votre biographie <br>à mettre en ligne.</h2>
            
            <form method="POST" action="data_bio.php" class="bg-light p-5 contact-form" enctype="multipart/form-data">
                <label for="fileUpload">Fichier:</label>
                <input type="file" name="photo" id="fileUpload">
                <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
              <div class="form-group">
                <input  name="nom" type="text" required class="form-control" placeholder="Nom du Sheikh/Mufti/Imam">
              </div>
              <div class="form-group">
                <textarea name="texte" required cols="30" rows="7" class="form-control" placeholder="Texte"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="METTRE EN LIGNE" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          <ul>
            <?php
            //SHOW ARTICLE 
              $sql = "SELECT id, nom from bio ORDER BY date_time_publication DESC";
              $db = new PDO('mysql:host=localhost;port=3306;dbname=articles', 'mevlut36', '22122002Mt._');
              $request = $db->query($sql);
              while($row = $request->fetch()){
            ?>
                  <li><a href="Savant.php?id=<?= $row["id"] ?>"><?= stripslashes($row["nom"]) ?></a> <strong>| <a class="btn-success" href="edit_bio.php?edit=<?= $row['id'] ?>">Modifier</a> | <button class="btn-danger" data-toggle="modal" data-target="#deleteModal">Supprimer</strong></button></li>
              
              <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Etes vous sûr de vouloir supprimer cette article ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">Cliquer sur "Supprimer" pour supprimer cette article.</div>
                      <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                        <a class="btn btn-danger" href="delete_bio.php?id=<?= $row['id'] ?>">Supprimer</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
          </ul>
          </div>
          <div class="col-md2"><br/><br/><br/><br/><br/><br/><br/><br/>
          <table width="100%" border ="1" cellspacing="1" cellpadding="1"><tr><td>
            <h5><strong>Aide mise en page:</strong></h5>
            <ul> 
              <li>Pour écrire en gras [g] puis fermer avec [/g]</li>
              <li>Pour écrire en italique [i] puis fermer avec [/i] </li>
              <li>Pour souligner [s] puis fermer avec [/s]</li>
            </ul>
            </td><tr></table>
          </div>
        </div>
    </section>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include("Footer.php"); ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include("Logout.php"); ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
