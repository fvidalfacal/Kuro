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

    <title>Kuro - Gestion du compte</title>
    <body>
        <div id="wrapper">

            <?php
            include('include/body.inc.php');
            ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Changement de mot de passe</h1>
                    </div>
                </div>
                <form role="form" action="password.php" method="post">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Mot de passe actuel" name="oldPassword" type="password" value="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Votre nouveau mot de passe" name="newPassword1" type="password" value="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Votre nouveau mot de passe" name="newPassword2" type="password" value="">
                        </div>
                        <button class="btn btn-lg btn-success btn-block">Changer votre mot de passe
                    </fieldset>
                </form>
            </div>

        </div>

        <?php
        include('include/js.inc.html');
        ?>
    </body>
</html>

