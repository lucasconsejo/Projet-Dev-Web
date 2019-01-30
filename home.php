<?php

include_once './_config/config.php';

// Définition de la page courante
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = trim(strtolower($_GET['page']));
} else {
    $page = 'home';
}

$allPages = scandir('controllers/');

// Vérification de l'existence de la page
if (in_array($page.'_controller.php', $allPages)) {
    include_once './_functions/sessions.php';
    include_once './_functions/navbar.php';
    include_once './_functions/members.php';
    include_once './_config/bdd.php';

    // Inclusion de la page
    include_once './models/'.$page.'_model.php';
    include_once './controllers/'.$page.'_controller.php';
    include_once './views/'.$page.'_views.php';

} else {
    // Inclusion de la page erreur
    header("Location: ./home.php");
}