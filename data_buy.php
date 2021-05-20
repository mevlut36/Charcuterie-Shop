<?php
session_start();
$msg = array(); 
if(isset($_POST["buy"])){
	if($_SESSION['username'] == true){
		if($_SESSION["money"] > 0){
				$bdd = new PDO('mysql:host=localhost;dbname=registration', 'root', '');
				$sql = "UPDATE users SET money = ".$_SESSION["money"]." - 5 WHERE username = '". $_SESSION["username"] ."'";
				$result = $bdd->query($sql);
				$user = $result->fetch();
				$money = $_SESSION['money'];
				if (count($msg) == 0) {
					array_push($msg, "Vous avez bien payé, votre viande arrive sous peu...");
				}
		}
	}
	header("Location:index.php");
}


?>