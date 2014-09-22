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

    <title>Kuro - Héberger une vidéo</title>
    <body>
        <div id="wrapper">

            <?php
            include('include/body.inc.php');
            ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Héberger une vidéo</h1>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form role="form" action="upload.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nom de la vidéo" name="nomVideo" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Copier le lien de la vidéo" name="lienVideo" type="text" autofocus>
                                </div>
                                <button class="btn btn-default">Envoyer
                            </fieldset>
                            <input type="hidden" name="verifVideo">
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <?php
        include('include/js.inc.html');
        ?>
    </body>
</html>
