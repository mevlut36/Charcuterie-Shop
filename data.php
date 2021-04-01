<?php
if(isset($_POST["name"], $_POST["price"], $_POST["description"]) && !empty($_POST["name"]) && !empty($_POST["price"]) && !empty($_POST["description"])){
    $name = htmlspecialchars(addslashes($_POST["name"]));
    $price = htmlspecialchars(addslashes($_POST["price"]));
    $desc = htmlspecialchars(addslashes($_POST["description"]));

    $bdd = new PDO("mysql:host=localhost:3306;dbname=items;charset=utf8", "root", "");
    $request = $bdd->prepare("INSERT INTO meat (name, price, description) VALUES ('{$name}', '{$price}', '{$desc}')");
    $request->execute();


    $lastid = $bdd->lastInsertId();
    $extension = array('jpg', 'gif', 'png',);
        if(isset($_FILES['fileUpload']) AND !empty($_FILES['fileUpload']['name'])) {
            if(exif_imagetype($_FILES['fileUpload']['tmp_name']) == 2) {
                $chemin = 'upload/'.$lastid. '.' .$extension;
                move_uploaded_file($_FILES['fileUpload']['tmp_name'], $chemin);
            } else {
                $message = 'Votre image doit être au format png';
                }
            } 
    header("Location:index.php");
}

?>