<?php

require_once("template/head.php");

$db = new PDO('mysql:host=localhost;dbname=librairie', 'root', '0000');
$livres = $db->prepare('SELECT titre, resume, auteur  FROM librairie, auteur WHERE librairie.id_auteur = auteur.id;');
$livres->execute();
$livre_list = $db->prepare('SELECT id, titre FROM librairie.librairie');
$livre_list->execute();
$livre_list_update = $db->prepare('SELECT id, titre FROM librairie.librairie');
$livre_list_update->execute();
$auteur_list = $db->prepare('SELECT * FROM librairie.auteur');
$auteur_list->execute();

?>
<table>
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Résumé</th>
    </tr>
    <?php
        foreach($livres->fetchAll() as $key => $value) { 
        echo "<tr>";      
        echo "<td class='tableau'>" . $value['titre'] . "</td>";
        echo "<td class='tableau'>" . $value['auteur'] . "</td>";
        echo "<td class='tableau'>" . $value['resume'] . "</td>";
        echo"</tr>";
    }
    ?>
</table>

<form method="post" action="scripts/db/add.php">
    <label>Titre :</label>
    <input type="text" require="true" name="titre">
    <label>Auteur :</label>
    <select name="auteur" required="true">
        <?php 
            foreach($auteur_list->fetchAll() as $value) {
                echo "<option value='" . $value['id'] . "'>" . $value['auteur'] . "</option>";
            }
        ?>
    </select>
        
    <label>Résumé :</label>
    <input type="text" require="true" name="resume">
    <input type="submit" value="Ajouter">
</form>

<form method="post" action="template/form_update.php" id="form">
    <select name="livre_update">
    <?php 
        foreach($livre_list_update->fetchAll() as $value) {
            echo "<option value='" . $value['id'] . "'>" . $value['titre'] . "</option>";
        }
    ?>
    <input type="submit" value="Modifier">
</form>

<form method="post" action="scripts/db/delete.php" id="form">
    <select name="livre_delete">
    <?php 
        foreach($livre_list->fetchAll() as $value) {
            echo "<option value='" . $value['id'] . "'>" . $value['titre'] . "</option>";
        }
    ?>
    <input type="submit" value="Supprimer">
</form>
<?php 
    require_once("template/foot.php");
?>