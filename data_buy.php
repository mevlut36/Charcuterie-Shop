<?php
session_start();
$msg = array(); 

	if($_SESSION['username'] == true){
		if($_SESSION["money"] > 0){
			$_GET["buy"] = htmlspecialchars($_GET["buy"]);
			$terme = $_GET["buy"];
			$sqli = "SELECT * FROM meat WHERE id =" . $_GET["buy"];
			$db = new PDO('mysql:host=localhost;dbname=items', 'root', '');
			$req = $db->query($sqli);
			$item = $req->fetch();
			if(isset($item["stock"]) <= isset($_GET["quantity"])) {
				if(isset($terme)){
					$sqli = "select sum(". $_GET["quantity"] ." - ". $item["stock"] .") from meat WHERE id = '". $item["id"] ."'";
					//$sqli = "SELECT meat SET stock = ". $_GET["quantity"] ." - ". $item["stock"] ." WHERE id = '". $item["id"] ."'";
					$req = $db->query($sqli);
					$item = $req->fetch();

					$bdd = new PDO('mysql:host=localhost;dbname=registration', 'root', '');
					$sql = "UPDATE users SET money = ".$_SESSION["money"]." - ". ($item["price"] * $_GET["quantity"]) ." WHERE username = '". $_SESSION["username"] ."'";
					$result = $bdd->query($sql);
					$user = $result->fetch();
					if (count($msg) == 0) {
						array_push($msg, "Vous avez bien payé, votre viande arrive sous peu...");
					}
				}
			}
		}
	} header("Location:index.php");


?>