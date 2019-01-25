<?php 
    require('./functions/members.php');

    if(isset($_POST['submit'])){
        login();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Cloud</title>
        <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/style.css" >
    </head>

    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
            <div class="container">
                <a href="">
                    <img src="./img/accueil/logo/logo-cloud.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="Cloud">
                </a>
                <a class="navbar-brand" href="">Cloud</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="">Accueil<span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="./propos.php">A propos</a>
                    </div>
                </div>

                <div id="signin">
                    <a href="./index.html" class="mr-2">Connexion</a>
                    <a href="./php/signin/signin.php">Inscription</a>
                </div>
           </div>
        </nav>

        <div id="fond-home">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-md-7  vertival-center">
                        <h1>Tous vos documents sauvegardés sur un nuage.</h1>
                    </div>

                    <div id="connexion" class="col-md-5 pt-5 pb-5  vertival-center">
                        <h3>Connexion</h3>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="input-email">Email</label>
                                <input type="email" class="form-control" id="input-email" name="email" aria-describedby="emailHelp" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="input-password">Mot de passe</label>
                                <input type="password" class="form-control" id="input-password" name="mdp" placeholder="Mot de passe">
                            </div>
                            <div id="submit">
                                <button id="connexion-button" name="submit" type="submit" class="btn btn-dark mt-2">Connexion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-4 icons">
                    <img src="./img/accueil/icons/icon-storage.png" alt="icon capacity storage" />
                    <h5>2 To de stockage</h5>
                </div>

                <div class="col-md-4 icons">
                    <img src="./img/accueil/icons/icon-cloud.png" alt="icon capacity storage" />
                    <h5>Vos documents accessibles depuis n'importe où</h5>
                </div>

                <div class="col-md-4 icons">
                    <img src="./img/accueil/icons/icon-share.png" alt="icon capacity storage" />
                    <h5>Partagez vos documents pour collaborer avec d'autres</h5>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="./js/home.js"></script>
    </body>
</html>