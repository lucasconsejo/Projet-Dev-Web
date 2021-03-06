<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Partagés avec moi - Cloud</title>
        <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <?php 
            if(isset($_GET['mode_nuit']) && !empty($_GET['mode_nuit'])){
                mode_nuit(htmlspecialchars($_GET['mode_nuit']));
                header("Location: ".PATH."/shared_documents");
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

                        <div class="col-md-12 menu-active mt-2">
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
                    <table class="table">
                        <thead>
                            <tr>
                                <td></td>
                                <th>Nom</th>
                                <th>Type</th>
                                <th>Modification</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th>Détails</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($documents as $key => $file) {
                                    $extension_path = pathinfo($file['path'].$file['filename']);
                                    $extension = $extension_path["extension"]; 
                            ?>
                            <tr>
                                <td onclick="document.location = '<?= $file; ?>';">
                                    <?php 
                                            if($_SESSION['user_nuit'] == "true"){
                                            if($extension == "jpeg" || $extension == "jpg" || $extension == "gif" || $extension == "png"){
                                                echo "<img src='./assets/img/home/icon-image-white.png' width='25px'/>";
                                            }
                                            else{
                                                echo "<img src='./assets/img/home/icon-file-white.png' width='25px'/>";
                                            }
                                        }
                                        else{
                                            if($extension == "jpeg" || $extension == "jpg" || $extension == "gif" || $extension == "png"){
                                                echo "<img src='./assets/img/home/icon-image.png' width='25px'/>";
                                            }
                                            else{
                                                echo "<img src='./assets/img/home/icon-file.png' width='25px'/>";
                                            }
                                        }
                                    ?>                                
                                </td>

                                <td onclick="document.location = '<?= $file['path'].$file['filename']; ?>';">
                                    <?php 
                                        if(strlen(basename($file['path'].$file['filename'])) >=25){
                                            echo substr(basename($file['path'].$file['filename']), 0, 25)."...";
                                        }
                                        else{
                                            echo basename($file['path'].$file['filename']);
                                        }
                                    ?>
                                </td>
                                <td onclick="document.location = '<?= $file['path'].$file['filename']; ?>';"><?= $extension; ?></td>
                                <td onclick="document.location = '<?= $file['path'].$file['filename']; ?>';"><?= date("d/m/y H:i:s", filemtime($file['path'].$file['filename'])); ?></td>   
                                <td><a href="<?= $file['path'].$file['filename']; ?>" id="btn-download" download>Télécharger</a></td>
                                <td><img id="img-shared" onclick="btnClick('<?=basename($file['path'].$file['filename']); ?>')" src="
                                <?php
                                    if($_SESSION['user_nuit'] == "true"){
                                        echo "./assets/img/home/icon-shared-white.png";
                                    }
                                    else{
                                        echo "./assets/img/home/icon-shared.png";
                                    }
                                ?>
                                " /></td>
                                <td><a href="./home.php?page=documents&delete_file=<?= basename($file['path'].$file['filename']); ?>"><img id="img-delete" src="
                                <?php
                                    if($_SESSION['user_nuit'] == "true"){
                                        echo "./assets/img/home/icon-delete-white.png";
                                    }
                                    else{
                                        echo "./assets/img/home/icon-delete.png";
                                    }
                                ?>
                                " /></a></td>
                                <td><a href=""><img id="img-burger" src="./assets/img/home/icon-burger.png" /></a></td>
                            </tr>

                            <?php
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