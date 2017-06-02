<?php 
    $db = new PDO('mysql:host=localhost;dbname=librairie', 'root', '0000');
    $livre = $db->prepare('UPDATE librairie.librairie SET titre = :titre, id_auteur = :auteur, resume = :resume WHERE id = :id');
    $livre->bindParam(':titre', $_POST['titre']);
    $livre->bindParam(':auteur', $_POST['auteur']);
    $livre->bindParam(':resume', $_POST['resume']);
    $livre->bindParam(':id', $_POST['id']);
    $livre->execute();

    header('Location:../../index.php');
?>