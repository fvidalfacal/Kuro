<?php
session_start();
if (!isset($_SESSION['connecte']) || $_SESSION['connecte'] = false) {
    header("Location: connexion.php");
}
?>
<html>

    <?php
    include('include/css.inc.html');
    require_once('class/medias.class.php');
    require_once('class/user.class.php');
    ?>

    <title>Kuro - Liste des vidéos</title>
    <body>
        <div id="wrapper">

            <?php
            include('include/body.inc.php');
            ?>

            <div id="page-wrapper">
                <div class="col-lg-12">
                    <h1 class="page-header">Liste des vidéos</h1>
                </div>
                <?php
                $listeVideo = Medias::getAllVideos();

                foreach ($listeVideo as $video) {
                    $id = $video['idUser'];
                    $uploader = User::getEmailWithId($id);
                    echo'
                        <div class="col-lg-4">
                            <div class="well">
                                <h4>' . $video['nom'] . '</h4>
                                <a href="' . $video['urlVideo'] . '"><img src="images/video_icon.png" width="400" height="300"></img></a>
                                <p>Ajouté(e) par ' . $uploader . ', le ' . $video['dateAjout'] . '.</p>';
                    if($_SESSION['user'] == $uploader){
                        echo '
                                <form role="form" action="suppression.php" method="post">
                                    <input type="hidden" name="nom" value="'.$video['nom'].'"/>
                                    <input type="hidden" name="urlImage" value=""/>
                                    <input type="hidden" name="urlVideo" value="'.$video['urlVideo'].'"/>
                                    <input type="hidden" name="video"/>
                                    <button class="btn btn-default">Supprimer
                                </form>';
                    }
                    echo '           
                            </div>
                        </div>';
                }
                ?>
            </div>

        </div>

        <?php
        include('include/js.inc.html');
        ?>
    </body>
</html>

