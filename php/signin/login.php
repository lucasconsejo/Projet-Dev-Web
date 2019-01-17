<?php
    session_start();
    require('../../bdd/bdd.php');

    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['mdp']) && !empty($_POST['mdp'])){
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $password = md5($mdp);

        $sql = "SELECT * FROM users WHERE email= ? AND pwd= ?";
        $select_user = $db->prepare($sql);
        $select_user->execute([$email, $password]);
        $results = $select_user->fetch();
        
        $_SESSION['user_id'] = $results[0];
        $_SESSION['user_firstname'] = $results[1];
        $_SESSION['user_lastname'] = $results[2];
        $_SESSION['user_email'] = $results[3];
        $_SESSION['user_password'] = $results[4];
         
        header("Location: ../../home.php");
    }
    else{
        header('Location:http://localhost/Projet-Dev-Web/index.php');
    }
?>