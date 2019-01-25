<?php 

    function upload_file(){

        require('./bdd/bdd.php');

        if(isset($_FILES["upload-img"]) && !empty($_FILES["upload-img"])){
            
            if(is_uploaded_file($_FILES["upload-img"]["tmp_name"])){
    
                $img = $_FILES["upload-img"];
                $img_name = $_FILES["upload-img"]["name"];
    
                $folder_name = $_SESSION['user_id'].". ".$_SESSION['user_firstname']." ".$_SESSION['user_lastname'];
    
                $origin_path = $img["tmp_name"];
                $new_path = $_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/".$folder_name."/".$img_name;
    
                if(!file_exists($_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/".$folder_name)){
                    mkdir($_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/".$folder_name, 0777, true);
                }
    
                move_uploaded_file($origin_path, $new_path);
    
                $sql = "INSERT INTO files (id, id_user, filename, folder, path, shared, updated) VALUES (NULL, ?, ?, ?, ?, ?, NOW())";
                $insert_file = $db->prepare($sql);
                $insert_file->execute([$_SESSION["user_id"], $img_name, "none", $new_path, "none"]);

                header("Location: ./home.php");
            }
        }
    }

    function recent_file(){
        require('./bdd/bdd.php');

        $folder_name = $_SESSION['user_id'].". ".$_SESSION['user_firstname']." ".$_SESSION['user_lastname'];
        $folder = "./upload/".$folder_name;
    
        $dir = "./upload/".$folder_name."/*.{jpg,jpeg,gif,png,pdf,txt,docx}";
        $files = glob($dir,GLOB_BRACE);
    
        $sql = "SELECT * FROM files WHERE id_user= ? ORDER BY updated DESC LIMIT 3";
        $select_files = $db->prepare($sql);
        $select_files->execute([$_SESSION["user_id"]]);
        $results = $select_files->fetchAll();
    }
    
?>