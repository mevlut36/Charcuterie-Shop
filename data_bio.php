<?php
ini_set('display_errors','on');
if(isset($_POST["nom"], $_POST["texte"]) && !empty($_POST["nom"]) && !empty($_POST["texte"])){
    $nom = htmlspecialchars(addslashes($_POST["nom"]));
    $texte = htmlspecialchars(addslashes($_POST["texte"]));

    $bdd = new PDO("mysql:host=localhost:3306;dbname=articles;charset=utf8", "mevlut36", "22122002Mt._");
    $request = $bdd->prepare("INSERT INTO bio (nom, texte, date_time_publication) VALUES ('{$nom}', '{$texte}', NOW())");
    $request->execute();
} 

  			$lastid = $bdd->lastInsertId();
	         
	         if(isset($_FILES['photo']) AND !empty($_FILES['photo']['name'])) {
	            if(exif_imagetype($_FILES['photo']['tmp_name']) == 2) {
	               $chemin = 'upload/'.$lastid.'.jpg';
	               move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
	            } else {
	               $message = 'Votre image doit être au format jpg';
	            }
	         } header("Location:Biographie.php");

?>