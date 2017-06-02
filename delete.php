<?php
require_once("function/base_function.php");
$livre_list = list_livre();
?>

<form method="post" action="function/delete_livre.php">
    <select name="livre_delete">
    <?php 
        foreach($livre_list as $value) {
            echo "<option value='" . $value['id'] . "'>" . $value['titre'] . "</option>";
        }
    ?>
    <input type="submit" value="Supprimer">
</form>
