<?php 
    if(!isset($_SESSION)){
        session_start();

        if(empty($_SESSION["user_id"])){
            header("Location: http://localhost/Projet-Dev-Web/index.php");
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cloud - Home</title>
        <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/style.css" >
    </head>

    <body>
        <nav id="navbar-home" class="navbar fixed-top navbar-expand-lg navbar-dark">
            <div class="container">
                <a href="">
                    <img src="./img/home/logo/logo-cloud.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="Cloud">
                </a>
                    <a class="navbar-brand" href="">Cloud</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="">Accueil<span class="sr-only">(current)</span></a>
                    </div>
                </div>

                <div id="logout">
                    <a href="./profil.php" class="mr-2">Profil</a>
                    <a href="./php/signin/logout.php">Deconnexion</a>
                </div>
           </div>
        </nav>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>