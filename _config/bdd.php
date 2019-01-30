<?php 
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "cloud";

    $db = new PDO("mysql:host=".$host.";dbname=".$dbname.";charset=utf8", $user, $password);
?>