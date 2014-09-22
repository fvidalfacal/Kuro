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

    <title>Kuro</title>
    <body>
        <div id="wrapper">

            <?php
            include('include/body.inc.php');
            ?>

            <div id="page-wrapper">
                <?php
                $idUser = User::getIdWithEmail($_SESSION['user']);
                if (isset($_POST['verifImage']) && !isset($_POST['verifVideo'])) {
                    $nomImage = $_POST['nomImage'];
                    //Importation de l'image sur le serveur
                    $dossier = 'images/upload/';
                    setlocale(LC_TIME, 'fra_fra');
                    $date = strftime('%Y-%m-%d %H:%M:%S');
                    $fichier = $date . basename($_FILES['image']['name']);
                    $taille_maxi = 5000000;
                    $taille = $_FILES['image']['size'];
                    $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.bmp');
                    $extension = strrchr($_FILES['image']['name'], '.');

                    //Début des vérifications de sécurité
                    if (!in_array($extension, $extensions)) { //Si l'extension n'est pas dans le tableau
                        $erreur = '<div class="alert alert-danger">Vous devez héberger un fichier de type png, gif, jpg, bmp ou jpeg. <a href="uploadImage.php" class = "alert-link">Recommencer</a></div>';
                    }
                    if ($taille > $taille_maxi || $taille == 0) {
                        $erreur = '<div class="alert alert-danger">Le fichier est trop gros. <a href="uploadImage.php" class = "alert-link">Recommencer</a></div>';
                    }

                    if (!isset($erreur)) { //S'il n'y a pas d'erreur, on upload
                        //On formate le nom du fichier ici
                        $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) { //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                            echo '<div class="alert alert-success">Hébergement effectué avec succès ! <a href="uploadImage.php" class = "alert-link">Héberger une autre image.</a></div>';
                            //Ajout de l'image dans la base de données
                            $urlImage = $dossier . $fichier;
                            $ajout = Medias::addImage($nomImage, $urlImage, $idUser);
                        } else { //Sinon (la fonction renvoie FALSE).
                            echo '<div class="alert alert-danger">Echec de l\'hébergement ! <a href="uploadImage.php" class = "alert-link">Héberger une autre image.</a></div>';
                        }
                    } else {
                        echo $erreur;
                    }
                } else {
                    // On vérifie si http:// est bien inclus dans le lien de la vidéo.
                    $lien = $_POST['lienVideo'];
                    $verificationHttp = strcspn('http://', $lien);
                    //Sinon on l'ajoute
                    if ((stristr($lien, 'http://') === FALSE) && (stristr($lien, 'https://') === FALSE)) {
                        $lien = 'http://' . $lien;
                    }
                    //Ajout de la vidéo dans la base de données
                    $ajout = Medias::addVideo($_POST['nomVideo'], $lien, $idUser);
                    echo '<div class="alert alert-success">Hébergement effectué avec succès ! <a href="uploadVideo.php" class = "alert-link">Héberger une autre vidéo.</a></div>';
                }
                ?>
            </div>

        </div>

        <?php
        include('include/js.inc.html');
        ?>
    </body>
</html>

