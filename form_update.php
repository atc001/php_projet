<?php 
require_once('function/base_function.php');
$auteur_list = get_all_auteur();
$genre = get_all_genre();
$livre_update = get_all_item();
?>


<form method="post" action="function/update">
    <input type="hidden" name="id" value="<?php echo $livre_update[0]['id']?>">
    <label>Titre :</label>
    <input type="text" required="true" name="titre" value="<?php echo $livre_update[0]['titre']?>">
    <label>Auteur :</label>
    <select name="auteur" required="true">
        <?php 
          foreach($auteur_list as $value) {
                if ($livre_update['id_auteur'] == $value['id']) {
                    echo "<option selected='selected' value='" . $value['id'] . "'>" . $value['auteur'] . "</option>";
                } else {
                    echo "<option value='" . $value['id'] . "'>" . $value['auteur'] . "</option>";
                }
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
    <input type="text" name="resume" value="<?php echo $livre_update['resume']?>">
    <input type="submit" value="Modifier">

</form>
