<?php 
    $db = new PDO('mysql:host=localhost;dbname=librairie', 'root', '0000');
    $user = $db->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
    $user->bindParam(':username', $_POST['username']);
    $user->bindParam(':password', $_POST['password']);
    $user->execute();

    if($user->fetch() == False) {
        header('Location: ../index.php');
    } else {
        session_start();
        $_SESSION['is_connected'] = True;
        header('Location: ../index.php');
    }
?>