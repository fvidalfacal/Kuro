<?php
session_start();
if (!isset($_SESSION['connecte']) || $_SESSION['connecte'] = false) {
    header("Location: connexion.php");
}
?>
<html>

    <?php
    include('include/css.inc.html');
    ?>

    <title>Kuro</title>
    <body>
        <div id="wrapper">

            <?php
            include('include/body.inc.php');
            ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bienvenue sur l'application Kuro</h1>
                    </div>
                    <h3>Vous pouvez maintenant hébergé vos images ainsi que vos vidéos à l'aide du menu "Héberger un média" sur la gauche.</h3>
                    <h3>Mais aussi accéder à la liste avec le bouton "Liste des médias".</h3>
                </div>
            </div>

        </div>

        <?php
        include('include/js.inc.html');
        ?>
    </body>
</html>

