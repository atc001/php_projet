<?php 
    require_once("base_function.php");
    delete_livre($_POST['livre_delete']);
    header('Location: ../index.php');
?>