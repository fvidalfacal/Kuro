<?php

require_once('mysql.class.php');

class Medias {

    private $type;
    private $nom;
    private $urlImage;
    private $urlVideo;
    private $dateAjout;
    private $idUser;

    /**
     * 
     * @param string $type
     * @param string $nom
     * @param string $urlImage
     * @param string $urlVideo
     * @param date $dateAjout
     * @param int $idUser
     */
    private function __construct($type, $nom, $urlImage, $urlVideo, $dateAjout) {
        $this->type = $type;
        $nom->nom = $nom;
        $urlImage->urlImage = $urlImage;
        $urlVideo->urlVideo = $urlVideo;
        $dateAjout->dateAjout = $dateAjout;
        $idUser->idUser = $idUser;
    }

    /**
     * 
     * @param string $nom
     * @param string $urlImage
     * @param int $idUser
     * 
     * Execute la requête d'ajout d'image à la base de données
     */
    public static function addImage($nom, $urlImage, $idUser) {
        $mysql = new Mysql('kuro', 'localhost', 'root', 'pwsio');
        setlocale(LC_TIME, 'fra_fra');
        $date = strftime('%d %B %Y');
        $requeteAjout = 'INSERT INTO medias(type,nom,urlImage,dateAjout,idUser)';
        $requeteAjout .= 'VALUES ("image","' . $nom . '","' . $urlImage . '","' . $date . '",' . $idUser . ')';
        $ajout = $mysql->ExecuteSQL($requeteAjout);
    }

    /**
     * 
     * @param string $nom
     * @param string $urlVideo
     * @param int $idUser
     * 
     * Execute la requête d'ajout de vidéo à la base de données
     */
    public static function addVideo($nom, $urlVideo, $idUser) {

        $mysql = new Mysql('kuro', 'localhost', 'root', 'pwsio');
        setlocale(LC_TIME, 'fra_fra');
        $date = strftime('%d %B %Y');
        $requeteAjout = 'INSERT INTO medias(type,nom,urlVideo,dateAjout,idUser)';
        $requeteAjout .= 'VALUES ("video","' . $nom . '","' . $urlVideo . '","' . $date . '",' . $idUser . ')';
        $ajout = $mysql->ExecuteSQL($requeteAjout);
    }

    /**
     * 
     * @return array, liste des images
     */
    public static function getAllImages() {
        $mysql = new Mysql('kuro', 'localhost', 'root', 'pwsio');
        $requeteRecuperation = 'SELECT nom,urlImage,dateAjout,idUser FROM medias';
        $requeteRecuperation .= ' WHERE type = "image"';
        $requeteRecuperation = $mysql->TabResSQL($requeteRecuperation);
        return $requeteRecuperation;
    }

    /**
     * 
     * @return array, liste des vidéos
     */
    public static function getAllVideos() {
        $mysql = new Mysql('kuro', 'localhost', 'root', 'pwsio');
        $requeteRecuperation = 'SELECT nom,urlVideo,dateAjout,idUser FROM medias';
        $requeteRecuperation .= ' WHERE type = "video"';
        $requeteRecuperation = $mysql->TabResSQL($requeteRecuperation);
        return $requeteRecuperation;
    }

    /**
     * 
     * @param string $nom
     */
    
    public static function deleteMedia($nom, $urlVideo, $urlImage) {
        $mysql = new Mysql('kuro', 'localhost', 'root', 'pwsio');
        $requeteRecuperation = 'DELETE FROM medias';
        $requeteRecuperation .= ' WHERE nom = "'.$nom.'"';
        $requeteRecuperation = $mysql->ExecuteSQL($requeteRecuperation);
        if($urlVideo == ''){
            unlink($urlImage);
        }
        
    }

}

?>