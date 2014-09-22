<?php
session_start();
if (!isset($_SESSION['connecte']) || $_SESSION['connecte'] = false) {
    header("Location: connexion.php");
}
?>
<html>

    <?php
    include('include/css.inc.html');
    require_once('class/user.class.php');
    ?>

    <title>Kuro</title>
    <body>
        <div id="wrapper">

            <?php
            include('include/body.inc.php');
            ?>

            <div id="page-wrapper">
                <?php
                $oldPassword = md5($_POST['oldPassword']);
                $newPassword1 = md5($_POST['newPassword1']);
                $newPassword2 = md5($_POST['newPassword2']);
                if($newPassword1 == $newPassword2){
                    $modification = User::setPassword($_SESSION['user'], $oldPassword, $newPassword1);
                    echo $modification;
                }
                else
                {
                    $erreur = '<div class="alert alert-danger">Vous n\'avez pas saisi deux fois le même mot de passe <a href="compte.php" class = "alert-link">Recommencer</a></div>';
                }
                ?>
            </div>

        </div>

        <?php
        include('include/js.inc.html');
        ?>
    </body>
</html>

