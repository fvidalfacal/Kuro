<?php
require_once('mysql.class.php');

class User {

    private $id;
    private $email;
    private $password;

    /**
     * 
     * @param int $id
     * @param string $email
     * @param string $password
     */
    private function __construct($id, $email, $password) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * 
     * @param string $email
     * @return int, id de l'utilisateur
     */
    public static function getIdWithEmail($email) {
        $mysql = new Mysql('kuro', 'localhost', 'root', 'pwsio');
        $resultat = $mysql->TabResSQL('SELECT id FROM user WHERE email = "' . $email . '"');
        $resultat = intval($resultat[0]['id']);
        return $resultat;
    }
    
    public static function getEmailWithId($id) {
        $mysql = new Mysql('kuro', 'localhost', 'root', 'pwsio');
        $requete = 'SELECT user.email FROM user,medias WHERE medias.idUser = user.id AND medias.idUser = ' . $id;
        $resultat = $mysql->TabResSQL($requete);
        $resultat = $resultat[0]['email'];
        return $resultat;
    }
    
    /**
     * 
     * @param string $email
     * @param string $oldPassword
     * @param string $newPassword
     * @return string, message de confirmation
     */
    public static function setPassword($email, $oldPassword, $newPassword) {
        $mysql = new Mysql('kuro', 'localhost', 'root', 'pwsio');

        //Vérification du bon mot de passe original
        $resultats = $mysql->TabResSQL('SELECT email,password FROM user WHERE email = "' . $email . '" AND password = "' . $oldPassword . '";');
        if (sizeof($resultats) == 0) {
            
            return '<div class = "alert alert-danger">
                Votre mot de passe est érroné.<a href = "compte.php" class = "alert-link"><br/>Retour à la gestion du compte.</a>
            </div>';
        }
        else
        {
            $requeteModification = 'UPDATE user SET password = "'.$newPassword.'" WHERE email = "'.$email.'"';
            $modificationPassword = $mysql->ExecuteSQL($requeteModification);
            return '<div class = "alert alert-success">
                Votre mot de passe à bien été modifié.<a href = "index.php" class = "alert-link"><br/>Retour à la page d\'accueil.</a>
            </div>';
        }
    }

}
?>