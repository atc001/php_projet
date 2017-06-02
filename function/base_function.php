<?php 
    function get_all_item() {
        $db = new PDO('mysql:host=localhost;dbname=librairie', 'root', '0000');
        $livre = $db->prepare('SELECT librairie.id, titre, auteur.auteur, resume, genre.genre FROM librairie, genre, librairie_genre, auteur WHERE librairie.id = librairie_genre.id_librairie AND genre.id = librairie_genre.id_genre AND librairie.id_auteur = auteur.id');
        $livre->execute();
        return $livre->fetchAll();
    }
    function get_all_auteur() {
        $db = new PDO('mysql:host=localhost;dbname=librairie', 'root', '0000');
        $livre = $db->prepare('SELECT * FROM auteur');
        $livre->execute();
        return $livre->fetchAll();
    }
    function get_all_genre() {
        $db = new PDO('mysql:host=localhost;dbname=librairie', 'root', '0000');
        $livre = $db->prepare('SELECT * FROM genre');
        $livre->execute();
        return $livre->fetchAll();
    }
    function insert_one_livre($livre_data) {
        
        $db = new PDO('mysql:host=localhost;dbname=librairie', 'root', '0000');
        $new_livre = $db->prepare('INSERT INTO librairie (titre, id_auteur, resume) VALUES (:titre, :auteur, :resume)');
        $new_livre->bindParam(':titre', $livre_data['titre']);
        $new_livre->bindParam(':auteur', $livre_data['auteur']);
        $new_livre->bindParam(':resume', $livre_data['resume']);
        $new_livre->execute();
        
        
        $last_id = $db->lastInsertId();
        foreach($livre_data['genre'] as $value) {
            $livre_genre = $db->prepare('INSERT INTO librairie_genre (id_librairie, id_genre) VALUES (:id_librairie, :id_genre)');
            $livre_genre->bindParam('id_librairie', $last_id);
            $livre_genre->bindParam('id_genre', $value);
            $livre_genre->execute();
        }
        
    }
    function list_livre() {
        $db = new PDO('mysql:host=localhost;dbname=librairie', 'root', '0000');
        $livre_list = $db->prepare('SELECT id, titre FROM librairie.librairie');
        $livre_list->execute();
        return $livre_list->fetchAll();
    }
    function delete_livre() {
        $db = new PDO('mysql:host=localhost;dbname=librairie', 'root', '0000');
        $delete_livre = $db->prepare("DELETE FROM `librairie`.`librairie` WHERE `id`=:to_delete;");
        $delete_livre->bindParam(':to_delete', $_POST['livre_delete']);
        $delete_livre->execute();
    }
    function update_livre() {
    $db = new PDO('mysql:host=localhost;dbname=librairie', 'root', '0000');
    $livre = $db->prepare('SELECT * FROM `librairie`.`librairie` WHERE id = :to_update;');
    $livre->bindParam(':to_update', $_POST['livre_update']);
    $livre->execute();
    $livre_update = $livre->fetch();
    $auteur_list = $db->prepare('SELECT * FROM librairie.auteur');
    $auteur_list->execute();
    }
    
?>