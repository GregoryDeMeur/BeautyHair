<?php
namespace App\Models;

class Salon_Photo extends \CodeIgniter\Model
{

    protected $table = 'salons_photos';
    protected $primaryKey = 'ID';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ID','ID_salon','photo'];

    public $ID;
    public $ID_salon;
    public $photo;


    public function getAllPhotosOfTheSalonBySendingIdSalon($idSalon)
    {
      // Function qui récupère toutes les photos du salons avec le paramètre $idSalon
      $query = $this->db->query("SELECT * FROM salons_photos WHERE ID_salon = '" .  $idSalon . "'");
      $row['salon'] = $query->getResultArray();
      return $row['salon'];
    }

    public function insertSalonPhoto($data)
    {
      $this->insert($data);
    }

    public function deletePhotoSalonBySendingIdOfThePhoto($idPhoto)
    {
      // Cette fonction va faire la Suppression de la photo uploadé dans le dossier + suppression de la row dans la db.
      
      // Récupération du chemin du fichier
      $pathOfThePhoto = $this->db->query("SELECT photo FROM salons_photos WHERE ID = '" . $idPhoto . "'");
      $row['pathOfThePhoto'] = $pathOfThePhoto->getResultArray();
     
      // Pour supprimer la photo du fichier upload, il faut utiliser la function unlink() et attribuer le chemin absolu du fichier 
      // Et pour avoir le chemin jusqu'au htdocs on peut utiliser la variable $_SERVER['DOCUMENT_ROOT'], puis concaténer le reste
      // /!\ Cela devrait fonctionner pour n'importe quelle machine/server pour autant qu'on ne rename pas le dossier BeautyHair.
      unlink($_SERVER['DOCUMENT_ROOT'] . '/BeautyHair/' . $row["pathOfThePhoto"][0]["photo"]);
      // Et enfin, Suppression de la ROW dans la database
      $this->db->query("DELETE FROM salons_photos WHERE ID =  '" .  $idPhoto . "'");   
    }

    public function deleteAllPhotosOfASalonIdFromTableSalonsPhotos($idSalon)
    {
      $this->db->query("DELETE FROM salons_photos WHERE ID_salon = '" . $idSalon . "'");
    }

    public function getSalonIdBySendingIdPhoto($idPhoto)
    {
      // Function qui récupère l'ID du salon en envoyant l'id d'une photo
      $query = $this->db->query("SELECT ID_salon FROM salons_photos WHERE ID = '" .  $idPhoto . "'");
      $row['salon'] = $query->getResultArray();
      return $row['salon'];
    }


    public function getAllPhotosOfAllSalons()
    {
      $query = $this->db->query("SELECT * FROM salons_photos");
      $row['photo'] = $query->getResultArray();
      return $row['photo'];
    }




}