<?php
    class AddFolder{

        public static function add_folder(){

            if(isset($_POST['submit'])){
                ADDFolder::upload_folder();
            }
        }

        public static function upload_folder(){
            
            global $db;

            if(isset($_POST["upload-folder"]) && !empty($_POST["upload-folder"])){
                
                $folder_path = $_SESSION['user_id']."_".$_SESSION['user_firstname']."_".$_SESSION['user_lastname'];
                $folder_name = htmlspecialchars($_POST["upload-folder"]);
                $new_path = $_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/".$folder_path."/".$folder_name;
    
                if(!file_exists($new_path)){
                    mkdir($new_path, 0777, true);
                }
    
                $sql = "INSERT INTO files (id, id_user, filename, folder, path, shared, updated) VALUES (NULL, ?, ?, ?, ?, ?, NOW())";
                $insert_file = $db->prepare($sql);
                $insert_file->execute([$_SESSION["user_id"], "none", $folder_name, $new_path, "none"]);
    
                header("Location: ".PATH."/documents");
            }
        }
    }
?>