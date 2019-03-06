<?php
    class Index {

        public static function get_index(){
            if(isset($_POST['submit'])){
                Index::login();
            }
        }

        public static function login(){

            global $db;

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
                $_SESSION['user_nuit'] = $results[5];
                
                header("Location: ".PATH."/home");
            }
            else{
                header("Location: ".PATH."/index");
            }
        }
    }
?>