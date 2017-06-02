<?php 
  session_start();
  if($_SESSION['is_connected'] == True) {

  } else {
    header('Location: login_register.php');
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bibliothèque</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <ul id="main-menu">
        <li><a href="list.php">Lister</a></li>
        <li><a href="add.php">Ajouter</a></li>
        <li><a href="form_update.php">Modifier</a></li>
        <li><a href="delete.php">Supprimer</a></li>
        <li><a href="function/disconnect.php">Deconnexion</a></li>
    </ul>
  </body>
</html>