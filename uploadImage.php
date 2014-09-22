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

    <title>Kuro - Héberger une image</title>
    <body>
        <div id="wrapper">

            <?php
            include('include/body.inc.php');
            ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Héberger une image</h1>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form role="form" action="upload.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nom de l'image" name="nomImage" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="image">
                                </div>
                                <button class="btn btn-default">Envoyer
                            </fieldset>
                            <input type="hidden" name="verifImage">
                        </form>
                        <div class="alert alert-warning">
                            Taille maximum autorisée : 2Mo.
                        </div>
                        <div class="alert alert-warning">
                            Seul les fichiers de format '.png', '.gif', '.jpg', '.bmp' et '.jpeg' sont autorisées.
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php
        include('include/js.inc.html');
        ?>
    </body>
</html>
