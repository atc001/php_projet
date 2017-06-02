<?php 
    require_once('base_function.php');
    insert_one_livre($_POST);
    header('Location:../index.php');
?>