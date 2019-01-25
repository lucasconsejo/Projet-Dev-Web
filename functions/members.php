<?php 

    function login(){

        require('./bdd/bdd.php');

        if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['mdp']) && !empty($_POST['mdp'])){
            
            $email = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars($_POST['mdp']);
            $password = md5($mdp);

            $sql = "SELECT * FROM users WHERE email= ? AND pwd= ?";
            $select_user = $db->prepare($sql);
            $select_user->execute([$email, $password]);
            $results = $select_user->fetch();

            session_start();

            $_SESSION['user_id'] = $results[0];
            $_SESSION['user_firstname'] = $results[1];
            $_SESSION['user_lastname'] = $results[2];
            $_SESSION['user_email'] = $results[3];
            $_SESSION['user_password'] = $results[4];
            
            header("Location: ./home.php");
        }
        else{
            header('Location:http://localhost/Projet-Dev-Web/index.php');
        }
    }

    function signin(){

        require('./bdd/bdd.php');
        
        if (isset($_POST['firstname']) && !empty($_POST['firstname'])
            && isset($_POST['lastname']) && !empty($_POST['lastname'])
            && isset($_POST['email']) && !empty($_POST['email'])
            && isset($_POST['mdp']) && !empty($_POST['mdp'])
        )
        {
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars($_POST['mdp']);
            $password = md5($mdp);

            $sql = "INSERT INTO users (id, firstname, lastname, email, pwd) VALUES (NULL, ?, ?, ?, ?)";
            $insert_msg = $db->prepare($sql);
            $insert_msg->execute([$firstname, $lastname, $email, $password]);

            echo "Insertion user --> DONE";
        }
        else{
            header('Location:http://localhost/Projet-Dev-Web/index.php');
        }
    }