<?php
session_start();
include('include/css.inc.html');
include('class/mysql.class.php');

//Connexion à la base de données
$mysql = new Mysql('kuro', 'localhost', 'root', 'pwsio');

//Récuperation des identifiants
$email = $_POST['email'];
$motDePasseCryptee = md5($_POST['password']);

//Vérification des identifiants
$resultats = $mysql->TabResSQL('SELECT email,password FROM user WHERE email = "' . $email . '" AND password = "' . $motDePasseCryptee . '";');

if (sizeof($resultats) == 0) {
    ?>
    <div class = "alert alert-danger">
        Votre identifiant et/ou mot de passe sont érronés.<a href = "connexion.php" class = "alert-link"><br/>Retour à la page de connexion.</a>
    </div>
    <?php
} else {
    $_SESSION['connecte'] = true;
    $_SESSION['user'] = $_POST['email'];
    header('Location: index.php');
}
?>