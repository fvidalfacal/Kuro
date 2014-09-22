<?php

session_start();
if (!isset($_SESSION['connecte']) || $_SESSION['connecte'] = false) {
    header("Location: connexion.php");
}


require_once('class/medias.class.php');


$suppression = Medias::deleteMedia($_POST['nom'],$_POST['urlVideo'], $_POST['urlImage']);

if(isset($_POST['image'])){
    header("Location: images.php");
}
else{
    header("Location: videos.php");
}

