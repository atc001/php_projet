<?php 
    $db = new PDO('mysql:host=localhost;dbname=librairie', 'root', '0000');
    $delete_livre = $db->prepare("DELETE FROM `librairie`.`librairie` WHERE `id`=:to_delete;");
    $delete_livre->bindParam(':to_delete', $_POST['livre_delete']);
    $delete_livre->execute();
    header('Location:../../index.php');
?>