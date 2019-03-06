<?php
    class SharedDocuments{

        public static function shared_documents(){
            if(isset($_GET["share"]) && isset($_GET["to"])){
                SharedDocuments::set_share_documents($_GET["share"], $_GET["to"]);
                header("Location: ".PATH."/shared_documents");
            }
        }

        public static function get_documents(){

            global $db;

            $sql = "SELECT * FROM shared WHERE id_expediteur = ? OR id_destinataire = ? ORDER BY updated DESC";
            $select_files = $db->prepare($sql);
            $select_files->execute([$_SESSION["user_id"], $_SESSION["user_id"]]);
            $results = $select_files->fetchAll();

            return $results;
        }



        public static function set_share_documents($filename, $email_destinataire){
            
            global $db;

            $destinataire = SharedDocuments::get_destinataire($email_destinataire);

            $name_destinataire = $destinataire['id']."_".$destinataire['firstname']."_".$destinataire['lastname'];

            $folder_expediteur = $_SESSION['user_id']."_".$_SESSION['user_firstname']."_".$_SESSION['user_lastname'];
            $file_path = "./upload/".$folder_expediteur."/".$filename;

            $name_share_folder_1 = $folder_expediteur."_&_".$name_destinataire;
            $name_share_folder_2 = $name_destinataire."_&_".$folder_expediteur;

            if(!file_exists($_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/shared")){
                mkdir($_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/shared", 0777, true);
            }

            if(file_exists($_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/shared/".$name_share_folder_1)){
                $new_path = "./upload/shared/".$name_share_folder_1."/".$filename;
                $path = "./upload/shared/".$name_share_folder_1."/";
            }

            else if(file_exists($_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/shared/".$name_share_folder_2)){
                $new_path = "./upload/shared/".$name_share_folder_2."/".$filename;
                $path = "./upload/shared/".$name_share_folder_2."/";
            }

            else if(!file_exists($_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/shared/".$name_share_folder_1) && 
                    !file_exists($_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/shared/".$name_share_folder_2)
            ){
                mkdir($_SERVER['DOCUMENT_ROOT']."/Projet-Dev-Web/upload/shared/".$name_share_folder_1, 0777, true);
                $new_path = "./upload/shared/".$name_share_folder_1."/".$filename;
                $path = "./upload/shared/".$name_share_folder_1."/";
            }

            copy($file_path, $new_path);

            $sql = "INSERT INTO shared (id_expediteur, id_destinataire, filename, path, updated) VALUES (?, ?, ?, ?, NOW())";
            $insert_file = $db->prepare($sql);
            $insert_file->execute([$_SESSION["user_id"], $destinataire['id'], $filename, $path]);
        }

        public static function get_destinataire($email){
            global $db;

            $sql = "SELECT id, firstname, lastname FROM users WHERE email=?";
            $select_user = $db->prepare($sql);
            $select_user->execute([$email]);
            $results = $select_user->fetch();

            return $results;
        }
    }
?>