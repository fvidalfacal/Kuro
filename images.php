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

    <title>Kuro - Liste des images</title>
    <body>
        <div id="wrapper">

            <?php
            include('include/body.inc.php');
            ?>

            <div id="page-wrapper">
                <div class="col-lg-12">
                    <h1 class="page-header">Liste des images</h1>
                </div>
                <?php
                $listeImage = Medias::getAllImages();

                foreach ($listeImage as $image) {
                    $id = $image['idUser'];
                    $uploader = User::getEmailWithId($id);
                    echo'
                        <div class="col-lg-4">
                            <div class="well">
                                <h4>' . $image['nom'] . '</h4>
                                <a href="' . $image['urlImage'] . '"><img src="' . $image['urlImage'] . '" width="400" height="300"></img></a>
                                <p>Ajouté(e) par ' . $uploader . ', le ' . $image['dateAjout'] . '.</p>';
                    if($_SESSION['user'] == $uploader){
                        echo '
                                <form role="form" action="suppression.php" method="post">
                                    <input type="hidden" name="nom" value="'.$image['nom'].'"/>
                                    <input type="hidden" name="urlImage" value="'.$image['urlImage'].'"/>
                                    <input type="hidden" name="urlVideo" value=""/>
                                    <input type="hidden" name="image"/>
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

