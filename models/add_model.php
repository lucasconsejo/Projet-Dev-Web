<?php
    class Add{

        public static function add_file(){
            if(isset($_POST['submit']) && isset($_FILES['upload']) && !empty($_FILES['upload'])){
                Add::upload_file();
            }
            if(isset($_FILES['upload']) && !empty($_FILES['upload'])){
                Add::upload_file();
                header("Location: ./home.php?page=documents");
            }
        }

        public static function upload_file(){

            global $db;

            if(isset($_FILES["upload"]) && !empty($_FILES["upload"])){
            
                if(is_uploaded_file($_FILES["upload"]["tmp_name"])){
        
                    $img = $_FILES["upload"];
                    $img_name = $_FILES["upload"]["name"];
        
                    $folder_name = $_SESSION['user_id']."_".$_SESSION['user_firstname']."_".$_SESSION['user_lastname'];
        
                    $origin_path = $img["tmp_name"];
                    $new_path = $_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/".$folder_name."/".$img_name;
    
                    if(!file_exists($_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload")){
                        mkdir($_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload", 0777, true);
                    }
        
                    if(!file_exists($_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/".$folder_name)){
                        mkdir($_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/".$folder_name, 0777, true);
                    }
        
                    move_uploaded_file($origin_path, $new_path);
        
                    $sql = "INSERT INTO files (id, id_user, filename, folder, path, shared, updated) VALUES (NULL, ?, ?, ?, ?, ?, NOW())";
                    $insert_file = $db->prepare($sql);
                    $insert_file->execute([$_SESSION["user_id"], $img_name, "none", $new_path, "none"]);
    
                    header("Location: ./home.php?page=documents");
                }
            }
        }
    }

?>