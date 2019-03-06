<?php 

    function signin(){

        require('./_config/bdd.php');
        
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

            $sql = "INSERT INTO users (id, firstname, lastname, email, pwd, night_mode) VALUES (NULL, ?, ?, ?, ?, 'false')";
            $insert_msg = $db->prepare($sql);
            $insert_msg->execute([$firstname, $lastname, $email, $password]);

            echo "Insertion user --> DONE";
        }
        else{
            header('Location: http://localhost/Projet-Dev-Web/index.php');
        }
    }



    function mode_nuit($mode){
        require('./_config/bdd.php');

        if($mode == 'true'){
            echo "<link rel='stylesheet' type='text/css' href='./css/style_nuit.css' >";
            $_SESSION['user_nuit'] = 'true';

            $sql = "UPDATE users SET night_mode = ? WHERE id= ? AND email= ?";
            $update_night_mode = $db->prepare($sql);
            $update_night_mode->execute([$_SESSION['user_nuit'], $_SESSION['user_id'], $_SESSION['user_email']]);
        }
        else{
            echo "<link rel='stylesheet' type='text/css' href='./css/style.css' >";
            $_SESSION['user_nuit'] = 'false';

            $sql = "UPDATE users SET night_mode = ? WHERE id= ? AND email= ?";
            $update_night_mode = $db->prepare($sql);
            $update_night_mode->execute([$_SESSION['user_nuit'], $_SESSION['user_id'], $_SESSION['user_email']]);
        }
    }