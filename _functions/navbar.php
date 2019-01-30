<?php

    function nuit(){
        if($_SESSION['user_nuit'] == 'true'){
            echo "false";                       
        }
        else{
            echo "true";
        }
    }

    function navbar_hide(){
?>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a href="">
                    <img src="./assets/img/accueil/logo/logo-cloud.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="Cloud">
                </a>

                <a class="navbar-brand" href="">Cloud</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    </div>
                </div>

                <div id="logout">
                    <a href="./profil.php" class="mr-2">Profil</a>
                    <a href="./_functions/logout.php">Deconnexion</a>
                </div>
            </div>
        </nav>

<?php
    }

    function navbar_home(){
?>
        <nav id="navbar-home" class="navbar fixed-top navbar-expand-lg navbar-dark">
            <div class="container">
                <a href="./home.php">
                    <img src="./assets/img/accueil/logo/logo-cloud.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="Cloud">
                </a>
                    <a class="navbar-brand" href="./home.php">Cloud</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    </div>
                </div>

                <div id="logout">
                    <a href="?mode_nuit=<?php nuit(); ?>" class="mr-2"><img src="./assets/img/home/icon-moon.png" /></a>
                    <a href="./home.php?page=notifications" class="mr-2"><img src="./assets/img/home/icon-notif.png" /></a>
                    <a href="./home.php?page=profil" class="mr-2"><img src="./assets/img/home/icon-profil.png" /></a>
                    <a href="./_functions/logout.php">Deconnexion</a>
                </div>
           </div>
        </nav>
<?php
    }
?>