<?php
    class Home{

        public static function home_delete_file(){
            if(isset($_GET["delete_file"])){
                Home::delete_file($_GET["delete_file"]);
                header("Location: ".PATH."/home");
            }
        }

        public static function get_documents(){

            global $db;
            
            $sql = "SELECT * FROM files WHERE id_user= ? AND filename!= 'none' ORDER BY updated DESC LIMIT 3";
            $select_files = $db->prepare($sql);
            $select_files->execute([$_SESSION["user_id"]]);
            $results = $select_files->fetchAll();

            return $results;
        }

        public static function get_file(){
            $folder_name = $_SESSION['user_id']."_".$_SESSION['user_firstname']."_".$_SESSION['user_lastname'];
            $folder = "./upload/".$folder_name;

            $dir = "./upload/".$folder_name."/*.{jpg,jpeg,gif,png,pdf,txt,docx}";
            $files = glob($dir,GLOB_BRACE);

            return $files;
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
    }
?>