<?php

    class Documents{

        public static function delete_documents(){

            if(isset($_GET["delete_file"])){
                Documents::delete_file($_GET["delete_file"]);
                header("Location: ./home.php?page=documents");
            }
        
            if(isset($_GET["delete_folder"])){
                Documents::delete_folder($_GET["delete_folder"]);
                header("Location: ./home.php?page=documents");
            }
        }

        public static function get_documents(){

            global $db;

            $sql = "SELECT * FROM files WHERE id_user= ? ORDER BY updated DESC";
            $select_files = $db->prepare($sql);
            $select_files->execute([$_SESSION["user_id"]]);
            $results = $select_files->fetchAll();
            return $results;
        }

        public static function get_file(){

            global $db;

            $folder_name = $_SESSION['user_id']."_".$_SESSION['user_firstname']."_".$_SESSION['user_lastname'];
            $folder = "./upload/".$folder_name;
        
            $dir_only_file = "./upload/".$folder_name."/*.{jpg,jpeg,gif,png,pdf,txt,docx}";
            $files = glob($dir_only_file,GLOB_BRACE);

            return $files;
        }

        public static function get_folder(){

            global $db;

            $folder_name = $_SESSION['user_id']."_".$_SESSION['user_firstname']."_".$_SESSION['user_lastname'];
            $folder = "./upload/".$folder_name;
            
            $dir_only_folder = "./upload/".$folder_name."/*";
            $folders = glob($dir_only_folder,GLOB_ONLYDIR);

            return $folders;
        }

        public static function delete_file($filename){
            
            global $db;
            
            $folder_name = $_SESSION['user_id']."_".$_SESSION['user_firstname']."_".$_SESSION['user_lastname'];

            $folder_path = $_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/".$folder_name."/".$filename;
            unlink($folder_path);

            $sql = "DELETE FROM files WHERE filename=?";
            $insert_file = $db->prepare($sql);
            $insert_file->execute([$filename]);
        }

        public static function delete_folder($folder){

            global $db;

            $folder_name = $_SESSION['user_id']."_".$_SESSION['user_firstname']."_".$_SESSION['user_lastname'];

            $folder_path = $_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/".$folder_name."/".$folder;
            rmdir($folder_path);

            $sql = "DELETE FROM files WHERE folder=?";
            $insert_file = $db->prepare($sql);
            $insert_file->execute([$folder]);

            header("Location: ./home.php?page=documents");
        }
    }
?>