<?php 
    $db = new PDO('mysql:host=localhost;dbname=librairie', 'root', '0000');
    $new_livre = $db->prepare('INSERT INTO `librairie`.`librairie` (`titre`, `id_auteur`, `resume`) VALUES (:titre, :auteur, :resume)');
    $new_livre->bindParam(':titre', $_POST['titre']);
    $new_livre->bindParam(':auteur', $_POST['auteur']);
    $new_livre->bindParam(':resume', $_POST['resume']);
    $new_livre->execute();
    header('Location:../../index.php');
?>