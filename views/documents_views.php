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
                header("Location: ".PATH."/documents");
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

                        <div class="col-md-12 menu-active mt-2">
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
                                    <td onclick="document.location = '<?= $folder; ?>';">
                                        <img src='./assets/img/home/icon-folder.png' width='25px'/>
                                    </td>
                                    <td onclick="document.location = '<?= $folder; ?>';">
                                        <?php 
                                            if(strlen(basename($folder)) >=25){
                                                echo substr(basename($folder), 0, 25)."...";
                                            }
                                            else{
                                                echo basename($folder);
                                            }
                                        ?>
                                    </td>
                                    <td onclick="document.location = '<?= $folder; ?>';"></td>
                                    <td onclick="document.location = '<?= $folder; ?>';"><?= date("d/m/y H:i:s", filemtime($folder)); ?></td>   
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
                                    <td><img id="img-shared" onclick="btnClick('<?=basename($file); ?>')" src="
                                    <?php
                                        if($_SESSION['user_nuit'] == "true"){
                                            echo "./assets/img/home/icon-shared-white.png";
                                        }
                                        else{
                                            echo "./assets/img/home/icon-shared.png";
                                        }
                                    ?>
                                    " /></td>
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

        <div id="share-form">
            <!-- Modal content -->
            <div id="share-form-content">
                <div id="share-form-header">
                    <span class="close">&times;</span>
                    <h2>Partager avec</h2>
                </div>
                <div id="share-form-body">
                    <form id="form-send" autocomplete="off" method="GET" action="./shared_documents">
                        <input id="filename-share" type="hidden" name="share" />
                        <div class="autocomplete">
                            <input id="email-input" onfocus="onFocus()" class="form-control" type="email" name="to" placeholder="Email" required/>
                            <p id="email-input-error">Email incorrect</p>
                        </div>
                        <input id="share-submit" type="submit" class="btn btn-primary" value="Partager" />
                    </form>
                </div>
            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script>
            var share_form = document.getElementById('share-form');
            var close_btn = document.getElementsByClassName("close")[0];
            var input_filename = document.getElementById("filename-share");

            function btnClick($file){
                share_form.style.display = "block";
                input_filename.value = $file;
            }

            close_btn.onclick = function() {
                share_form.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == share_form) {
                    share_form.style.display = "none";
                }
            }
        </script>

        <script>
    function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
            }
        }
    });
    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
        }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
    }

    var users = [];

    <?php 
        foreach ($all_user as $key => $user) {
            if($user["id"] !== $_SESSION['user_id']){
            ?>
                users.push("<?= $user["email"] ?>");
            <?php
            }
        }
    ?>
    autocomplete(document.getElementById("email-input"), users);

    function onChange(){
        document.getElementById("email-input-error").style.display = "none";
        document.getElementById("share-form-content").style.height = "30%";
    }

    function onFocus() {
        document.getElementById("email-input-error").style.display = "none";
        document.getElementById("share-form-content").style.height = "30%";
    };

    document.getElementById("share-submit").addEventListener("click", function(event){
        if(!users.includes(document.getElementById("email-input").value)){
            event.preventDefault();
            document.getElementById("email-input-error").style.display = "block";
            document.getElementById("share-form-content").style.height = "35%";
        }
        else{
            document.getElementById("form-send").submit
        }
    });
    
    </script>

    </body>
</html>