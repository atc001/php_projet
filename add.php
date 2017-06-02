<?php 
    require_once("function/base_function.php");
    $auteur = get_all_auteur();
    $genre = get_all_genre();
?>
<link rel="stylesheet" href="css/style.css">
<a href="/">Accueil</a>
<form method="post" action="function/insert.php" id="form_add">
    <label>Titre :</label>
    <input type="text" require="true" name="titre">
    <label>Auteur :</label>
    <select name="auteur" required="true">
        <?php 
            foreach($auteur as $value) {
                echo "<option value='" . $value['id'] . "'>" . $value['auteur'] . "</option>";
            }
        ?>
    </select>
    <label>Genre :</label>
    <select name="genre[]" multiple>
    <?php 
            foreach($genre as $value) {
                echo "<option value='" . $value['id'] . "'>" . $value['genre'] . "</option>";
            }
    ?>
    </select>
    <label>Résumé :</label>
    <input type="text" require="true" name="resume">
    <input type="submit" value="Ajouter">
</form>
