<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Profil - Cloud</title>
        <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <?php 
            if(isset($_GET['mode_nuit']) && !empty($_GET['mode_nuit'])){
                mode_nuit(htmlspecialchars($_GET['mode_nuit']));
                header("Location: ".PATH."/profil");
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
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 menu">
                            <a href="<?= PATH ?>/home">Home</a>
                        </div>

                        <div class="col-md-12 menu mt-2">
                            <a href="<?= PATH ?>/documents">Mes documents</a>
                        </div>

                        <div class="col-md-12 menu mt-2">
                            <a href="<?= PATH ?>/shared_documents">Partagés avec moi</a>
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
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Profil</h4>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div id="photo-profil">
                                <img src="./upload/<?= $_SESSION['user_id'].'_'.$_SESSION['user_firstname'].'_'.$_SESSION['user_lastname'].'/profil/profil.jpg'; ?>" />
                            </div>
                        </div>

                        <div class="col-md-8">
                            <h4><?= $_SESSION['user_firstname'].' '.$_SESSION['user_lastname']; ?></h4>
                            <p class="mt-4">Email : <?= $_SESSION['user_email']; ?></p>
                            <a href="">Changer de mot de passe</a><br>
                            <a href="">Changer de photo de profil</a><br><br>
                            <a href="">Deconnexion</a><br>
                            <a href="">Supprimer le compte</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>