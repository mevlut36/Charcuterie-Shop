<?php
session_start();
$msg = array(); 

	if($_SESSION['username'] == true){
		if($_SESSION["money"] > 0){
			$_GET["buy"] = htmlspecialchars($_GET["buy"]);
			$terme = $_GET["buy"];
			if(isset($terme)){
				$sqli = "SELECT price FROM meat WHERE id =" . $_GET["buy"];
				$db = new PDO('mysql:host=localhost;dbname=items', 'root', '');
				$req = $db->query($sqli);
				$item = $req->fetch();

				$bdd = new PDO('mysql:host=localhost;dbname=registration', 'root', '');
				$sql = "UPDATE users SET money = ".$_SESSION["money"]." - ". $item["price"] ." WHERE username = '". $_SESSION["username"] ."'";
				$result = $bdd->query($sql);
				$user = $result->fetch();
				if (count($msg) == 0) {
					array_push($msg, "Vous avez bien payé, votre viande arrive sous peu...");
				}
			}
		}
	} header("Location:index.php");


?>