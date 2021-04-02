<?php
if(isset($_GET["id"]) && !empty($_GET['id'])) {
  $sql = "SELECT * FROM meat WHERE id =" . $_GET["id"];
  $db = new PDO('mysql:host=localhost;port=3306;dbname=items', 'root', '');
  $request = $db->prepare($sql);
  $request = $db->query($sql);
  $art = $request->fetch();
  $article = $request->fetchAll();
     
  $get_id = htmlspecialchars($_GET['id']);
  $item = $db->prepare('SELECT * FROM meat WHERE id = ?');
  $item->execute(array($get_id));
  
  if($item->rowCount() == 1) {
    $item = $item->fetch();
    $id = $item['id'];
    $name = $item['name'];
    $description = $item['description'];
    $price = $item['price'];
  } else {
      die('error dont exist');
    }
}
else {
  Header('Location: index.php');
}
?>