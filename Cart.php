<?php 
session_start(); 
$db = mysqli_connect('localhost:3306', 'root', '', 'registration');
$bdd = new PDO('mysql:host=localhost:3306;dbname=registration;charset=utf8', 'root', '');
ini_set('display_errors','off');

include_once("class/Cart.php");


$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On vérifie que $p soit un float
   $p = floatval($p);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         addItem($l,$q,$p);
         break;

      Case "suppression":
         removeItem($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            editQuantity($_SESSION['cart']['name'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop - Cart</title>

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
          <div class="col-lg-4 col-md-6 mb-4">
          	<form method="post" action="class/Cart.php">
	          	<table style="width= 400px">
	          		<tr>
	          			<td colspan="4">Votre Panier</td>
	          		</tr>
	          		<tr>
	          			<td>Nom</td>
	          			<td>Quantité</td>
	          			<td>Prix</td>
	          			<td>Action</td>
	          		</tr>
	          		<?php
				    if (createCart()){
				        $nbArticles=count($_SESSION['cart']['name']);
				        if ($nbArticles <= 0)
				        echo "<tr><td>Votre cart est vide </ td></tr>";
				        else
				        {
				            for ($i=0 ;$i < $nbArticles ; $i++)
				            {
				                echo "<tr>";
				                echo "<td>".htmlspecialchars($_SESSION['cart']['name'][$i])."</ td>";
				                echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['cart']['quantity'][$i])."\"/></td>";
				                echo "<td>".htmlspecialchars($_SESSION['cart']['price'][$i])."</td>";
				                echo "<td><a href=\"".htmlspecialchars("cart.php?action=suppression&l=".rawurlencode($_SESSION['cart']['name'][$i]))."\">XX</a></td>";
				                echo "</tr>";
				            }

				            echo "<tr><td colspan=\"2\"> </td>";
				            echo "<td colspan=\"2\">";
				            echo "Total : ".total();
				            echo "</td></tr>";

				            echo "<tr><td colspan=\"4\">";
				            echo "<input type=\"submit\" value=\"Rafraichir\"/>";
				            echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

				            echo "</td></tr>";
				        }
				    }
				    ?>
	          	</table>
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