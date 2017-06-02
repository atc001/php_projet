<?php
    $db = new PDO('mysql:host=localhost;dbname=librairie', 'root', '0000');
    $user = $db->prepare('SELECT * FROM user WHERE username = :username');
    $user->bindParam(':username', $_POST['username']);
    $user->execute();
    //var_dump($user->fetch());
    if($user->fetch() == False) {
        //Create account
            $new_user = $db->prepare('INSERT INTO user (username, password) VALUES (:username, :password)');
            $new_user->bindParam(':username', $_POST['username']);
            $new_user->bindParam(':password', $_POST['password']);
            $new_user->execute();
            header('Location: ../index.php');
    } else {
        header('Location: ../index.php');
    }
?>