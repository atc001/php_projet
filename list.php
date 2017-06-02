<?php 
    require_once("function/base_function.php");
    $livres = get_all_item();
?>
<link rel="stylesheet" href="css/style.css">

<a href="/">Accueil</a>
<h1>Liste</h1>
<table id="list-table">
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Résumé</th>
        <th>Genre</th>
    </tr>
<?php
    foreach($livres as $key => $value) { 
        echo "<tr>";
        echo "<td>" . $value['titre'] . "</td>";
        echo "<td>" . $value['auteur'] . "</td>";
        echo "<td>" . $value['resume'] . "</td>";
        echo "<td>" . $value['genre'] . "</td>";
        echo"</tr>";
    }
 ?>
 </table>