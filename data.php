<?php

ini_set("display_errors","on");
if(isset($_POST["name"], $_POST["price"], $_POST["description"]) && !empty($_POST["name"]) && !empty($_POST["price"]) && !empty($_POST["description"])){
    $name = htmlspecialchars(addslashes($_POST["name"]));
    $price = htmlspecialchars(addslashes($_POST["price"]));
    $desc = htmlspecialchars(addslashes($_POST["description"]));

    $bdd = new PDO("mysql:host=localhost:3306;dbname=items;charset=utf8", "root", "");
    $request = $bdd->prepare("INSERT INTO meat (name, price, description) VALUES ('{$name}', '{$price}', '{$desc}')");
    $request->execute();
} 

$extension = array('jpg', 'gif', 'png');
$lastid = $bdd->lastInsertId();
             
if(isset($_FILES['photo']) AND !empty($_FILES['photo']['name'])) {
    if(exif_imagetype($_FILES['photo']['tmp_name']) == 2) {
        $chemin = 'upload/'.$lastid.'.jpg';
        move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
    } else {
        $message = 'Votre image doit être au format jpg';
    }
} header("Location:index.php");

?>