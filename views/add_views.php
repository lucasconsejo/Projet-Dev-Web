<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ajouter un document - Cloud</title>
        <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <?php 
            if(isset($_GET['mode_nuit']) && !empty($_GET['mode_nuit'])){
                mode_nuit(htmlspecialchars($_GET['mode_nuit']));
                header("Location: ".PATH."/add");
            }
            elseif($_SESSION['user_nuit'] == 'true'){
                echo "<link rel='stylesheet' type='text/css' href='./assets/css/style_nuit.css' >";
            }
            else{
                echo "<link rel='stylesheet' type='text/css' href='./assets/css/style.css' >";
            }
        ?>
    </head>

    <body>
        <?php
            navbar_home();
            navbar_hide();
        ?>
        <div id="doc-recent" class="container mt-5">
            <div class="row mt-2">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 menu">
                            <a href="<?= PATH ?>/home">Home</a>
                        </div>

                        <div class="col-md-12 menu mt-2">
                            <a href="<?= PATH ?>/documents">Mes documents</a>
                        </div>

                        <div class="col-md-12 menu mt-2">
                            <a href="<?= PATH ?>/shared-documents">Partagés avec moi</a>
                        </div>

                        <div class="col-md-12 mt-4">
                            <a href="<?= PATH ?>/add" id="add-file" class="btn"><img src="./assets/img/home/icon-file-white.png" />Ajouter un document</a>
                        </div>

                        <div class="col-md-12 mt-3">
                            <a href="<?= PATH ?>/add_folder" id="add-file" class="btn"><img src="./assets/img/home/icon-folder-white.png" />Nouveau dossier</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <form id="form" method="post" action="" enctype="multipart/form-data" ondrop="upload_file(event)" ondragover="return false">
                        <div id="box">
                            <?php
                                if($_SESSION['user_nuit'] == "true"){
                                    echo "<img src='./assets/img/home/icon-upload-nuit.png' />";
                                }
                                else{
                                    echo "<img src='./assets/img/home/icon-upload.png' />";
                                }
                            ?>
                            <h5 id="titre-upload">Aucun fichier</h5>
                            <p>Glissez/déposez un fichier ou <input id="upload-file" type="button" value="Choisissez un fichier" onclick="file_explorer()" /></p>
                            <input id="btn-upload-file" type="file" name="upload" />
                            <button id="send-submit" name="submit" type="submit" onclick="send_submit()">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="./assets/js/upload.js" type="text/javascript"></script>
    </body>
</html>