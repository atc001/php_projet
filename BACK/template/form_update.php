<?php 

    require_once("head.php");

    $db = new PDO('mysql:host=localhost;dbname=librairie', 'root', '0000');
    $livre = $db->prepare('SELECT * FROM `librairie`.`librairie` WHERE id = :to_update;');
    $livre->bindParam(':to_update', $_POST['livre_update']);
    $livre->execute();
    $livre_update = $livre->fetch();
    $auteur_list = $db->prepare('SELECT * FROM librairie.auteur');
    $auteur_list->execute();
?>

<form method="post" action="../scripts/db/update.php">
    <input type="hidden" name="id" value="<?php echo $livre_update['id']?>">
    <label>Titre :</label>
    <input type="text" require="true" name="titre" value="<?php echo $livre_update['titre']?>">
    <label>Auteur :</label>
    <select name="auteur" required="true">
        <?php 
          foreach($auteur_list->fetchAll() as $value) {
                if ($livre_update['id_auteur'] == $value['id']) {
                    echo "<option selected='selected' value='" . $value['id'] . "'>" . $value['auteur'] . "</option>";
                } else {
                    echo "<option value='" . $value['id'] . "'>" . $value['auteur'] . "</option>";
                }
            }
        ?>
    </select>
    
    <label>Résumé :</label>
    <input type="text" name="resume" value="<?php echo $livre_update['resume']?>">
    <input type="submit" value="Modifier">

</form>

<?php 
    require_once("foot.php");
?>