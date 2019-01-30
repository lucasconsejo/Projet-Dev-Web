<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mes documents - Cloud</title>
        <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <?php 
            if(isset($_GET['mode_nuit']) && !empty($_GET['mode_nuit'])){
                mode_nuit(htmlspecialchars($_GET['mode_nuit']));
                header("Location: ./home.php?page=documents");
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
                            <a href="./home.php">Home</a>
                        </div>

                        <div class="col-md-12 menu-active mt-2">
                            <a href="./home.php?page=documents">Mes documents</a>
                        </div>

                        <div class="col-md-12 menu mt-2">
                            <a href="./home.php?page=shared_documents">Partagés avec moi</a>
                        </div>

                        <div class="col-md-12 mt-4">
                            <a href="./home.php?page=add" id="add-file" class="btn"><img src="./assets/img/home/icon-file-white.png" />Ajouter un document</a>
                        </div>

                        <div class="col-md-12 mt-3">
                            <a href="./home.php?page=add_folder" id="add-file" class="btn"><img src="./assets/img/home/icon-folder-white.png" />Nouveau dossier</a>
                        </div>
                    </div>
                </div>

                <div id="table-size" class="col-md-9">
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
                                foreach($documents as $result){
                                    foreach($folders as $folder){
                                        if(basename($folder) == $result["folder"]){
                                            //zip_folder($folder,  $folder_name);
                            ?>
                                <tr>
                                    <td onclick="document.location = '<?= $file; ?>';">
                                        <img src='./assets/img/home/icon-folder.png' width='25px'/>
                                    </td>
                                    <td onclick="document.location = '<?= $file; ?>';">
                                        <?php 
                                            if(strlen(basename($folder)) >=25){
                                                echo substr(basename($folder), 0, 25)."...";
                                            }
                                            else{
                                                echo basename($folder);
                                            }
                                        ?>
                                    </td>
                                    <td onclick="document.location = '<?= $file; ?>';"></td>
                                    <td onclick="document.location = '<?= $file; ?>';"><?= date("d/m/y H:i:s", filemtime($folder)); ?></td>   
                                    <td><a href="./upload/<?= $folder_name."/".$result["folder"].".zip"; ?>" id="btn-download" download>Télécharger</a></td>
                                    <td><a href=""><img id="img-shared" src="./assets/img/home/icon-shared.png" /></a></td>
                                    <td><a href="./home.php?page=documents&delete_folder=<?= basename($folder); ?>"><img id="img-delete" src="./assets/img/home/icon-delete.png" /></a></td>
                                    <td><a href=""><img id="img-burger" src="./assets/img/home/icon-burger.png" /></a></td>
                                </tr>
                            
                            <?php   }
                                }
                                foreach($files as $file){
                                    if(basename($file) == $result["filename"]){
                                        $extension_path = pathinfo($file);
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
                                    <td onclick="document.location = '<?= $file; ?>';">
                                        <?php 
                                            if(strlen(basename($file)) >=25){
                                                echo substr(basename($file), 0, 25)."...";
                                            }
                                            else{
                                                echo basename($file);
                                            }
                                        ?>
                                    </td>
                                    <td onclick="document.location = '<?= $file; ?>';"><?= $extension; ?></td>
                                    <td onclick="document.location = '<?= $file; ?>';"><?= date("d/m/y H:i:s", filemtime($file)); ?></td>   
                                    <td><a href="<?= $file; ?>" id="btn-download" download>Télécharger</a></td>
                                    <td><a href=""><img id="img-shared" src="
                                    <?php
                                        if($_SESSION['user_nuit'] == "true"){
                                            echo "./assets/img/home/icon-shared-white.png";
                                        }
                                        else{
                                            echo "./assets/img/home/icon-shared.png";
                                        }
                                    ?>
                                    " /></a></td>
                                    <td><a href="./home.php?page=documents&delete_file=<?= basename($file); ?>"><img id="img-delete" src="
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