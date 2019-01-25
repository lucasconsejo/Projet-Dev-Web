<?php 
    require('./functions/sessions.php');
    require('./functions/upload.php');
    require('./bdd/bdd.php');

    $folder_name = $_SESSION['user_id'].". ".$_SESSION['user_firstname']." ".$_SESSION['user_lastname'];
    $folder = "./upload/".$folder_name;

    $dir = "./upload/".$folder_name."/*.{jpg,jpeg,gif,png,pdf,txt,docx}";
    $files = glob($dir,GLOB_BRACE);

    $sql = "SELECT * FROM files WHERE id_user= ? ORDER BY updated DESC";
    $select_files = $db->prepare($sql);
    $select_files->execute([$_SESSION["user_id"]]);
    $results = $select_files->fetchAll();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mes documents - Cloud</title>
        <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/style.css" >
    </head>

    <body>
        <nav id="navbar-home" class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a href="./home.php">
                    <img src="./img/accueil/logo/logo-cloud.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="Cloud">
                </a>
                    <a class="navbar-brand" href="./home.php">Cloud</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="./documents.php">Mes documents</a>
                        <a class="nav-item nav-link active" href="./shared-documents.php">Partagés avec moi</a>
                    </div>
                </div>

                <div id="logout">
                    <a href="./profil.php" class="mr-2">Profil</a>
                    <a href="./functions/logout.php">Deconnexion</a>
                </div>
           </div>
        </nav>

        <div id="doc-recent" class="container mt-4">
            <div class="row">
                <div class="col-md-8 title">
                    <h4>Mes documents</h4>
                </div>

                <div id="btn-ajouter"class="col-md-4">
                    <button class="btn float-right">Créer un dossier</button>
                    <button class="btn float-right mr-2">Ajouter un document</button>
                </div>
            </div>

            <div class="row mt-2">
                <div id="table-size" class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <td></td>
                                <td>Nom</td>
                                <td>Type</td>
                                <td>Modification</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Détails</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($results as $result){
                                    foreach($files as $file){
                                        if(basename($file) == $result["filename"]){
                                            $extension_path = pathinfo($file);
                                            $extension = $extension_path["extension"]; 
                            ?>
                                <tr>
                                    <td>
                                        <?php 
                                            if($extension == "jpeg" || $extension == "jpg" || $extension == "gif" || $extension == "png"){
                                                echo "<img src='./img/home/icon-image.png' width='25px'/>";
                                            }
                                            else{
                                                echo "<img src='./img/home/icon-file.png' width='25px'/>";
                                            }

                                        ?>                                
                                    </td>
                                    <td>
                                        <?php 
                                            if(strlen(basename($file)) >=25){
                                                echo substr(basename($file), 0, 25)."...";
                                            }
                                            else{
                                                echo basename($file);
                                            }
                                        ?>
                                    </td>
                                    <td><?= $extension; ?></td>
                                    <td><?= date("d/m/y H:i:s", filemtime($file)); ?></td>   
                                    <td><a href="<?= $file; ?>" download>Télécharger</a></td>
                                    <td><a href="">Partager</a></td>
                                    <td><a href="">Supprimer</a></td>
                                    <td><a href="">Détails</a></td>
                                </tr>
                            <?php  }
                                }
                            } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>